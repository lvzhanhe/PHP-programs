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
				array('Name','Gender','Class','Number','Major','Hobby'),
				array('Zhanhe','Male','1','5174020323','CS','Movies'),
				array('Jason','Male','2','5283274903','EE','Shopping'),
				array('Lucy','Female','2','9832327434','CE','Video Games'),
				array('Kim','Male','1','5208939432','ME','Basketball')
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