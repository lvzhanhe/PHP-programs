<?php
namespace Vendor\LoginTools;
/**
* 
*/
class QQ extends Login{
    const GET_AUTH_CODE_URL = "https://graph.qq.com/oauth2.0/authorize";
    const GET_ACCESS_TOKEN_URL = "https://graph.qq.com/oauth2.0/token";
    const GET_OPENID_URL = "https://graph.qq.com/oauth2.0/me";
    public $APIMap = array(        
        /*                       qzone                    */
        "get_user_info" => array(
            "https://graph.qq.com/user/get_user_info",
            array("format" => "json"),
            "GET"
        ),
    );


    private $errorRow = array(
        30001=>'返回状态不匹配',
        50001=>'可能是服务器无法请求https协议',
    );

    function __construct($config){
        foreach ($config as $key => $value) {
            $this->$key = $value;
        }
    }

    public function view(){
        $scope = implode(",",array_keys($this->APIMap));


        //-------生成唯一随机串防CSRF攻击
        $state = md5(uniqid(rand(), TRUE));
        session('qq_state',$state);

        //-------构造请求参数列表
        $keysArr = array(
            "response_type" => "code",
            "client_id" => $this->appid,
            "redirect_uri" => $this->callback,
            "state" => $state,
            "scope" => $scope
        );

       
        //根据参数生成url
        $url = $this->createUrl(self::GET_AUTH_CODE_URL,$keysArr);
        header("Location:$url");
    }


    //获取token
    private function getToken(){
        $state = session('qq_state');
        session('qq_state',null);
        if($_GET['state'] != $state){
            $this->getError(30001);
            return false;
        }

        //-------请求参数列表
        $keysArr = array(
            "grant_type" => "authorization_code",
            "client_id" => $this->appid,
            "redirect_uri" => urlencode($this->callback),
            "client_secret" => $this->appkey,
            "code" => $_GET['code']
        );         

        $tokenUrl = $this->createUrl(self::GET_ACCESS_TOKEN_URL,$keysArr);

        if(!$response = $this->get_contents($tokenUrl)){
            return false;
        }  

        if(strpos($response, "callback") !== false){
            $lpos = strpos($response, "(");
            $rpos = strrpos($response, ")");
            $response  = substr($response, $lpos + 1, $rpos - $lpos -1);
            $msg = json_decode($response,true);

            if($msg['error']){
                $this->getError($msg['error']);
                return false;
            }                    
        }
        parse_str($response, $res);        
        $this->token = $res['access_token'];
        return true;

        //return $res['access_token'];
    }


    //获取openid
    public function getOpenid(){
        
        if(!$this->getToken()){       
            return false;
        }
       
       
        $keysArr = array(
            "access_token" => $this->token
        );
        


        $graph_url = $this->createUrl(self::GET_OPENID_URL, $keysArr);        
        $response = $this->get_contents($graph_url);

        if(strpos($response, "callback") !== false){
            $lpos = strpos($response, "(");
            $rpos = strrpos($response, ")");
            $response = substr($response, $lpos + 1, $rpos - $lpos -1);
        }
        $res = json_decode($response,true);       
        if($res['error']){
            return false;
        }
        $this->openid = $res['openid'];
        return $res['openid'];
    }


    //创建Url
    public function createUrl($baseURL,$keysArr){
        //组成URL
        $combined = $baseURL."?";
        $valueArr = array();

        foreach($keysArr as $key => $val){
            $valueArr[] = "$key=$val";
        }

        $keyStr = implode("&",$valueArr);
        $combined .= ($keyStr);
        
        return $combined;        
        $state = session('state');
        if($state!=$state){

        }
    }








    public function getUserInfo($openid=null){
        if(!$openid){
            $openid = $this->openid;
        }

        if(!$openid){
            $this->getError("openid不存在!");
            return false;
        }

        $baseUrl = $this->APIMap['get_user_info'][0];
        $keysArr = array(
            'oauth_consumer_key'=>$this->appid,
            'access_token'=>$this->token,
            'openid'=>$openid,
            'format'=>'json'
        );

        $res = $this->postData($baseUrl,$keysArr);
        if(!$res){
            return false;
        }

        $res = json_decode($res,true);        

        $res = $this->create($res);
        return $res;
    }


    public function create($info){
        $res['nickname'] = $info['nickname'];
        $res['sex'] = getSex($info['gender']);      
        $res['birthday'] = $info['year']."-01-01";
        $res['headimgurl1'] = $info['figureurl_qq_2'];
        $res['headimgurl2'] = $info['figureurl_2'];        
        $res['city'] = $info['city'];        
        $res['province'] = $info['province'];  
        return $res;      
    }


    public function getData($url, $keysArr){
        $combined = $this->createUrl($url, $keysArr);
        return $this->get_contents($combined);
    }   
    
    


}
