<html>
<head>
	<meta charset="gb2312">
	<title>reverse_char</title>
</head>
<body>
	<div class="block-center margin-top-lg" style="width:600px;">
		<form action="" method="post">
			<input type="text" name="str" placeholder="请输入字符串" value="<?php if(isset($_POST["str"])){echo $_POST["str"];}?>">
			<input type="text" name="char" placeholder="请输入字符" value="<?php if(isset($_POST["char"])){echo $_POST["char"];}?>">
			<input type="submit" name="sub" value="查找">
		</form>
		<span>
			<?php 
				if(isset($_POST['sub'])){
					if(empty($_POST['str'])|| empty($_POST['char'])) echo "没有输入！";
					else{
						$count = 0;
						$strs = $_POST['str'];
						for($i=0;$i<strlen($strs);$i++){
							if($strs[$i]==$_POST['char']) $count++;
						}
						echo $_POST['char'].'出现了'.$count.'次';
					}
				}
			?>
		</span>
</body>
</html>