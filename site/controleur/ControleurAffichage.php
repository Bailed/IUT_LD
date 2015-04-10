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



        // affichage d'un étudiant 
        if ($graph->type() == "etudiant:Etudiant") {

          $id = $graph -> label($uri);
          $nom = $graph->getLiteral($uri, "etudiant:nom") ;
          $prenom = $graph->getLiteral($uri, "etudiant:prenom") ;
          $groupe = $graph->getResource($uri, "etudiant:groupe") ;

          $graphGroupe = EasyRdf_Graph::newAndLoad($groupe);
          $arrayGroupe = array ('nom' => (string) $graphGroupe -> getLiteral($groupe, "groupe:nom"), 'uri' => (string) $groupe); 
         $EtudiantJson = array('etudiant' => array('id' =>(string) $id, 'nom' => (string) $nom, 'prenom' => (string) $prenom,'groupe' => $arrayGroupe));  
            
            $reponse = array('type' => 'etu','id' => (string) $id, 'nom' => (string) $nom, 'prenom' => (string) $prenom, 'groupe' => (string) $arrayGroupe['nom'], 'uri' => (string) $arrayGroupe['uri']);

            return $reponse;  

        } elseif ($graph->type() == 'professeur:Professeur') {
            $id = $graph -> label($uri);
            $nom = $graph->getLiteral($uri, "professeur:nom") ;
            $prenom = $graph->getLiteral($uri, "professeur:prenom") ;
            $matiere = $graph->getLiteral($uri, "professeur:matiere") ;
            $departement = $graph->getResource($uri, "professeur:departement") ;

            $graphDepartement = EasyRdf_Graph::newAndLoad($departement);
            $arrayDepartement = array ('nom' => (string) $graphDepartement -> getLiteral($departement, "departement:nom"), 'uri' => (string) $departement); 

           $reponse = array('type' => 'prof','id' => (string) $id, 'nom' => (string) $nom, 'prenom' => (string) $prenom, 'matiere' => (string) $matiere, 'dep' => (string) $arrayDepartement['nom'], 'uri' => (string) $arrayDepartement['uri']);

            return $reponse;   

        } elseif ($graph->type() == 'groupe:Groupe') {
            $id = $graph -> label($uri);
            $nom = $graph->getLiteral($uri, "groupe:nom") ;
            $annee = $graph->getLiteral($uri, "groupe:annee") ;
            $promo = $graph->getResource($uri, "groupe:promo") ;

            $graphPromo = EasyRdf_Graph::newAndLoad($promo);
            $arrayPromo = array ('nom' => (string) $graphPromo -> getLiteral($promo, "promo:nom"), 'uri' => (string) $promo); 

            $listEtudiant = array(); 

            foreach (($graph->all($uri,'groupe:etudiant')) as $etudiant) {
                $graphEtudiant = EasyRdf_Graph::newAndLoad($etudiant);
                $arrayEtudiant = array ('nom' => (string) (($graphEtudiant -> getLiteral($etudiant, "etudiant:nom"))." ".($graphEtudiant -> getLiteral($etudiant, "etudiant:prenom"))), 'uri' => (string) $etudiant); 
                array_push($listEtudiant, $arrayEtudiant);
            }

            $groupeJson = array('type' => 'groupe','groupe' => array('id' => (string)$id, 'nom' => (string)$nom, 'annee' => (string)$annee, 'promo' => $arrayPromo, 'etudiant' => $listEtudiant )); 

            return $groupeJson;


        } elseif ($graph->type() == 'promo:Promo') {
            $id = $graph -> label($uri);
            $nom = $graph->getLiteral($uri, "promo:nom") ;
            $annee = $graph->getLiteral($uri, "promo:annee") ;
            $departement = $graph->getResource($uri, "promo:departement") ;

            $graphDepartement = EasyRdf_Graph::newAndLoad($departement);
            $arrayDepartement = array ('nom' => (string) $graphDepartement -> getLiteral($departement, "departement:nom"), 'uri' => (string) $departement); 

            $listGroupe = array(); 

            foreach (($graph->all($uri,'promo:groupe')) as $groupe) {
                $graphGroupe = EasyRdf_Graph::newAndLoad($groupe);
                $arrayGroupe = array ('nom' => (string) $graphGroupe -> getLiteral($groupe, "groupe:nom"), 'uri' => (string) $groupe); 
                array_push($listGroupe, $arrayGroupe);
            }

            $promoJson = array('type' => 'promo','promo' => array('id' => (string)$id, 'nom' => (string)$nom, 'annee' => (string)$annee, 'departement' => $arrayDepartement, 'groupe' => $listGroupe )); 

            return $promoJson;

        } elseif ($graph->type() == 'departement:Departement') {
            $id = $graph -> label($uri);
            $nom = $graph->getLiteral($uri, "departement:nom") ;
            $etablissement = $graph->getResource($uri, "departement:etablissement");

            $graphEtablissement = EasyRdf_Graph::newAndLoad($etablissement);
            $arrayEtablissement = array ('nom' => (string) $graphEtablissement -> getLiteral($etablissement, "etablissement:nom"), 'uri' => (string) $etablissement); 

            $listMatiere = array(); 

            foreach (($graph->all($uri,'departement:matiere')) as $matiere) {
                
                array_push($listMatiere, (string) $matiere);
            }

            $listPromo = array(); 

            foreach (($graph->all($uri,'departement:promo')) as $promo) {
                $graphPromo = EasyRdf_Graph::newAndLoad($promo);
                $arrayPromo = array ('nom' => (string) $graphPromo -> getLiteral($promo, "promo:nom"), 'uri' => (string) $promo); 
                array_push($listPromo, $arrayPromo);
            }

            $listProf = array(); 

            foreach (($graph->all($uri,'departement:professeur')) as $prof) {
                $graphProf = EasyRdf_Graph::newAndLoad($prof);
                $arrayProf = array ('nom' => (string) $graphProf -> label(), 'uri' => (string) $prof); 
                array_push($listProf, $arrayProf);
            }


            $depJson = array('type' => 'dep','departement' => array('id' => (string)$id, 'nom' => (string)$nom, 'etablissement' => $arrayEtablissement, 'matiere' => $listMatiere, 'professeur' => $listProf, 'promo' => $listPromo )); 

            return $depJson;

  
        } elseif ($graph->type() == 'etablissement:Etablissement') {
            $id = $graph -> label($uri);
            $nom = $graph->getLiteral($uri, "etablissement:nom") ;
            $adresse = $graph->getLiteral($uri, "etablissement:adresse") ;
            $ville = $graph->getLiteral($uri, "etablissement:ville") ;
            $CP = $graph->getLiteral($uri, "etablissement:codepostal") ;
            $dep = $graph->getLiteral($uri, "etablissement:departement") ;
            

            $etJson = array('type' => 'etab','etablissement' => array('id' => (string)$id, 'nom' => (string)$nom, 'adresse' => (string)$adresse, 'ville' => (string)$ville, 'codePostal' => (string)$CP, 'departement' => (string)$dep )); 

            return $etJson;
            

            $etablissement = $graph->resource();
        }
	}

}


?>
