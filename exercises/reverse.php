<html>
<head>
	<meta charset="gb2312">
	<title>reverse_char</title>
</head>
<body>
	<div class="block-center margin-top-lg" style="width:600px;">
		<form action="" method="post">
			<input type="text" name="string" placeholder="�������ַ���" value="<?php if(isset($_POST["string"])){echo $_POST["string"];}?>">
			<input type="submit" name="sub" value="��ת">
		</form>
		<div class="result-box margin-top-lg">
			<span style="font-size:10px;">
			<?php 
				if(isset($_POST['sub'])){
					$str=$_POST['string'];
					function reverse($var) {
						$res="";
						for($i=0,$j=strlen($var);$i<$j;$i++) $res = $var[$i].$res;
						return $res;
					}
					$res = reverse($str);
					echo $res;
				}
			?>
			</span>
		</div>
	</div>
</body>
</html>