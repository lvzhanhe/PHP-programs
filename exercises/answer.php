<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
</head>	
<body>
	<form action="" method="post">
		<input type="text" name="name"   value="<?php if(isset($_POST["name"])){  echo $_POST["name"];}  ?>" >
		<input type="text" name="sex"    value="<?php if(isset($_POST["sex"])){   echo $_POST["sex"];}   ?>" >
		<input type="text" name="class"  value="<?php if(isset($_POST["class"])){ echo $_POST["class"];} ?>" >
		<input type="text" name="phone"  value="<?php if(isset($_POST["phone"])){ echo $_POST["phone"];} ?>" >
		<input type="text" name="qq"     value="<?php if(isset($_POST["qq"])){    echo $_POST["qq"];}    ?>" >
		<input type="text" name=" hobby" value="<?php if(isset($_POST["hobby"])){ echo $_POST["hobby"];} ?>" >
		<input type="submit" name="sub"  value="Ìí¼Ó" >
	</form>
	<?php
		$arr = array(
			array('Name','Gender','Class','Number','Major','Hobby'),
			array('Zhanhe','Male','1','5174020323','CS','Movies'),
			array('Jason','Male','2','5283274903','EE','Shopping'),
			array('Lucy','Female','2','9832327434','CE','Video Games'),
			array('Kim','Male','1','5208939432','ME','Basketball')
		);
		if(isset($_POST['sub'])) {
			foreach($_POST as $key=>$value)            
				if($key!='sub')   $add[] = $value;        
			array_push($arr,$add);                        
		}
		echo '<table border="1px" bordercolor="#000" cellspacing="0">';
		for($i=0;$i<count($arr[0]);$i++) {                     
			echo '<tr>';
			foreach($arr as $value) echo '<td>'.$value[$i].'</td>';
			echo '</tr>';
		}
		echo '</table>';
	?>
</body>
</html>	