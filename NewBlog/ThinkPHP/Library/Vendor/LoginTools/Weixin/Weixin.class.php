<?php
namespace Vendor\LoginTools;
/**
* 
*/
class Weixin extends Login{
   



    function __construct($config){
        foreach ($config as $key => $value) {
            $this->$key = $value;
        }
    }

    public function view(){
        $this->getCode();
             
        return true;
    }


    //获取token
    private function getToken(){
        $code = I('get.code');
        $state = I('get.state');
        if(!$this->State($state)){            
            $this->getError("验证state出错!");
            return false;
        }

        $url = "https://api.weixin.qq.com/sns/oauth2/access_token?appid={$this->appid}&secret={$this->appkey}&code={$code}&grant_type=authorization_code";


        $res = $this->get_contents($url);

        $res = json_decode($res,true);
        //此处如果正确的话,会返回6个信息。access_token是有时效性的。在后续的一些接口中，会使用到。但目前登陆获取用户信息仅是在很短的时间内完成。、
        //所以目前只是用大S方法缓存下
        if(!$res['openid']){
            $this->getError("获取token失败!");
            return false;
        }
        S($res['openid'],$res,$res['expires_in']);
       
        $this->openid = $res['openid'];
        return $res['openid'];
    }


    //获取openid
    public function getOpenid(){               
        $info = S($openid);
        if(!$info){          
            if(!$openid = $this->getToken()){            
                return false;
            }
            $info = S($openid);
        }

        return $info['openid'];
    }

    public function getUserInfo($openid=null){
  

        if(!$openid){
            $openid = $this->openid;
        }

        
        $info = S($openid);
        
        $token = $info['access_token'];

        $url = "https://api.weixin.qq.com/sns/userinfo?access_token={$token}&openid={$openid}";
        $res = $this->get_contents($url);
        $res = json_decode($res,true);

        $res = $this->create($res);
        return $res;
    }


    public function create($info){
        $res['nickname'] = $info['nickname'];        
        $res['sex'] = $info['sex'];
        $res['city'] = $info['city'];
        $res['country'] = $info['country'];
        $res['province'] = $info['province'];
        $res['headimgurl1'] = $info['headimgurl'];
        $res['headimgurl2'] = $info['headimgurl'];
        return $res;
    }


    private function State($state=null){
        if(!$state){
            $state = md5(uniqid(rand(), TRUE));
            session("state",$state);
        }else{
            $s = session("state");
            session("state",null);

            if( $state != $s){
                return false;
            }
            return true;
        }
        return $state;
    }


    private function getCode(){
        $callback = UrlEncode($this->callback);
        $state = $this->State();
        $url = "https://open.weixin.qq.com/connect/qrconnect?appid={$this->appid}&redirect_uri={$callback}&response_type=code&scope=snsapi_login&state={$state}#wechat_redirect";        
        header("Location:$url");
    }


}
