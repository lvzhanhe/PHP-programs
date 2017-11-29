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
				array('Name','Gender','Class','Number','Major','Hobby'),
				array('Zhanhe','Male','1','5174020323','CS','Movies'),
				array('Jason','Male','2','5283274903','EE','Shopping'),
				array('Lucy','Female','2','9832327434','CE','Video Games'),
				array('Kim','Male','1','5208939432','ME','Basketball')
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