<?php
namespace Admin\Model;
use Think\Model;
class ArticleDetailModel extends BaseModel {
	protected function _initialize(){
		parent::_initialize();
	}	
	public function getDetail($category_id,$article_num){
		//dump($category_id);
		$article=$this
		->alias('ad')
		->join('blog_article_category AS ac ON ad.category_id = ac.id')
		->field('ad.id,ad.title,ad.content,ad.create_time,ac.name,ad.update_time')
		->where(array('ad.status'=>array('eq',1))) 
		->order('update_time desc')   
		->page($_GET['p'],$article_num)
		->select();
		return $article;
	}
	public function addBlog(){
		$detail = $this -> create();
		$detail['title']=$_POST['title'];
		$detail['content']=$_POST['editor'];
		$detail['category_id']=$_POST['category_id'];
		$datail['update_time'] = time();
		return $result = $this->data($detail)->add();
	}
	public function delBlog($id){
		return $this->where(array('id'=> $id))->delete();
	}
	public function edit($id){
		$detail = $this -> create();
		$detail['title']=$_POST['title'];
		$detail['content']=$_POST['editor'];
		$detail['category_id']=$_POST['category_id'];
		$datail['update_time'] = time();
		return $this->where(array('id'=> $id))->data($datail)->save();	//data∏Ò ΩªØ
	}
}
















