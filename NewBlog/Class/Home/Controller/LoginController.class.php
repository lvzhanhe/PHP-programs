<?php
namespace Home\Controller;
use Think\Controller;
class LoginController extends BaseController {
	private $type = array(
		'web'=>1,
		'QQ' =>2,
		'Weixin' =>3,
		'Weibo' => 4,
	);
	//SNS登录首页

	public function _initialize(){
		parent::_initialize();
		import('Vendor.LoginTools.Login');

		//判断使用哪个插件登录
		$type = I('type');
		if($type){
			cookie('login_type',$type);
		}else{
			$type = cookie('login_type');
		}

		$this->typeIndex = $this->type[$type];

//		获取配置参数，参数key已经统一
		$config = C($type);

//		实例化类
		$this->tools = new \Vendor\LoginTools\Login($type,$config);
	}
	public function login(){
		//显示登录窗口
		if (!$this->tools->view()){
			$error = $this->tools->getError();
			$this->error($error);
		}
	}

//	public function callback(){
//		$openid = $this->tools->getOpenid();
//		if ($openid){
//			$this->error($this->tools->getError());
//		}
//		if ($this->updateUser($openid)){
//			$this->success('登录成功',U('index/index'));
//		}
//	}
}