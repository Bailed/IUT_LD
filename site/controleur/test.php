<?php

	require_once "ControleurAffichage.php";

	$ctrl = new ControleurAffichage(); 


	echo " etablissement <br>  <br>"; 

	echo ($ctrl -> afficher("http://localhost/IUT_LD/site/ressource/IUT_Nantes.rdf")); 

	echo " <br> <br><br> departement <br> <br> "; 

	echo ($ctrl -> afficher("http://localhost/IUT_LD/site/ressource/informatique_IUT_Nantes.rdf")); 
	
	echo " <br><br><br>  promo  <br> <br>"; 
	
	echo ($ctrl -> afficher("http://localhost/IUT_LD/site/ressource/info2_2014-2015.rdf")); 

	echo " <br> <br><br>groupe <br><br>  "; 

	echo ($ctrl -> afficher("http://localhost/IUT_LD/site/ressource/info2_groupe1_2014-2015.rdf")); 

	echo " <br><br><br> professeur <br><br> "; 

	echo ($ctrl -> afficher("http://localhost/IUT_LD/site/ressource/REMM_Jean-Francois.rdf")); 

	echo " <br><br><br> etudiant <br> <br>"; 

	echo ($ctrl -> afficher("http://localhost/IUT_LD/site/ressource/E133756M.rdf")); 



?>
