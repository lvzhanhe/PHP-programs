<?php
namespace Admin\Controller;
use Think\Controller;
class IndexController extends BaseController {
    public function index(){
    	$article=D("ArticleDetail")->getDetail(5,5);
    	$this->assign('article',$article);
		$this->display();
    }
    public function login(){
    	$this->display();
    }
    public function addBlog(){
    	$this->display();
    }
    public function addUsers(){
    	$this->display();
    }
    public function pageChange(){
    	$Allpage=D('ArticleCategory')->select();
    	$this->assign('Allpage',$Allpage);
    	$this->display();
    }
    public function change(){
    	$id=I('id');
    	$data=M('ArticleCategory')->where(array('id'=>$id))->find();
    	$this->assign('data',$data);
    	$this->display();
    }
    public function userinfo(){
    	$userInfo=M('user')->find();
    	$this->assign('userInfo',$userInfo);
    	$this->display();
    }
	public function doLogin(){
		$user_id=$_POST['user_id'];
		$password=$_POST['password'];
		$result=D('User')->checkLogin($user_id,$password);
		if($result){
			$this->success('用户登录成功',U('Index/index'));
		}else{
			$this->error('该用户不存在');
		}
          
	}
	public function doAdminlogin(){
		$this->success('管理员登录成功',U('Index/adminIndex'));
	}
	public function add(){
		$Add = D('ArticleDetail')->addBlog();
		if($Add){
			$this->success("新增成功",'Index/index');
		}else{
			$this->error("新增失败");
		}
	}
	public function delete(){
		$Del = D('ArticleDetail')->delBlog(I('get.id'));
		if($Del){
			$this->success("删除成功");
		}else{
			$this->error("删除失败");
		}
	}
	public function adminIndex(){
		$this -> assign('users',D('user')->users());
		$this -> display();
	}
	public function deleteUser(){
		$Del = D('user')->delUser(I('get.id'));
		if($Del){
			$this->success("删除成功");
		}else{
			$this->error("删除失败");
		}
	}
	public function addUser(){
	    $Add = D('user')->addUser();
		if($Add){
			$this->success("新增成功",U('Index/adminIndex'));
		}else{
			$this->error("新增失败");
		}
	}
	public function editBlog(){
		$cId=I('id');
		$this->assign('id',$cId);
		$Blog=M('ArticleDetail')->where(array('id'=>$cId))->find ();
		$this->assign('blog',$Blog);
		$this -> display();
	}
	public function edit(){
		$eId=$_REQUEST['id'];
		$result=D('ArticleDetail')->edit($eId);
		if($result){
			$this->success('编辑成功',U('Index/index'));
		}else{
			$this->error('编辑失败');
		}
	}
}