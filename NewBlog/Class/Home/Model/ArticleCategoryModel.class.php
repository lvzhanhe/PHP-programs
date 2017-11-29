<?php
namespace Home\Model;
use Think\Model;
class ArticleCategoryModel extends BaseModel {
	public function getCategory(){
		$all = $this->where(array('status'=>array('eq',1)))->select();
		$arr = node_merge($all);
		return $arr;
		/*方法一：套循环，二级就用二级循环，三级就用三级循环
		foreach ($all as $k => $v) {
			if (!$v['pid']) {
				foreach ($all as $k1 => $v1) {
					if ($v1['pid'] == $v['id']) {
						$v['children'][] = $v1;
					}
				}
				$arr[] = $v;
			}
		}
		 */
		
		/**
		 * 方法二：写一个递归，不管几层都可以用这个方法
	 	 * 递归重组节点信息为多维数组
	 	 * @return [type] $node [要处理的节点数组]
		 * @return [type] $pid [父级ID]
		 * function node_merge($node,$pid=0){
			foreach ($node as $v) {
				if ($v['pid'] == $pid) {
					$v['children'] = node_merge($node,$v['id']);
					$arr[] = $v;
				}	
			}
			return $arr;
		   }
	    */
		
	}
}