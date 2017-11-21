<!DOCTYPE html>
<html>
	<head>
		<meta charset="gb2312">
		<title>test</title>
		<style>
		input{
			width:70px;
		}
		</style>
	</head>
	<body>
		<form action="" method="post">
		<input type="text" name="name" value="<?php error_reporting(0); echo $_POST['name']; ?>">
		<input type="text" name="gender" value="<?php error_reporting(0); echo $_POST['gender']; ?>">
		<input type="text" name="class" value="<?php error_reporting(0); echo $_POST['class']; ?>">
		<input type="text" name="phone" value="<?php error_reporting(0); echo $_POST['phone']; ?>">
		<input type="text" name="qq" value="<?php error_reporting(0); echo $_POST['qq']; ?>">
		<input type="text" name="habit" value="<?php error_reporting(0); echo $_POST['habit']; ?>">
		<input type="submit" name="bottom" value="ADD">
		<br><br>
		</form>
		<?php 
		$infor = array(
				array('姓名','性别','班级','联系电话','QQ','性格爱好'),
				array('吕瞻赫','男','科一','13237512189','835122971','计算机'),
				array('刘中江','男','正大','15879170174','1092702721','打游戏打代码'),
				array('詹国强','男','正大','17770847510','799673077','吹牛'),
				array('刘晓静','女','物一','15797704506','2978841617','跑步')
		);
		$inform0=$_POST['name'];
		$inform1=$_POST['gender'];
		$inform2=$_POST['class'];
		$inform3=$_POST['phone'];
		$inform4=$_POST['qq'];
		$inform5=$_POST['habit'];
		
			$arr[]=$inform0;
			$arr[]=$inform1;
			$arr[]=$inform2;
			$arr[]=$inform3;
			$arr[]=$inform4;
			$arr[]=$inform5;
			array_push($infor, $arr);
		}
		$length=count($infor);
		echo '<table border="1">';
			for($j=0;$j<6;$j++){
					echo '<tr>';
					for($i=0;$i<$length;$i++){
					echo '<td align=center>'.$infor[$i][$j].'</td>';
					}
					echo '</tr>';
			}
			
		echo '</table>';
		?>
	</body>
</html>