<?php
namespace Home\Controller;
use Think\Controller;
class IndexController extends BaseController {
    public function index(){
		$p=I('p');
        $article=D("ArticleDetail")->getDetail(null,4,$p);
        $recently = D("ArticleDetail")->getDetail(null,6,1);
        $page=D("ArticleDetail")->articlePage(null,4);
        $pageChange=M('ArticleCategory')->where(array('id'=>5))->find();
        $this->assign('recently',$recently)
             ->assign('article',$article)
             ->assign('page',$page)
             ->assign('pageChange',$pageChange);
        $this->display();
    }
    public function category(){
    	$article_id=I('id');
    	$article=D("ArticleDetail")->getDetail($article_id,12,$p);
    	$page=D("ArticleDetail")->articlePage($article_id,12);
    	$pageChange=M('ArticleCategory')->where(array('id'=>$article_id))->find();
    	$this->assign('detail',$article)
             ->assign('page',$page)
             ->assign('pageChange',$pageChange);
    	$this->display();
    }
    public function detail(){
    	$article_id=I('id');
    	$detail=D('ArticleDetail')->Detail($article_id);  	
    	$this->assign('detail',$detail);
    	$this->display();
    }
    public function articleList(){
    	$this->display();
    }
    public function login(){
        $this->display();
    }
    public function do_login(){
    	$user = D('user');
    	$arr = $user->create();
    	if($arr){
    		$data = $user->where($arr)->find();
    		if($data){
    			session('u_id',$data['user_id']);
    			session('avatar_file',$data[avatar_file]);
    			session('name',$data[name]);
    			session('login_type',$data[login_type]);
    			$this->success('登录成功','index');
    		}else{
    			$this->error('登录失败');
    		}
    	}
    }
	public function add(){
		
	}
    public function do_register(){
        $user=D('user');
        if($user->create()){
        	$user->add($_POST);
        	$this->success();
        }else{
        	$this->error($user->getError());
        }
    }
    public function addArticle(){
        $this->display();
    }

    public function logout(){
        
    }
    public function userInfo(){
        $this->display();
    }
}