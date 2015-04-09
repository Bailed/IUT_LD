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

		$graph -> dump();  

        // affichage d'un étudiant 
        if ($graph->type() == "etudiant:Etudiant") {

          $id = $graph -> label($uri);
          $nom = $graph->getLiteral($uri, "etudiant:nom") ;
          $prenom = $graph->getLiteral($uri, "etudiant:prenom") ;
          $groupe = $graph->getResource($uri, "etudiant:groupe") ;

           
          $graphGroupe = EasyRdf_Graph::newAndLoad($groupe);
          $arrayGroupe = array ('nom' => (string) $graphGroupe -> getLiteral($groupe, "groupe:nom"), 'uri' => (string) $groupe); 
          
          $EtudiantJson = array('etudiant' => array('id' =>(string) $id, 'nom' => (string) $nom, 'prenom' => (string) $prenom,'groupe' => $arrayGroupe)) ;  

          return json_encode($EtudiantJson);  

        } elseif ($graph->type() == 'professeur:Professeur') {
            $id = $graph -> label($uri);
            $nom = $graph->getLiteral($uri, "professeur:nom") ;
            $prenom = $graph->getLiteral($uri, "professeur:prenom") ;
            $matiere = $graph->getLiteral($uri, "professeur:matiere") ;
            $departement = $graph->getLiteral($uri, "professeur:departement") ;

            $profJson = array('professeur' => array('id' => (string)$id, 'nom' => (string)$nom, 'prenom' => (string)$prenom, 'matiere' => (string)$matiere, 'departement' => (string)$departement)); 

            return json_encode($profJson);  

        } elseif ($graph->type() == 'groupe:Groupe') {
            $id = $graph -> label($uri);
            $nom = $graph->getLiteral($uri, "groupe:nom") ;
            $annee = $graph->getLiteral($uri, "groupe:annee") ;
            $promo = $graph->getLiteral($uri, "groupe:promo") ;

            $listEtudiant = array(); 

            foreach (($graph->all($uri,'groupe:etudiant')) as $etudiant) {
                $graphEtudiant = EasyRdf_Graph::newAndLoad($etudiant);
                $arrayEtudiant = array ('nom' => (string) $graphEtudiant -> label(), 'uri' => (string) $etudiant); 
                array_push($listEtudiant, $arrayEtudiant);
            }
        

            $groupeJson = array('groupe' => array('id' => (string)$id, 'nom' => (string)$nom, 'annee' => (string)$annee, 'promo' => (string)$promo, 'etudiant' => $listEtudiant )); 

            return json_encode($groupeJson);


        } elseif ($graph->type() == 'promo:Promo') {
            $id = $graph -> label($uri);
            $nom = $graph->getLiteral($uri, "promo:nom") ;
            $annee = $graph->getLiteral($uri, "promo:annee") ;
            $dep = $graph->getLiteral($uri, "promo:departement") ;

            $promoJson = array('groupe' => array('id' => (string)$id, 'nom' => (string)$nom, 'annee' => (string)$annee, 'departement' => (string)$dep )); 

            return json_encode($promoJson);

        } elseif ($graph->type() == 'departement:Departement') {
            $id = $graph -> label($uri);
            $nom = $graph->getLiteral($uri, "departement:nom") ;
            $dep = $graph->getLiteral($uri, "departement:etablissement") ;
            $mat = $graph->getLiteral($uri, "departement:matiere") ;

            $depJson = array('groupe' => array('id' => (string)$id, 'nom' => (string)$nom, 'departement' => (string)$dep, 'matiere' => (string)$mat )); 

            return json_encode($depJson);

  
        } elseif ($graph->type() == 'etablissement:Etablissement') {
            $id = $graph -> label($uri);
            $nom = $graph->getLiteral($uri, "etablissement:nom") ;
            $adresse = $graph->getLiteral($uri, "etablissement:adresse") ;
            $ville = $graph->getLiteral($uri, "etablissement:ville") ;
            $CP = $graph->getLiteral($uri, "etablissement:codepostal") ;
            $dep = $graph->getLiteral($uri, "etablissement:departement") ;
            

            $etJson = array('groupe' => array('id' => (string)$id, 'nom' => (string)$nom, 'adresse' => (string)$adresse, 'ville' => (string)$ville, 'codePostal' => (string)$CP, 'departement' => (string)$dep )); 

            return json_encode($etJson);
            

            $etablissement = $graph->resource();
        }
	}

}


?>
