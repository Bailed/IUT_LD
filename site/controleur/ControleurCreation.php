<?php

set_include_path(get_include_path() . PATH_SEPARATOR . '../modele/');
    require_once "EasyRdf.php";
    require_once "html_tag_helpers.php";


class ControleurCreation {

	public function __construct(){ 
	}

  	// créer un étudiant
	public function creerEtudiant() {  
		if (isset($_POST['IdentifiantEtudiant'])) {

	        $graph = new EasyRdf_Graph();


	        $graph = new EasyRdf_Graph();
	        $graph->addResource("http://localhost/IUT_LD/test/ressource/".$_POST['IdentifiantEtudiant'], "rdf:type", "etudiant:Etudiant");
	        $graph->addLiteral("http://localhost/IUT_LD/test/ressource/".$_POST['IdentifiantEtudiant'], "etudiant:nom", $_POST['nom']);
	        $graph->addLiteral("http://localhost/IUT_LD/test/ressource/".$_POST['IdentifiantEtudiant'], "etudiant:prenom", $_POST['prenom']);
	        $graph->addLiteral("http://localhost/IUT_LD/test/ressource/".$_POST['IdentifiantEtudiant'], "etudiant:id", $_POST['id']);
	        $graph->addLiteral("http://localhost/IUT_LD/test/ressource/".$_POST['IdentifiantEtudiant'], "etudiant:groupe", $_POST['groupe']);
	        $graph->add("http://localhost/IUT_LD/test/ressource/".$_POST['IdentifiantEtudiant'], "rdfs:label", $_POST['IdentifiantEtudiant']);

	        # Finally output the graph

	        $data = $graph->serialise("rdfxml");
	        if (!is_scalar($data)) {
	            $data = var_export($data, true);
	        }

		    $file = "ressource/".$_POST['IdentifiantEtudiant'].".rdf"; 

		    $myfile = fopen($file, "w"); 
		    fwrite($myfile,$data); 
		    fclose($myfile); 

		    echo "Etudiant crée";  
	    }
	}

	// créer un professeur
	public function creerProfesseur() {  
		if (isset($_POST['Nom_Prenom'])) {

	        $graph = new EasyRdf_Graph();


	        $graph = new EasyRdf_Graph();
	        $graph->addResource("http://localhost/IUT_LD/test/ressource/".$_POST['Nom_Prenom'], "rdf:type", "professeur:Professeur");
	        $graph->addLiteral("http://localhost/IUT_LD/test/ressource/".$_POST['Nom_Prenom'], "professeur:nom", $_POST['nom']);
	        $graph->addLiteral("http://localhost/IUT_LD/test/ressource/".$_POST['Nom_Prenom'], "professeur:prenom", $_POST['prenom']);
	        $graph->addLiteral("http://localhost/IUT_LD/test/ressource/".$_POST['Nom_Prenom'], "professeur:matiere", $_POST['matiere']);
	        $graph->addLiteral("http://localhost/IUT_LD/test/ressource/".$_POST['Nom_Prenom'], "professeur:departement", $_POST['departement']);
	        $graph->add("http://localhost/IUT_LD/test/ressource/".$_POST['Nom_Prenom'], "rdfs:label", $_POST['Nom_Prenom']);

	        # Finally output the graph

	        $data = $graph->serialise("rdfxml");
	        if (!is_scalar($data)) {
	            $data = var_export($data, true);
	        }

		    $file = "ressource/".$_POST['Nom_Prenom'].".rdf"; 

		    $myfile = fopen($file, "w"); 
		    fwrite($myfile,$data); 
		    fclose($myfile); 

		    echo "Professeur crée";  
	    }
	}

	// créer un groupe
	public function creerGroupe() {  
		if (isset($_POST['Nom_Annee'])) {

	        $graph = new EasyRdf_Graph();


	        $graph = new EasyRdf_Graph();
	        $graph->addResource("http://localhost/IUT_LD/test/ressource/".$_POST['Nom_Annee'], "rdf:type", "groupe:Groupe");
	        $graph->addLiteral("http://localhost/IUT_LD/test/ressource/".$_POST['Nom_Annee'], "groupe:nom", $_POST['nom']);
	        $graph->addLiteral("http://localhost/IUT_LD/test/ressource/".$_POST['Nom_Annee'], "groupe:annee", $_POST['annee']);
	        $graph->addLiteral("http://localhost/IUT_LD/test/ressource/".$_POST['Nom_Annee'], "groupe:promo", $_POST['promo']);
	        $graph->addLiteral("http://localhost/IUT_LD/test/ressource/".$_POST['Nom_Annee'], "groupe:etudiants", $_POST['etudiants']);
	        $graph->add("http://localhost/IUT_LD/test/ressource/".$_POST['Nom_Annee'], "rdfs:label", $_POST['Nom_Annee']);

	        # Finally output the graph

	        $data = $graph->serialise("rdfxml");
	        if (!is_scalar($data)) {
	            $data = var_export($data, true);
	        }

		    $file = "ressource/".$_POST['Nom_Annee'].".rdf"; 

		    $myfile = fopen($file, "w"); 
		    fwrite($myfile,$data); 
		    fclose($myfile); 

		    echo "Groupe crée";  
	    }
	}

