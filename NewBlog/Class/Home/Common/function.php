<?php 
	/**
	 * 递归重组节点信息为多维数组
	 * @return [type] $node [要处理的节点数组]
	 * @return [type] $pid [父级ID]
	 */
	function node_merge($node,$pid=0){
		foreach ($node as $v) {
			if ($v['pid'] == $pid) {
				$v['children'] = node_merge($node,$v['id']);
				$arr[] = $v;
			}
			
		}
		return $arr;
	}

 ?>