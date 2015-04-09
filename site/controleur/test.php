<?php

	require_once "ControleurAffichage.php";

	$ctrl = new ControleurAffichage(); 

	$tableau = $ctrl -> afficher("http://localhost/~MBP-0/IUT_LD/site/ressource/E126549D.rdf"); 
	foreach($tableau as $value) {
		foreach($value as $row) {
			if (is_string($row)) {
				echo ($row.'<br />');
			}
			else {
				foreach($row as $id) {
				echo $id.'<br />';
				}
			}
		}

	}

	
	

	



?>
