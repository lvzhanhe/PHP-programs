<?php
namespace Vendor\LoginTools {
    /**
     *
     */
    class Weibo extends Login{





        function __construct($config){
            foreach ($config as $key => $value) {
                $this->$key = $value;
            }
        }

        public function view(){
            $callback = UrlEncode($this->callback);
            $state = $this->State();
            $url = "https://api.weibo.com/oauth2/authorize?client_id={$this->appid}&redirect_uri={$callback}&response_type=code&state={$state}";
            header("Location:$url");
        }



        //获取openid
        public function getOpenid(){
            $state = I('state');
            $code = I('code');
            if(!$this->State($state)){
                $this->getError("验证失败!");
                return false;
            }

            $url = "https://api.weibo.com/oauth2/access_token";
            $params['client_id'] = $this->appid;
            $params['client_secret'] = $this->appkey;
            $params['grant_type'] = 'authorization_code';
            $params['code'] = $code;
            $params['redirect_uri'] = $this->callback;

            $post = http_build_query($params);
            //微博真恶心，这里不能使用通用的curl。要组建一些自己的参数
            $json = $this->http($url,"POST",$post,$headers);
            $res = json_decode($json,true);
            if($res['error']){
                $this->getError($res['error_code']);
                return false;
            }

            $this->openid = $res['uid'];
            $this->token = $res['access_token'];

            S($res['uid'],$res,$res['remind_in']);


            return $res['uid'];

        }

        public function getUserInfo($openid=null){

            if(!$openid){
                $openid = $this->openid;
            }

            $info = S($openid);
            $token = $info['access_token'];

            $url = "https://api.weibo.com/2/users/show.json?uid={$openid}&access_token={$token}";

            $json = $this->http($url,"GET");

            $res = json_decode($json,true);
            $res = $this->create($res);

            return $res;

        }


        public function create($info){
            $res['nickname'] = $info['screen_name'];
            $res['sex'] = $this->sex($info['gender']);
            $res['city'] = $info['location'];
            $res['country'] = $info['country'];
            $res['province'] = $info['location'];
            $res['headimgurl1'] = $info['profile_image_url'];
            $res['headimgurl2'] = $info['avatar_large'];
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


        function http($url, $method, $postfields = NULL, $headers = array()) {
            $this->http_info = array();
            $ci = curl_init();
            /* Curl settings */
            curl_setopt($ci, CURLOPT_HTTP_VERSION, CURL_HTTP_VERSION_1_0);
            curl_setopt($ci, CURLOPT_USERAGENT, "Sae T OAuth2 v0.1");
            curl_setopt($ci, CURLOPT_CONNECTTIMEOUT,30);
            curl_setopt($ci, CURLOPT_TIMEOUT, 30);
            curl_setopt($ci, CURLOPT_RETURNTRANSFER, TRUE);
            curl_setopt($ci, CURLOPT_ENCODING, "");
            curl_setopt($ci, CURLOPT_SSL_VERIFYPEER, false);
            if (version_compare(phpversion(), '5.4.0', '<')) {
                curl_setopt($ci, CURLOPT_SSL_VERIFYHOST, 1);
            } else {
                curl_setopt($ci, CURLOPT_SSL_VERIFYHOST, 2);
            }
            //curl_setopt($ci, CURLOPT_HEADERFUNCTION, array($this, 'getHeader'));
            curl_setopt($ci, CURLOPT_HEADER, FALSE);

            switch ($method) {
                case 'POST':
                    curl_setopt($ci, CURLOPT_POST, TRUE);
                    if (!empty($postfields)) {
                        curl_setopt($ci, CURLOPT_POSTFIELDS, $postfields);
                    }
                    break;
                case 'DELETE':
                    curl_setopt($ci, CURLOPT_CUSTOMREQUEST, 'DELETE');
                    if (!empty($postfields)) {
                        $url = "{$url}?{$postfields}";
                    }
            }

            if ( isset($this->access_token) && $this->access_token )
                $headers[] = "Authorization: OAuth2 ".$this->access_token;

            if ( !empty($this->remote_ip) ) {
                if ( defined('SAE_ACCESSKEY') ) {
                    $headers[] = "SaeRemoteIP: " . $this->remote_ip;
                } else {
                    $headers[] = "API-RemoteIP: " . $this->remote_ip;
                }
            } else {
                if ( !defined('SAE_ACCESSKEY') ) {
                    $headers[] = "API-RemoteIP: " . $_SERVER['REMOTE_ADDR'];
                }
            }
            curl_setopt($ci, CURLOPT_URL, $url );
            curl_setopt($ci, CURLOPT_HTTPHEADER, $headers );
            curl_setopt($ci, CURLINFO_HEADER_OUT, TRUE );

            $response = curl_exec($ci);
            // $this->http_code = curl_getinfo($ci, CURLINFO_HTTP_CODE);
            // $this->http_info = array_merge($this->http_info, curl_getinfo($ci));
            // $this->url = $url;

            if ($this->debug) {
                echo "=====post data======\r\n";
                var_dump($postfields);

                echo "=====headers======\r\n";
                print_r($headers);

                echo '=====request info====='."\r\n";
                print_r( curl_getinfo($ci) );

                echo '=====response====='."\r\n";
                print_r( $response );
            }
            curl_close ($ci);
            return $response;
        }

        private function sex($key){
            $row = array(
                'm'=>1,
                'f'=>2
            );

            $res = $row[$key];
            if(!$res){
                $res = 0;
            }
            return $res;
        }
    }
}