	// créer une promo
	public function creerPromo() {  
		if (isset($_POST['Nom_Annee'])) {

	        $graph = new EasyRdf_Graph();


	        $graph = new EasyRdf_Graph();
	        $graph->addResource("http://localhost/IUT_LD/test/ressource/".$_POST['Nom_Annee'], "rdf:type", "promo:Promo");
	        $graph->addLiteral("http://localhost/IUT_LD/test/ressource/".$_POST['Nom_Annee'], "promo:nom", $_POST['nom']);
	        $graph->addLiteral("http://localhost/IUT_LD/test/ressource/".$_POST['Nom_Annee'], "promo:annee", $_POST['annee']);
	        $graph->addLiteral("http://localhost/IUT_LD/test/ressource/".$_POST['Nom_Annee'], "promo:departement", $_POST['departement']);
	        $graph->addLiteral("http://localhost/IUT_LD/test/ressource/".$_POST['Nom_Annee'], "promo:groupes", $_POST['groupes']);
	        $graph->add("http://localhost/IUT_LD/test/ressource/".$_POST['Nom_Annee'], "rdfs:label", $_POST['Nom_Annee']);

	        # Finally output the graph

	        $data = $graph->serialise("rdfxml");
	        if (!is_scalar($data)) {
	            $data = var_export($data, true);
	        }

		    $file = "ressource/".$_POST['Nom_Annee'].".rdf"; 

		    $myfile = fopen($file, "w"); 
		    fwrite($myfile,$data); 
		    fclose($myfile); 

		    echo "Promo crée";  
	    }
	}

	// créer un departement
	public function creerDepartment() {  
		if (isset($_POST['Nom_Etablissement'])) {

	        $graph = new EasyRdf_Graph();


	        $graph = new EasyRdf_Graph();
	        $graph->addResource("http://localhost/IUT_LD/test/ressource/".$_POST['Nom_Etablissement'], "rdf:type", "departement:Departement");
	        $graph->addLiteral("http://localhost/IUT_LD/test/ressource/".$_POST['Nom_Etablissement'], ":nom", $_POST['nom']);
	        $graph->addLiteral("http://localhost/IUT_LD/test/ressource/".$_POST['Nom_Etablissement'], "departement:etablissement", $_POST['etablissement']);
	        $graph->addLiteral("http://localhost/IUT_LD/test/ressource/".$_POST['Nom_Etablissement'], "departement:matiere", $_POST['matiere']);
	        $graph->addLiteral("http://localhost/IUT_LD/test/ressource/".$_POST['Nom_Etablissement'], "departement:professeur", $_POST['professeur']);
	        $graph->addLiteral("http://localhost/IUT_LD/test/ressource/".$_POST['Nom_Etablissement'], "departement:promo", $_POST['promo']);
	        $graph->add("http://localhost/IUT_LD/test/ressource/".$_POST['Nom_Etablissement'], "rdfs:label", $_POST['Nom_Etablissement']);

	        # Finally output the graph

	        $data = $graph->serialise("rdfxml");
	        if (!is_scalar($data)) {
	            $data = var_export($data, true);
	        }

		    $file = "ressource/".$_POST['Nom_Etablissement'].".rdf"; 

		    $myfile = fopen($file, "w"); 
		    fwrite($myfile,$data); 
		    fclose($myfile); 

		    echo "Departement crée";  
	    }
	}

	 // créer un Etablissement
	public function creerEtablissement() {  
		if (isset($_POST['Nom_Ville'])) {

	        $graph = new EasyRdf_Graph();


	        $graph = new EasyRdf_Graph();
	        $graph->addResource("http://localhost/IUT_LD/test/ressource/".$_POST['Nom_Ville'], "rdf:type", "etablissement:etablissement");
	        $graph->addLiteral("http://localhost/IUT_LD/test/ressource/".$_POST['Nom_Ville'], "etablissement:nom", $_POST['nom']);
	        $graph->addLiteral("http://localhost/IUT_LD/test/ressource/".$_POST['Nom_Ville'], "etablissement:adresse", $_POST['adresse']);
	        $graph->addLiteral("http://localhost/IUT_LD/test/ressource/".$_POST['Nom_Ville'], "etablissement:ville", $_POST['ville']);
	        $graph->addLiteral("http://localhost/IUT_LD/test/ressource/".$_POST['Nom_Ville'], "etablissement:codepostal", $_POST['codepostal']);
	        $graph->addLiteral("http://localhost/IUT_LD/test/ressource/".$_POST['Nom_Ville'], "etablissement:departement", $_POST['departement']);
	        $graph->add("http://localhost/IUT_LD/test/ressource/".$_POST['Nom_Ville'], "rdfs:label", $_POST['Nom_Ville']);

	        # Finally output the graph

	        $data = $graph->serialise("rdfxml");
	        if (!is_scalar($data)) {
	            $data = var_export($data, true);
	        }

		    $file = "ressource/".$_POST['Nom_Ville'].".rdf"; 

		    $myfile = fopen($file, "w"); 
		    fwrite($myfile,$data); 
		    fclose($myfile); 

		    echo "Etablissement crée";  
	    }
	}

}


?>
