	<?php 
			$books = array(
					 array('����','�Ա�','�༶','��ϵ�绰','QQ','�Ը񰮺�'),
					 array('��հ��','��','��һ','13237512189','835122971','�����'),
					 array('���н�','��','����','15879170174','1092702721','����Ϸ�����'),
					 array('ղ��ǿ','��','����','17770847510','799673077','��ţ'),
					 array('������','Ů','��һ','15797704506','2978841617','�ܲ�'),
				);
			echo '<table border="1">';
			foreach ($books as $value){
					echo '<tr>';
					foreach ($value as $key=>$valu){
					echo '<td align=center>'.$valu.'</td>';
					}
					echo '</tr>';
			}
			echo '</table>';
	?>