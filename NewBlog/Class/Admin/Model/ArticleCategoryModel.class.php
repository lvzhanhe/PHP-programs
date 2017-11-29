<?php
namespace Admin\Model;
use Think\Model;
class ArticleCategoryModel extends BaseModel {
	public function uploading($id,$info){
		$data=$this->create();
		$data['img'] = date('Y-m-d').'/'.$info['index_show']['savename'];
		return !!$this->where(array('id'=>$id))->save($data);
	}
}
















