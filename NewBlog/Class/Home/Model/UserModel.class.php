<?php
namespace Home\Model;
use Think\Model;
class UserModel extends BaseModel {
	protected $_validate = array(
		array('user_id','require','用户名不得为空'),
		// array('user_id', '', '用户名称已存在！',2,'unique',1),
		array('password','require','密码不得为空'),
		// array('pass', '6,20', '密码不得小于6位，不得大于20位', 3,'length'),
	);
}