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
		<input type="submit" name="sub"  value="���" >
	</form>
	<?php
		$arr = array(
			array("����","�Ա�","�༶","�ֻ���","qq��","�Ը񰮺�"),
			array("��˫ϲ","��","14����2��","15270865610","1783495167","����"),
			array("��¡ǿ","��","����2��","18365403235","1324121459","���裬��ɽ������Ӱ���Ը��㿪��"),
			array("����Ӣ","��","����ѧ�Ӱ�","13767554653","1599976402","��ƹ������ë�����裬����"),
			array("��ǿ","��","����2��","157977355230","3286381039","�������ܲ�������"),
			array("Ϳѩޱ","Ů","����1��","13755623531","1830424545","�ԣ�˯�����飬д�������ô���"),
			array("Ϳ���","��","����1��","15297911183","1023122541","������")
		);
		if(isset($_POST['sub'])) {
			foreach($_POST as $key=>$value)                 // $_POST�ǰ������������ֵ��һ�����飬����var_dump����
				if($key!='sub')   $add[] = $value;          // ��ȡ������6��ֵװ��һά����
			array_push($arr,$add);                          // �Ѹղŵ�һά������ӵ�ԭ�еĶ�ά�������ȥ
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