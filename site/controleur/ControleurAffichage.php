<?php

set_include_path(get_include_path() . PATH_SEPARATOR . '../modele/');
    require_once "EasyRdf.php";
    require_once "html_tag_helpers.php";


class ControleurAffichage {

	public function __construct(){ 
	}

  	// renvois les données d'un fichier rdf
	public function afficher($uri) {  

		$graph = EasyRdf_Graph::newAndLoad($uri);

		//$graph -> dump();  

        if ($graph->type() == "etudiant:Etudiant") {



            $etudiant = $graph->resource();

            echo "etudiant charge";  

            $EtudiantJson = array("id" => $etudiant->get('etudiant:id'), "nom" =>  $etudiant->get('etudiant:nom'), "prenom" =>  $etudiant->get('etudiant:prenom'), "groupe" => $etudiant->get('etudiant:groupe') );  

            echo $etudiant->get('etudiant:id');
           echo  $etudiant->get('etudiant:nom');
          echo   $etudiant->get('etudiant:prenom');
          echo   $etudiant->get('etudiant:groupe'); 
          //  return json_encode($EtudiantJson);  
           echo $EtudiantJson;  
           echo json_encode($EtudiantJson);  

        } elseif ($graph->type() == 'professeur:Professeur') {
            $professeur = $graph->resource();

        } elseif ($graph->type() == 'groupe:Groupe') {
            $groupe = $graph->resource();
        } elseif ($graph->type() == 'promo:Promo') {
            $promo = $graph->resource();
        } elseif ($graph->type() == 'departement:Departement') {
            $dep = $graph->resource();
        } elseif ($graph->type() == 'etablissement:Etablissement') {
            $etablissement = $graph->resource();
        }
	}

}


?>
