<?php
namespace Home\Controller;
use Think\Controller;
class BaseController extends Controller {

		public function _initialize(){
			$login_type = session('login_type');
			$login_type_name = M('login_type')->where(array('id'=>array('eq',$login_type)))->getField('name');
			$all = D('ArticleCategory')->getCategory();
			$this->assign('all',$all)
				 ->assign('avatar_file',session('avatar_file'))
				 ->assign('login_type_name',$login_type_name)
				 ->assign('name',session('name'));	
		}


}