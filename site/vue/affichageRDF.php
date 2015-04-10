<?php
	
	class affichageRDF
		{
			function afficheEtu($uri) {
				
				include 'model/model.php';
				include 'includes/head.php';
				include 'includes/nav.php';
				require_once "controleur/ControleurAffichage.php";

				$ctrl = new ControleurAffichage(); 
				$test = $ctrl -> afficher($uri); 
				print_r($test);

				include 'includes/footer.php';
				include 'includes/script.php';
				include 'includes/foot.php';

			}

			function afficheProf($uri) {
				include 'model/model.php';
				include 'includes/head.php';
				include 'includes/nav.php';
				require_once "controleur/ControleurAffichage.php";

				$ctrl = new ControleurAffichage(); 
				$test = $ctrl -> afficher($uri); 
				print_r($test);

				include 'includes/footer.php';
				include 'includes/script.php';
				include 'includes/foot.php';

			}

			function afficheGroupe($uri) {
				include 'model/model.php';
				include 'includes/head.php';
				include 'includes/nav.php';
				require_once "controleur/ControleurAffichage.php";

				$ctrl = new ControleurAffichage(); 
				$test = $ctrl -> afficher($uri); 
				print_r($test);

				include 'includes/footer.php';
				include 'includes/script.php';
				include 'includes/foot.php';

			}

			function affichePromo($uri) {
				include 'model/model.php';
				include 'includes/head.php';
				include 'includes/nav.php';
				require_once "controleur/ControleurAffichage.php";

				$ctrl = new ControleurAffichage(); 
				$test = $ctrl -> afficher($uri); 
				print_r($test);

				include 'includes/footer.php';
				include 'includes/script.php';
				include 'includes/foot.php';

			}

			function afficheDep($uri) {
				include 'model/model.php';
				include 'includes/head.php';
				include 'includes/nav.php';
				require_once "controleur/ControleurAffichage.php";

				$ctrl = new ControleurAffichage(); 
				$test = $ctrl -> afficher($uri); 
				print_r($test);

				include 'includes/footer.php';
				include 'includes/script.php';
				include 'includes/foot.php';

			}

			function afficheEtab($uri) {
				include 'model/model.php';
				include 'includes/head.php';
				include 'includes/nav.php';
				require_once "controleur/ControleurAffichage.php";

				$ctrl = new ControleurAffichage(); 
				$test = $ctrl -> afficher($uri); 
				print_r($test);

				include 'includes/footer.php';
				include 'includes/script.php';
				include 'includes/foot.php';

			}
		}

?>
