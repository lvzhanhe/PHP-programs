<?php
namespace Home\Model;
use Think\Model;
class ArticleDetailModel extends BaseModel {
	protected function _initialize(){
		parent::_initialize();
	}	
	public function getDetail($category_id,$article_num,$p){
		//dump($category_id);
		$article=$this
		->alias('ad')
		->where(array('ad.status'=>array('eq',1),'category_id'=>$category_id?$category_id:array('gt',0))) 
		->order('update_time desc')  
		->page($p,$article_num)  
		->select();
		return $article;
	}
    public function Detail($article_id){
		
    	$article=$this->where(array('id'=>$article_id))->find();
    	//dump($article);
    	$category_id=$article['category_id'];
    	//dump($category_id);
    	$count=$this->where(array('category_id'=>array('eq',$category_id)))->count();
    	$ltcount=$this->where(array('category_id'=>array('eq',$category_id),'id'=>array('lt',$article_id)))->count();
    	//$count=$detail->where(array('id'=>array('lt',$article_id)))->count();
    	$detail=$this
    			->where(array('category_id'=>array('eq',$category_id)))
    			->order('id asc')
    			->limit($ltcount?$ltcount-1:$ltcount,$ltcount?3:2)
    			->select();
    	//dump($detail);
    	$list=array('last'=>$detail[0],'current'=>$detail[1],'next'=>$detail[2]);
    	if($ltcount==0)
    	{
    		$list['last'] = NULL;
    		$list['current'] = $detail[0];
    		$list['next'] = $detail[1];
    		
    	}
    	return $list;
    }
    public function articlePage($category_id,$num){
    	$article=$this
    	->alias('ad')
    	->where(array('ad.status'=>array('eq',1),'category_id'=>$category_id?$category_id:array('gt',0)))
    	->order('update_time desc')
    	->select();
    	$count = count($article);
    	$Page = new \Think\Page($count,$num);
    	$Page->setConfig('header', '条数据');
        $Page->setConfig('prev', '上一页');
        $Page->setConfig('next', '下一页');
        $Page->setConfig('first', '首页');
        $Page->setConfig('end', '末页');
        $show = $Page->show(); // 分页显示输出
    	//dump($show);
    	return $show;
    }
}
















