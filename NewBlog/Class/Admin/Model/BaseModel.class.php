<?php
namespace Admin\Model;
use Think\Model;
class BaseModel extends Model {		
    protected $db_prex;
	protected function _initialize(){
		$this->db_prex=C('DB_PREFIX');
	}

}






