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

          $id = $graph -> label($uri);
          $nom = $graph->getLiteral($uri, "etudiant:nom") ;
          $prenom = $graph->getLiteral($uri, "etudiant:prenom") ;
          $groupe = $graph->getLiteral($uri, "etudiant:groupe") ;

          $EtudiantJson = array('etudiant' => array('id' =>(string) $id, 'nom' => (string) $nom, 'prenom' => (string) $prenom,'groupe' => (string) $groupe )) ;  
   
          return json_encode($EtudiantJson);  

        } elseif ($graph->type() == 'professeur:Professeur') {
            $id = $graph -> label($uri);
            $nom = $graph->getLiteral($uri, "professeur:nom") ;
            $prenom = $graph->getLiteral($uri, "professeur:prenom") ;
            $matiere = $graph->getLiteral($uri, "professeur:matiere") ;
            $departement = $graph->getLiteral($uri, "professeur:departement") ;

            $profJson = array('professeur' => array('id' => $id, 'nom' => $nom, 'prenom' => $prenom, 'matiere' => $matiere, 'departement' => $departement)); 

            return json_encode($profJson);  

        } elseif ($graph->type() == 'groupe:Groupe') {
            $id = $graph -> label($uri);
            $nom = $graph->getLiteral($uri, "groupe:nom") ;
            $annee = $graph->getLiteral($uri, "groupe:annee") ;
            $promo = $graph->getLiteral($uri, "groupe:promo") ;
            

            foreach ($graph -> all('groupe:etudiant') as $etudiant) {
              
            }


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
