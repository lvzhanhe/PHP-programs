<!DOCTYPE html>
<html>
	<head>
		<meta charset="gb2312">
		<title>find one's information</title>
		<style>
		table{
			border:2px black solid;
			text-align:center;
			border-collapse: collapse;
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
				array('����','�Ա�','�༶','��ϵ�绰','QQ','�Ը񰮺�'),
				array('��հ��','��','��һ','13237512189','835122971','�����'),
				array('���н�','��','����','15879170174','1092702721','����Ϸ�����'),
				array('ղ��ǿ','��','����','17770847510','799673077','��ţ'),
				array('������','Ů','��һ','15797704506','2978841617','�ܲ�')
		);
			$clue=$_POST['find'];
			// title begin
			echo "<table>";
			for ($i=0;$i<5;$i++){
				if ($i == 0){
					echo "<tr>";
					for ($j=0;$j<6;$j++){
						echo '<td>'.$infor[$i][$j].'</td>';
					}
					echo "</tr>";
				}
			}
			// information begin
			if (isset($_POST['bottom'])){
				for ($i=0;$i<5;$i++){
						for ($j=0;$j<6;$j++){
								while(strpos($infor[$i][$j],$clue)!== false){
									echo '<tr>';
									for ($j=0;$j<6;$j++){
								 		echo '<td>'.$infor[$i][$j].'</td>';
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