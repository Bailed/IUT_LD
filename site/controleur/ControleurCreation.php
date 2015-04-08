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

			$uri = __DIR__."/../ressource/".$_POST['IdentifiantEtudiant'].".rdf"; 

	        $graph = new EasyRdf_Graph();
	        $graph->addResource($uri, "rdf:type", "etudiant:Etudiant");
	        $graph->addLiteral($uri, "etudiant:nom",$_POST["nom"]);
	        $graph->addLiteral($uri, "etudiant:prenom", $_POST["prenom"]);
	        $graph->addLiteral($uri, "etudiant:id", $_POST['IdentifiantEtudiant']);
	       	$groupe = $graph -> resource($_POST['groupe']); 
	        $graph->add($uri, "etudiant:groupe", $groupe );
	        $graph->add($uri, "rdfs:label", $_POST['IdentifiantEtudiant']);

	        $graphAjout = EasyRdf_Graph::newAndLoad($groupe);
	        $graphAjout->addResource($groupe, "groupe:etudiant",$uri);
	        $labelGroupe = $graphAjout -> label(); 

	        $file = __DIR__.'/../ressource/bibli.json'; 
			$biblio = json_decode(file_get_contents($file));
			$ajout = array ('type' => "etudiant", 'label' => $_POST['IdentifiantEtudiant'], 'uri' => $uri);
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
	    }
	}

	// créer un professeur
	public function creerProfesseur() { 
		$Nom_Prenom = null; 
		if (isset($_POST['nom']) && isset($_POST['prenom'])) {
			$Nom_Prenom = $_POST['nom']."_".$_POST['prenom'];
		}

		if (!is_null($Nom_Prenom)) {

			$uri = __DIR__."/../ressource/".$Nom_Prenom.".rdf"; 

	        $graph = new EasyRdf_Graph();
	        $graph->addResource($uri, "rdf:type", "professeur:Professeur");
	        $graph->addLiteral($uri, "professeur:nom", $_POST['nom']);
	        $graph->addLiteral($uri, "professeur:prenom", $_POST['prenom']);
	        $graph->addLiteral($uri, "professeur:matiere", $_POST['matiere']);

	        $departement =  $graph -> resource($_POST['departement']);
	        $graph->addResource($uri, "professeur:departement", $departement);
	        $graph->add($uri, "rdfs:label", $Nom_Prenom);

	        $graphAjout = EasyRdf_Graph::newAndLoad($departement);
	       	$graphAjout->addResource($departement, "departement:professeur",$uri);
	       	$graphAjout->addLiteral($departement, "departement:matiere", $_POST["matiere"]);
	        $labelDepartement = $graphAjout -> label();

	        $file = __DIR__.'/../ressource/bibli.json'; 
			$biblio = json_decode(file_get_contents($file));
			$ajout = array ('type' => "professeur", 'label' => $Nom_Prenom, 'uri' => $uri);
			array_push($biblio, $ajout); 
			file_put_contents($file, json_encode($biblio));

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
		}
	}

	// créer un groupe
	public function creerGroupe() {  
		$Nom_Annee = null; 
		$graph = new EasyRdf_Graph();
		$promo = $graph -> resource($_POST['promo']);
		$graphAjout = EasyRdf_Graph::newAndLoad($promo);
		$idPromo = $graphAjout->getLiteral($_POST["promo"], "promo:nom");

		if (isset($_POST['nom']) && isset($_POST['annee'])) {
			$Nom_Annee = $idPromo."_".$_POST['nom']."_".$_POST['annee'];
		}

		if (!is_null($Nom_Annee)) {

	        $uri = __DIR__."/../ressource/".$Nom_Annee.".rdf"; 

	        $graph->addResource($uri, "rdf:type", "groupe:Groupe");
	        $graph->addLiteral($uri, "groupe:nom", $_POST['nom']);
	        $graph->addLiteral($uri, "groupe:annee", $_POST['annee']);

	        
	        $graph->addLiteral($uri, "groupe:promo", $promo);
	        $graph->add($uri, "rdfs:label", $Nom_Annee);

	        
	        $graphAjout->addResource($promo, "promo:groupe",$uri);
	        $labelPromo = $graphAjout -> label(); 

	        $file = __DIR__.'/../ressource/bibli.json'; 
			$biblio = json_decode(file_get_contents($file));
			$ajout = array ('type' => "groupe", 'label' => $Nom_Annee, 'uri' => $uri);
			array_push($biblio, $ajout); 
			file_put_contents($file, json_encode($biblio));

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
	    }
	}

	// créer une promo
	public function creerPromo() {  
		$Nom_Annee = null; 
		if (isset($_POST['nom']) && isset($_POST['annee'])) {
			$Nom_Annee = $_POST['nom']."_".$_POST['annee'];
		}

		if (!is_null($Nom_Annee)) {

			$uri = __DIR__."/../ressource/".$Nom_Annee.".rdf";

	        $graph = new EasyRdf_Graph();
	        $graph->addResource($uri, "rdf:type", "promo:Promo");
	        $graph->addLiteral($uri, "promo:nom", $_POST['nom']);
	        $graph->addLiteral($uri, "promo:annee", $_POST['annee']);

	        $departement =  $graph -> resource($_POST['departement']);
	        $graph->addLiteral($uri, "promo:departement", $departement);
	        $graph->add($uri, "rdfs:label", $Nom_Annee);

			$graphAjout = EasyRdf_Graph::newAndLoad($departement);
	       	$graphAjout->addResource($departement, "departement:promo",$uri);
	        $labelDepartement = $graphAjout -> label();

	        $file = __DIR__.'/../ressource/bibli.json'; 
			$biblio = json_decode(file_get_contents($file));
			$ajout = array ('type' => "promo", 'label' => $Nom_Annee, 'uri' => $uri);
			array_push($biblio, $ajout); 
			file_put_contents($file, json_encode($biblio));

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
	    }
	}

	// créer un departement
	public function creerDepartement() {  
		$Nom_Etablissement = null;
		$graph = new EasyRdf_Graph();
		$etablissement =  $graph -> resource($_POST['etablissementD']);
		$graphAjout = EasyRdf_Graph::newAndLoad($etablissement);

		if (isset($_POST['nom']) && isset($_POST['etablissementD'])) {
			$Nom_Etablissement = $_POST['nom']."_".($graphAjout -> label());
		}

		if (!is_null($Nom_Etablissement)) {

			$uri = __DIR__."/../ressource/".$Nom_Etablissement.".rdf"; 
	        
	        $graph->addResource($uri, "rdf:type", "departement:Departement");
	        $graph->addLiteral($uri, "departement:nom", $_POST['nom']);
	        $graph->addResource($uri, "departement:etablissement", $etablissement);
	        $graph->add($uri, "rdfs:label", $Nom_Etablissement);
	     
	       	$graphAjout->addResource($etablissement, "etablissement:departement",$uri);
	        $labelEtablissement = $graphAjout -> label();

	        $file = __DIR__.'/../ressource/bibli.json'; 
			$biblio = json_decode(file_get_contents($file));
			$ajout = array ('type' => "departement", 'label' => $Nom_Etablissement, 'uri' => $uri);
			array_push($biblio, $ajout); 
			file_put_contents($file, json_encode($biblio));
	       
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
	    }
	}

	 // créer un Etablissement
	public function creerEtablissement() {  
		$Nom_Ville = null; 
		if (isset($_POST['nom']) && isset($_POST['ville'])) {
			$Nom_Ville = $_POST['nom']."_".$_POST['ville'];
		}

		if (!is_null($Nom_Ville)) {

			$uri = __DIR__."/../ressource/".$Nom_Ville.".rdf"; 

	        $graph = new EasyRdf_Graph();
	        $graph->addResource($uri, "rdf:type", "etablissement:Etablissement");
	        $graph->addLiteral($uri, "etablissement:nom", $_POST['nom']);
	        $graph->addLiteral($uri, "etablissement:adresse", $_POST['adresse']);
	        $graph->addLiteral($uri, "etablissement:ville", $_POST['ville']);
	        $graph->addLiteral($uri, "etablissement:codepostal", $_POST['codepostal']);
	        $graph->addLiteral($uri, "etablissement:departement", $_POST["departement"]);
	        $graph->add($uri, "rdfs:label", $Nom_Ville);

	        $file = __DIR__.'/../ressource/bibli.json'; 
			$biblio = json_decode(file_get_contents($file));
			$ajout = array ('type' => "etablissement", 'label' => $Nom_Ville, 'uri' => $uri);
			array_push($biblio, $ajout); 
			file_put_contents($file, json_encode($biblio));

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

			    	echo "Etablissement crée";
				}
			}
	    }
	}
}
?>
