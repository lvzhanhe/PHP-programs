	<?php 
			$books = array(
					array('Name','Gender','Class','Number','Major','Hobby'),
				array('Zhanhe','Male','1','5174020323','CS','Movies'),
				array('Jason','Male','2','5283274903','EE','Shopping'),
				array('Lucy','Female','2','9832327434','CE','Video Games'),
				array('Kim','Male','1','5208939432','ME','Basketball')
				);
			echo '<table border="1">';
			$j=0;
			$i=0;
			while ($j<5){
					echo '<tr>';
					while ($i<5){
					echo '<td align=center>'.$books[$j][$i].'</td>';
					$i++;
					}
					echo '</tr>';
					$j++;
					$i = 0;
			}
			echo '</table>';
	?>