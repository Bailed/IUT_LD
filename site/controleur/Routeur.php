<?php
	require_once "ControleurCreation.php";
	/*require_once "ControleurAffichage.php";*/
	require_once __DIR__."/../vue/affichage.php";

	class Routeur {
		
		private $ctrlCreation;
		/*private $ctrlAffichage;*/
		private $affichage;


		function __construct()
		{
		/*	$this->ctrlAffichage = new ControleurAffichage();*/
			$this->ctrlCreation = new ControleurCreation(); 
			$this->affichage = new affichage();
		}

		public function router()
		{
			if (isset($_GET["etudiant"])) {
				$this->affichage->genereVueEtudiant();
				if (isset($_POST["soumettre"])) {
					$this->ctrlCreation->creerEtudiant();
				}
			}
			elseif (isset($_GET["groupe"])) {
				$this->affichage->genereVueGroupe();
				if (isset($_POST["soumettre"])) {
					$this->ctrlCreation->creerGroupe();
				}
			}
			elseif (isset($_GET["promo"])) {
				$this->affichage->genereVuePromo();
				if (isset($_POST["soumettre"])) {
					$this->ctrlCreation->creerPromo();
				}
			}
			elseif (isset($_GET["departement"])) {
				$this->affichage->genereVueDepartement();
				if (isset($_POST["soumettre"])) {
					$this->ctrlCreation->creerDepartement();
				}
			}
			elseif (isset($_GET["etablissement"])) {
				$this->affichage->genereVueEtablissement();
				if (isset($_POST["soumettre"])) {
					$this->ctrlCreation->creerEtablissement();
				}
			}
			elseif (isset($_GET["professeur"])) {
				$this->affichage->genereVueProfesseur();
				if (isset($_POST["soumettre"])) {
					$this->ctrlCreation->creerProfesseur();
				}
			}
			else{
				$this->affichage->index();
			}
		}
	}


?>
