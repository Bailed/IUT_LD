<?php

set_include_path(get_include_path() . PATH_SEPARATOR . '../modele/');
    require_once "EasyRdf.php";
    require_once "html_tag_helpers.php";


class ControleurAffichage {

	public function __construct(){ 
	}

  	// renvois les données d'un fichier rdf
	public function afficher() {  

		$graph = EasyRdf_Graph::newAndLoad($_REQUEST['uri']);
        if ($graph->type() == 'etudiant:Etudiant') {
            $etudiant = $graph->resource();

            $etudiant->get('etudiant:id')
            $etudiant->get('etudiant:nom')
            $etudiant->get('etudiant:prenom')
            $etudiant->get('etudiant:')


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
