<?php

set_include_path(get_include_path() . PATH_SEPARATOR . 'modele/');
	require_once "/../modele/EasyRdf.php";
    require_once "/../modele/html_tag_helpers.php";


class ControleurCreation {

	public function __construct(){ 
	}

  	// créer un étudiant
	public function creerEtudiant() {  
		if (isset($_POST['IdentifiantEtudiant'])) {


			echo $_POST["prenom"]; 
			echo $_POST["nom"]; 

	        $graph = new EasyRdf_Graph();
	        $graph->addResource("http://localhost/IUT_LD/site/ressource/".$_POST['IdentifiantEtudiant'].".rdf", "rdf:type", "etudiant:Etudiant");
	        $graph->addLiteral("http://localhost/IUT_LD/site/ressource/".$_POST['IdentifiantEtudiant'].".rdf", "etudiant:nom",$_POST["nom"]);
	        $graph->addLiteral("http://localhost/IUT_LD/site/ressource/".$_POST['IdentifiantEtudiant'].".rdf", "etudiant:prenom", $_POST["prenom"]);
	        $graph->addLiteral("http://localhost/IUT_LD/site/ressource/".$_POST['IdentifiantEtudiant'].".rdf", "etudiant:id", $_POST['IdentifiantEtudiant']);
	       
	       	$groupe = $graph -> resource($_POST['groupe']); 
	        $graph->add("http://localhost/IUT_LD/site/ressource/".$_POST['IdentifiantEtudiant'].".rdf", "etudiant:groupe", $groupe );
	        $graph->add("http://localhost/IUT_LD/site/ressource/".$_POST['IdentifiantEtudiant'].".rdf", "rdfs:label", $_POST['IdentifiantEtudiant']);

	        $graphAjout = EasyRdf_Graph::newAndLoad($groupe);
	        $graphAjout->addResource($groupe, "groupe:etudiant","http://localhost/IUT_LD/site/ressource/".$_POST['IdentifiantEtudiant'].".rdf");
	        $labelGroupe = $graphAjout -> label(); 

	        $file = __DIR__.'/../ressource/bibli.json'; 
			$biblio = json_decode(file_get_contents($file));
			$ajout = array ('type' => "etudiant", 'nom' => $_POST['IdentifiantEtudiant'], 'uri' => "http://localhost/IUT_LD/site/ressource/".$_POST['IdentifiantEtudiant'].".rdf");// how to add `number` automatic `+1`, make it to `4` with php code?
			array_push($biblio, $ajout); 
			file_put_contents($file, json_encode($biblio));

	        # Finally output the graph

	        $data = $graph->serialise("rdfxml");
	        if (!is_scalar($data)) {
	            $data = var_export($data, true);
	        }


		    $file = "ressource/".$_POST['IdentifiantEtudiant'].".rdf"; 
		    $dir = scandir("ressource/");
			foreach ($dir as $name) {
				if (basename($name, ".rdf") == $_POST['IdentifiantEtudiant']) {
					echo "<br> Le fichier existe <br>";
				}
				else{
					$myfile = fopen($file, "w"); 
			    	fwrite($myfile,$data); 
			    	fclose($myfile);
				}
			}

			echo "Etudiant crée"; 

			 $data = $graphAjout->serialise("rdfxml");
	        if (!is_scalar($data)) {
	            $data = var_export($data, true);
	        }


		    $file = "ressource/".$labelGroupe.".rdf"; 
			$myfile = fopen($file, "w"); 
			fwrite($myfile,$data); 
			fclose($myfile);

			echo "groupe modifie"; 
			 
	    }
	}

