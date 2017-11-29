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
				array('Name','Gender','Class','Number','Major','Hobby'),
				array('Zhanhe','Male','1','5174020323','CS','Movies'),
				array('Jason','Male','2','5283274903','EE','Shopping'),
				array('Lucy','Female','2','9832327434','CE','Video Games'),
				array('Kim','Male','1','5208939432','ME','Basketball')
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