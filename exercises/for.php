	<?php 
			$books = array(
					array('Name','Gender','Class','Number','Major','Hobby'),
					array('Zhanhe','Male','1','5174020323','CS','Movies'),
					array('Jason','Male','2','5283274903','EE','Shopping'),
					array('Lucy','Female','2','9832327434','CE','Video Games'),
					array('Kim','Male','1','5208939432','ME','Basketball')
				);
			echo '<table border="1">';
			for($j=0;$j<5;$j++){
					echo '<tr>';
					for($i=0;$i<5;$i++){
					echo '<td align=center>'.$books[$j][$i].'</td>';
					}
					echo '</tr>';
			}
			echo '</table>';
	?>