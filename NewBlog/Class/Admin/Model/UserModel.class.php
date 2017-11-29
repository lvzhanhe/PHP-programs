<?php
namespace Admin\Model;
use Think\Model;
class UserModel extends Model{
	public function checkLogin($user_id,$pwd){
		$userinfo=$this->where(array('user_id'=>$user_id,'password'=>$pwd))->find();
		if($userinfo){
			session('id',$userinfo['id']);
			session('user_id',$user_id);
		}
		return $userinfo;
	}
	public function uploading($id,$info){
		$data=$this->create();
		$data['avatar_file'] = date('Y-m-d').'/'.$info['index_show']['savename'];
		return !!$this->where(array('id'=>$id))->save($data);
	}
	public function users(){
		return $this->where(array('status'=>array('eq',1)))	
		->select();	
	}
	public function delUser($id){
		return $this->where(array('user_id'=> $id))->delete();
	}
	public function addUser(){
		$detail = $this -> create();
		$detail['user_id']=$_POST['user_id'];
		$detail['name']=$_POST['name'];
		$detail['password']=$_POST['password'];
		$datail['avatar_file'] =$_POST['avatar_file'];
		return $result = $this->data($detail)->add();
		
	}
}
