<html>
<head>
	<meta charset="gb2312">
	<title>reverse_char</title>
</head>
<body>
	<div class="block-center margin-top-lg" style="width:600px;">
		<form action="" method="post">
			<input type="text" name="str" placeholder="�������ַ���" value="<?php if(isset($_POST["str"])){echo $_POST["str"];}?>">
			<input type="text" name="char" placeholder="�������ַ�" value="<?php if(isset($_POST["char"])){echo $_POST["char"];}?>">
			<input type="submit" name="sub" value="����">
		</form>
		<span>
			<?php 
				if(isset($_POST['sub'])){
					if(empty($_POST['str'])|| empty($_POST['char'])) echo "û�����룡";
					else{
						$count = 0;
						$strs = $_POST['str'];
						for($i=0;$i<strlen($strs);$i++){
							if($strs[$i]==$_POST['char']) $count++;
						}
						echo $_POST['char'].'������'.$count.'��';
					}
				}
			?>
		</span>
</body>
</html>