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
				array('����','�Ա�','�༶','��ϵ�绰','QQ','�Ը񰮺�'),
				array('��հ��','��','��һ','13237512189','835122971','�����'),
				array('���н�','��','����','15879170174','1092702721','����Ϸ�����'),
				array('ղ��ǿ','��','����','17770847510','799673077','��ţ'),
				array('������','Ů','��һ','15797704506','2978841617','�ܲ�')
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