	// créer un professeur
	public function creerProfesseur() { 
		$Nom_Prenom = null; 
		if (isset($_POST['nom']) && isset($_POST['prenom'])) {
			$Nom_Prenom = $_POST['nom']."_".$_POST['prenom'];
		}

		if (!is_null($Nom_Prenom)) {

	        $graph = new EasyRdf_Graph();
	        $graph->addResource("http://localhost/IUT_LD/site/ressource/".$Nom_Prenom.".rdf", "rdf:type", "professeur:Professeur");
	        $graph->addLiteral("http://localhost/IUT_LD/site/ressource/".$Nom_Prenom.".rdf", "professeur:nom", $_POST['nom']);
	        $graph->addLiteral("http://localhost/IUT_LD/site/ressource/".$Nom_Prenom.".rdf", "professeur:prenom", $_POST['prenom']);
	        $graph->addLiteral("http://localhost/IUT_LD/site/ressource/".$Nom_Prenom.".rdf", "professeur:matiere", $_POST['matiere']);

	        $departement =  $graph -> resource($_POST['departement']);
	        $graph->addResource("http://localhost/IUT_LD/site/ressource/".$Nom_Prenom.".rdf", "professeur:departement", $departement);
	        $graph->add("http://localhost/IUT_LD/site/ressource/".$Nom_Prenom.".rdf", "rdfs:label", $Nom_Prenom);

	        $graphAjout = EasyRdf_Graph::newAndLoad($departement);
	       	$graphAjout->addResource($departement, "departement:professeur","http://localhost/IUT_LD/site/ressource/".$Nom_Prenom.".rdf");
	       	$graphAjout->addLiteral($departement, "departement:matiere", $_POST["matiere"]);
	        $labelDepartement = $graphAjout -> label();

	        # Finally output the graph

	        $data = $graph->serialise("rdfxml");
	        if (!is_scalar($data)) {
	            $data = var_export($data, true);
	        }

		    $file = "ressource/".$Nom_Prenom.".rdf"; 

		    $dir = scandir("ressource/");
			foreach ($dir as $name) {
				if (basename($name, ".rdf") == $Nom_Prenom) {
					echo "<br> Le fichier existe <br>";
				}
				else{
					$myfile = fopen($file, "w"); 
			    	fwrite($myfile,$data); 
			    	fclose($myfile);
				}
			}

		    echo "Professeur crée";  

	    	$data = $graphAjout->serialise("rdfxml");
	        if (!is_scalar($data)) {
	            $data = var_export($data, true);
	        }

		    $file = "ressource/".$labelDepartement.".rdf"; 
			$myfile = fopen($file, "w"); 
			fwrite($myfile,$data); 
			fclose($myfile);

		    echo "Departement modifie";  
		}
	}

	// créer un groupe
	public function creerGroupe() {  
		$Nom_Annee = null; 
		if (isset($_POST['nom']) && isset($_POST['annee'])) {
			$Nom_Annee = $_POST['nom']."_".$_POST['annee'];
		}

		if (!is_null($Nom_Annee)) {

	        $graph = new EasyRdf_Graph();
	        $graph->addResource("http://localhost/IUT_LD/site/ressource/".$Nom_Annee.".rdf", "rdf:type", "groupe:Groupe");
	        $graph->addLiteral("http://localhost/IUT_LD/site/ressource/".$Nom_Annee.".rdf", "groupe:nom", $_POST['nom']);
	        $graph->addLiteral("http://localhost/IUT_LD/site/ressource/".$Nom_Annee.".rdf", "groupe:annee", $_POST['annee']);

	        $promo = $graph -> resource($_POST['promo']);
	        $graph->addLiteral("http://localhost/IUT_LD/site/ressource/".$Nom_Annee.".rdf", "groupe:promo", $promo);
	        $graph->add("http://localhost/IUT_LD/site/ressource/".$Nom_Annee.".rdf", "rdfs:label", $Nom_Annee);

	        $graphAjout = EasyRdf_Graph::newAndLoad($promo);
	        $graphAjout->addResource($promo, "promo:groupe","http://localhost/IUT_LD/site/ressource/".$Nom_Annee.".rdf");
	        $labelPromo = $graphAjout -> label(); 

	        # Finally output the graph

	        $data = $graph->serialise("rdfxml");
	        if (!is_scalar($data)) {
	            $data = var_export($data, true);
	        }

		    $file = "ressource/".$Nom_Annee.".rdf"; 
			$dir = scandir("ressource/");
			foreach ($dir as $name) {
				if (basename($name, ".rdf") == $Nom_Annee) {
					echo "<br> Le fichier existe <br>";
				}
				else{
					$myfile = fopen($file, "w"); 
			    	fwrite($myfile,$data); 
			    	fclose($myfile);
				}
			}

		    echo "Groupe crée"; 

		     $data = $graphAjout->serialise("rdfxml");
	        if (!is_scalar($data)) {
	            $data = var_export($data, true);
	        }

		    $file = "ressource/".$labelPromo.".rdf"; 
			$myfile = fopen($file, "w"); 
			fwrite($myfile,$data); 
			fclose($myfile);

		    echo "Promo modifie";  
	    }
	}

