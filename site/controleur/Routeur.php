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
			if (isset($_GET["etudiant"])) {
				$this->affichage->genereVueEtudiant();
			}
			elseif (isset($_GET["groupe"])) {
				$this->affichage->genereVueGroupe();
			}
			elseif (isset($_GET["promo"])) {
				$this->affichage->genereVuePromo();
			}
			elseif (isset($_GET["departement"])) {
				echo "coucou4"; 
				$this->affichage->genereVueDepartement();
			}
			elseif (isset($_GET["etablissement"])) {
				$this->affichage->genereVueEtablissement();
			}
			elseif (isset($_GET["professeur"])) {
				$this->affichage->genereVueProfesseur();
			}
			elseif (isset($_POST["etudiant"])) {
					$this->ctrlCreation->creerEtudiant();
			}
			elseif (isset($_POST["groupe"])) {
					$this->ctrlCreation->creerGroupe();
			}
			elseif (isset($_POST["promo"])) {
					$this->ctrlCreation->creerPromo();
			}
			elseif (isset($_POST["professeur"])) {
					$this->ctrlCreation->creerProfesseur();
			}
			elseif (isset($_POST["etablissement"])) {
					$this->ctrlCreation->creerEtablissement();
			}
			elseif (isset($_POST["departement"])) {
					$this->ctrlCreation->creerDepartement();
			}
			else{
				$this->affichage->index();
			}

		}
	}


?>
