<?php
/* Cette fonction permet d'afficher tout et n'importe quoi comme un print_r sauf qu'elle lemet en forme.
 * très utile pour voir ce que l'on a en session ou en POST ou encore pour afficher des tableaux!!
 * vous pouvez faire un test d'affichage du POST sur inscription.php en ecrivant debug('ce que je veu',$_POST);
 * Cette fonction prend tout son interet quand il s'agit d'aficher un tableau multiDimensionel
 * IL faut bien evidemment inclure include/function.php pour l'utiliser
 */
function debug($title,$var='',$debug=1){
	if($debug == 1 ){
		echo '<table border=1><tr>';
		echo '<td bgcolor="yellow">'.$title.'</td></tr>';
		
		if($var!=''){
			echo '<tr><td>';
			echo '<pre>';	
			print_r($var);
			echo '</pre>';
			echo '</td></tr>';	
		}
		
		echo '</table>';	
	}
}
?>