	// créer une promo
	public function creerPromo() {  
		$Nom_Annee = null; 
		if (isset($_POST['nom']) && isset($_POST['annee'])) {
			$Nom_Annee = $_POST['nom']."_".$_POST['annee'];
		}

		if (!is_null($Nom_Annee)) {

	        $graph = new EasyRdf_Graph();
	        $graph->addResource("http://localhost/IUT_LD/site/ressource/".$Nom_Annee.".rdf", "rdf:type", "promo:Promo");
	        $graph->addLiteral("http://localhost/IUT_LD/site/ressource/".$Nom_Annee.".rdf", "promo:nom", $_POST['nom']);
	        $graph->addLiteral("http://localhost/IUT_LD/site/ressource/".$Nom_Annee.".rdf", "promo:annee", $_POST['annee']);

	        $departement =  $graph -> resource($_POST['departement']);
	        $graph->addLiteral("http://localhost/IUT_LD/site/ressource/".$Nom_Annee.".rdf", "promo:departement", $departement);
	        $graph->add("http://localhost/IUT_LD/site/ressource/".$Nom_Annee.".rdf", "rdfs:label", $Nom_Annee);

			$graphAjout = EasyRdf_Graph::newAndLoad($departement);
	       	$graphAjout->addResource($departement, "departement:promo","http://localhost/IUT_LD/site/ressource/".$Nom_Annee.".rdf");
	        $labelDepartement = $graphAjout -> label();
	        # Finally output the graph

	        $data = $graph->serialise("rdfxml");
	        if (!is_scalar($data)) {
	            $data = var_export($data, true);
	        }

		    $file = "ressource/".$Nom_Annee.".rdf"; 
		    $dir = scandir("ressource/");
			foreach ($dir as $name) {
				if (basename($name, ".rdf") == $Nom_Annee) {
					echo "<br> Le fichier existe <br>";
				}
				else{
					$myfile = fopen($file, "w"); 
			    	fwrite($myfile,$data); 
			    	fclose($myfile);
				}
			} 

		    echo "Promo crée"; 

		    $data = $graphAjout->serialise("rdfxml");
	        if (!is_scalar($data)) {
	            $data = var_export($data, true);
	        }

		    $file = "ressource/".$labelDepartement.".rdf"; 
			$myfile = fopen($file, "w"); 
			fwrite($myfile,$data); 
			fclose($myfile);

		    echo "Departement modifie"; 
	    }
	}

