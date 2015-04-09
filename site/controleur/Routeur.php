<?php

set_include_path(get_include_path() . PATH_SEPARATOR . 'controleur/');
	require_once "ControleurCreation.php";
	/*require_once "ControleurAffichage.php";*/

set_include_path(get_include_path() . PATH_SEPARATOR . 'vue/');
	require_once "vue/affichage.php";



	class Routeur {
		
		private $ctrlCreation;
		/*private $ctrlAffichage;*/
		private $affichage;


		function __construct()
		{
			/*$this->ctrlAffichage = new ControleurAffichage();*/
			$this->ctrlCreation = new ControleurCreation(); 
			$this->affichage = new affichage();
		}

		public function router()
		{
			if (isset($_GET["ajout"])) {
				if ($_GET["ajout"] == "etudiant") {
					$this->affichage->genereVueEtudiant();
				}
				elseif ($_GET["ajout"] == "groupe") {
					$this->affichage->genereVueGroupe();
				}
				elseif ($_GET["ajout"] == "promo") {
					$this->affichage->genereVuePromo();
				}
				elseif ($_GET["ajout"] == "departement") { 
					$this->affichage->genereVueDepartement();
				}
				elseif ($_GET["ajout"] == "etablissement") {
					$this->affichage->genereVueEtablissement();
				}
				elseif ($_GET["ajout"] == "professeur") {
					$this->affichage->genereVueProfesseur();
				}
			}

			elseif (isset($_POST["create"])) {
				if ($_POST["create"] == "etudiant") {
						$this->ctrlCreation->creerEtudiant();
				}
				elseif ($_POST["create"] == "groupe") {
						$this->ctrlCreation->creerGroupe();
				}
				elseif ($_POST["create"] == "promo") {
						$this->ctrlCreation->creerPromo();
				}
				elseif ($_POST["create"] == "professeur") {
						$this->ctrlCreation->creerProfesseur();
				}
				elseif ($_POST["create"] == "etablissement") {
						$this->ctrlCreation->creerEtablissement();
				}
				elseif ($_POST["create"] == "departement") {
						$this->ctrlCreation->creerDepartement();
				}
			}

			elseif (isset($_GET["recherche"])) {
				$this->affichage->recherche();
			}
			elseif (isset($_GET["equipe"])) {
				$this->affichage->equipe();
			}
			elseif (isset($_GET["projet"])) {
				$this->affichage->projet();
			}
			elseif (isset($_GET["contact"])) {
				$this->affichage->contact();
			}

			else{
				$this->affichage->index();
			}

		}
	}


?>
