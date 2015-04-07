<?php

	require_once "ControleurAffichage.php";

	$ctrl = new ControleurAffichage(); 


	echo " etablissement <br> "; 

	echo ($ctrl -> afficher("http://localhost/IUT_LD/site/ressource/IUT_Nantes.rdf")); 

	echo " <br> departement <br>  "; 

	echo ($ctrl -> afficher("http://localhost/IUT_LD/site/ressource/informatique_IUTNantes.rdf")); 
	
	echo " <br>  promo  <br> "; 
	
	echo ($ctrl -> afficher("http://localhost/IUT_LD/site/ressource/info1_2014-2015.rdf")); 

	echo " <br> groupe <br>  "; 

	echo ($ctrl -> afficher("http://localhost/IUT_LD/site/ressource/info1goupe1_2014-2015.rdf")); 

	echo " <br> professeur <br> "; 

	echo ($ctrl -> afficher("http://localhost/IUT_LD/site/ressource/Nachouki_Gilles.rdf")); 

	echo " <br> etudiant <br> "; 

	echo ($ctrl -> afficher("http://localhost/IUT_LD/site/ressource/E133756M.rdf")); 



?>