	// créer un departement
	public function creerDepartement() {  
		$Nom_Etablissement = null;
		if (isset($_POST['nom']) && isset($_POST['etablissementD'])) {
			$Nom_Etablissement = $_POST['nom']."_".$_POST['etablissementD'];
		}

		if (!is_null($Nom_Etablissement)) {

	        $graph = new EasyRdf_Graph();
	        $graph->addResource("http://localhost/IUT_LD/site/ressource/".$Nom_Etablissement.".rdf", "rdf:type", "departement:Departement");
	        $graph->addLiteral("http://localhost/IUT_LD/site/ressource/".$Nom_Etablissement.".rdf", "departement:nom", $_POST['nom']);

	        $etablissement =  $graph -> resource($_POST['etablissementD']);
	        $graph->addLiteral("http://localhost/IUT_LD/site/ressource/".$Nom_Etablissement.".rdf", "departement:etablissement", $etablissement);
	        //$graph->addLiteral("http://localhost/IUT_LD/site/ressource/".$Nom_Etablissement.".rdf", "departement:matiere", $_POST['matiere']);
	        $graph->add("http://localhost/IUT_LD/site/ressource/".$Nom_Etablissement.".rdf", "rdfs:label", $Nom_Etablissement);

	       	$graphAjout = EasyRdf_Graph::newAndLoad($etablissement);
	       	$graphAjout->addResource($etablissement, "etablissement:departement","http://localhost/IUT_LD/site/ressource/".$Nom_Etablissement.".rdf");
	        $labelEtablissement = $graphAjout -> label();
	        # Finally output the graph

	        $data = $graph->serialise("rdfxml");
	        if (!is_scalar($data)) {
	            $data = var_export($data, true);
	        }

		    $file = "ressource/".$Nom_Etablissement.".rdf"; 
			$dir = scandir("ressource/");
			foreach ($dir as $name) {
				if (basename($name, ".rdf") == $Nom_Etablissement) {
					echo "<br> Le fichier existe <br>";
				}
				else{
					$myfile = fopen($file, "w"); 
			    	fwrite($myfile,$data); 
			    	fclose($myfile);
				}
			}

		    echo "Departement crée"; 

		    $data = $graphAjout->serialise("rdfxml");
	        if (!is_scalar($data)) {
	            $data = var_export($data, true);
	        }

		    $file = "ressource/".$labelEtablissement.".rdf"; 
			$myfile = fopen($file, "w"); 
			fwrite($myfile,$data); 
			fclose($myfile);

		    echo "Etablissement modifie";  
	    }
	}

	 // créer un Etablissement
	public function creerEtablissement() {  
		$Nom_Ville = null; 

		if (isset($_POST['nom']) && isset($_POST['ville'])) {
			$Nom_Ville = $_POST['nom']."_".$_POST['ville'];

		}

		if (!is_null($Nom_Ville)) {

	        $graph = new EasyRdf_Graph();
	        $graph->addResource("http://localhost/IUT_LD/site/ressource/".$Nom_Ville.".rdf", "rdf:type", "etablissement:Etablissement");
	        $graph->addLiteral("http://localhost/IUT_LD/site/ressource/".$Nom_Ville.".rdf", "etablissement:nom", $_POST['nom']);
	        $graph->addLiteral("http://localhost/IUT_LD/site/ressource/".$Nom_Ville.".rdf", "etablissement:adresse", $_POST['adresse']);
	        $graph->addLiteral("http://localhost/IUT_LD/site/ressource/".$Nom_Ville.".rdf", "etablissement:ville", $_POST['ville']);
	        $graph->addLiteral("http://localhost/IUT_LD/site/ressource/".$Nom_Ville.".rdf", "etablissement:codepostal", $_POST['codepostal']);

	        $departement =  $graph -> resource($_POST['departement']);
	        $graph->addLiteral("http://localhost/IUT_LD/site/ressource/".$Nom_Ville.".rdf", "etablissement:departement", $departement);
	        $graph->add("http://localhost/IUT_LD/site/ressource/".$Nom_Ville.".rdf", "rdfs:label", $Nom_Ville);

	        $graphAjout = EasyRdf_Graph::newAndLoad($departement);
	       	$graphAjout->addResource($departement, "departement:professeur","http://localhost/IUT_LD/site/ressource/".$Nom_Ville.".rdf");
	        $labelDepartement = $graphAjout -> label();

	        # Finally output the graph

	        $data = $graph->serialise("rdfxml");
	        if (!is_scalar($data)) {
	            $data = var_export($data, true);
	        }

		    $file = "ressource/".$Nom_Ville.".rdf"; 
			$dir = scandir("ressource/");
			foreach ($dir as $name) {
				if (basename($name, ".rdf") == $Nom_Ville) {
					echo "<br> Le fichier existe <br>";
				}
				else{
					$myfile = fopen($file, "w"); 
			    	fwrite($myfile,$data); 
			    	fclose($myfile);
				}
			}

		    echo "Etablissement crée";  

		    $data = $graphAjout->serialise("rdfxml");
	        if (!is_scalar($data)) {
	            $data = var_export($data, true);
	        }

		    $file = "ressource/".$labelDepartement.".rdf"; 
			$myfile = fopen($file, "w"); 
			fwrite($myfile,$data); 
			fclose($myfile);

		    echo "Departement modifie"; 
	    }
	}

}


?>
