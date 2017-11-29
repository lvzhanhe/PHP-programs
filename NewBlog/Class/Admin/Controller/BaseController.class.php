<?php
namespace Admin\Controller;
use Think\Controller;
class BaseController extends Controller {
	public function _initialize(){
        $UserInfo=M('user')->find();
        $this->assign('userInfo',$UserInfo);
    }
}
