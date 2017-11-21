<!DOCTYPE html>
<html>
<head>
	<meta charset="gb2313">
	<title>find one's information</title>
</head>
<body>
	<form action="" method="post">
		<input type="text" name="find" value="<?php error_reporting(0); echo $_POST['find']; ?>">
		<input type="submit" name="bottom" value="FIND NOW">
		<br><br>
		</form>
		<?php 
		if(isset($_POST['find'])){
		$infor = array(
				array('姓名','性别','班级','联系电话','QQ','性格爱好'),
				array('吕瞻赫','男','科一','13237512189','835122971','计算机'),
				array('刘中江','男','正大','15879170174','1092702721','打游戏打代码'),
				array('詹国强','男','正大','17770847510','799673077','吹牛'),
				array('刘晓静','女','物一','15797704506','2978841617','跑步')
		);
			$clue=$_POST['find'];
			foreach($infor as $key=>$value){
				foreach($value as $k=>$v){
					if($clue==$v){
						foreach($value as $val){
							echo $val."\t";
						}echo"<br>";
					}
			}
		}
	}
			?>
</body>
</html>