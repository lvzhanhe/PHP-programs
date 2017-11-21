<!DOCTYPE html>
<html>
	<head>
		<meta charset="gb2312">
		<title>find one's information</title>
		<style>
		table{
			border:2px black solid;
		}
		td{
			border:1px black solid;
			margin:0;
			padding:0;
		}
		</style>
	</head>
	<body>
		<form action="" method="post">
		<input type="text" name="find" value="<?php error_reporting(0); echo $_POST['find']; ?>">
		<input type="submit" name="bottom" value="FIND NOW">
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
			$clue=$_POST['find'];
			// title begin
			echo "<table>";
			for ($i=0;$i<5;$i++){
				if ($i == 0){
					echo "<tr>";
					for ($x=0;$x<6;$x++){
						echo '<td>'.$infor[$i][$x].'</td>';
					}
					echo "</tr>";
				}	
			}
			// information begin
			if (isset($_POST['bottom'])){
				for ($i=0;$i<5;$i++){
						for ($j=0;$j<6;$j++){
								while($clue == $infor[$i][$j]){
									echo '<tr>';
									for ($z=0;$z<6;$z++){
								 		echo '<td>'.$infor[$i][$z].'</td>';
									}
									echo '</tr>';
									break;
								}
						}
					}	
			}
			echo "</table>";
		?>
	</body>
</html>