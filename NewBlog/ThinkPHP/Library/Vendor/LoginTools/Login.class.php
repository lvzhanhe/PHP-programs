<?php
namespace Vendor\LoginTools;
class Login{	
    
	public $type;


    static private $tools;


    public function __construct($type,$config)
	{		
		


		//实例化登陆接口类
		$this->type = $type;


		//获取类路径
		$classFilePath = dirname(__FILE__)."/{$type}/{$type}.class.php";
		
		

		if(!is_file($classFilePath)){			
			$this->getError("{$classFilePath}接口类不存在,注意大小写",30000);
			return false;
		}
		
		require_once($classFilePath);
		$class = "Vendor\\LoginTools\\".$type;
		self::$tools = new $class($config);		

	}


	public function checkTools(){
		if(!self::$tools){						
			return false;
		}		
		return true;
	}




	public function __call($fun,$arguments){
		if(!$this->checkTools()){
			return false;
		}
		
		if(!method_exists(self::$tools,$fun)){
			$this->getError("该接口中不存在{$fun}方法");
			return false;
		}

		$res = self::$tools->$fun($arguments);
		if(!$res){			
			$this->getError(self::$tools->getError());
			return false;
		}

		return $res;
	}



    /**
     * get_contents
     * 服务器通过get请求获得内容
     * @param string $url       请求的url,拼接后的
     * @return string           请求返回的内容
     */
    public function get_contents($url){
        if (ini_get("allow_url_fopen") == "1") {
            $response = file_get_contents($url);
        }else{
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
            curl_setopt($ch, CURLOPT_URL, $url);
            $response =  curl_exec($ch);
            curl_close($ch);
        }
        return $response;
    }




	public function getError($code){
		
        if($code){
            $error = $this->errorRow[$code];
            if(!$error){
                $error = $code;
            }
            $this->error = $error;
        }   
		return $this->error;
	}

    public function postData($url, $keysArr, $flag = 0){
        $ch = curl_init();
        if(! $flag) curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE); 
        curl_setopt($ch, CURLOPT_POST, TRUE); 
        curl_setopt($ch, CURLOPT_POSTFIELDS, $keysArr); 
        curl_setopt($ch, CURLOPT_URL, $url);
        $ret = curl_exec($ch);

        curl_close($ch);
        return $ret;
    }
}