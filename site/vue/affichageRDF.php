<?php
	
	class affichageRDF
		{
			function afficheEtu($uri) {
				
				include 'model/model.php';
				include 'includes/head.php';
				include 'includes/nav.php';
				require_once "controleur/ControleurAffichage.php";
				$ctrl = new ControleurAffichage(); 
				$rt = $ctrl -> afficher($uri); 
				?>	
				<div class="container">
					<div class="row">
					<div class="col-md-4"></div>
					<div class="col-md-4">
						<ul>
							<li><b>Nom : </b><?php print $rt['nom'] ?></li>
							<li><b>Prénom : </b><?php print $rt['prenom'] ?></li>
							<li><b>Groupe : </b>
							<form action="index.php" method="post">
								<input type="hidden" name="affichage" value="true">
								<input type="hidden" name="type" value="groupe">
								<input type="hidden" name="uri" value=<?php print $rt['uri'] ?>>
								<input class="mysubmit" type="submit" value=<?php print $rt['groupe'] ?>>
							</form></li>
					</div>						
					</div>
				</div>
				
				<?php 
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
				$rt = $ctrl -> afficher($uri); 
				?>	
				<div class="container">
					<div class="row">
					<div class="col-md-4"></div>
					<div class="col-md-4">
						<ul>
							<li><b>Nom : </b><?php print $rt['nom'] ?></li>
							<li><b>Prénom : </b><?php print $rt['prenom'] ?></li>
							<li><b>Matière : </b><?php print $rt['matiere'] ?></li>
							<li><b>Département : </b>
							<form action="index.php" method="post">
								<input type="hidden" name="affichage" value="true">
								<input type="hidden" name="type" value="departement">
								<input type="hidden" name="uri" value=<?php print $rt['dep_uri'] ?>>
								<input class="mysubmit" type="submit" value=<?php print $rt['dep_nom'] ?>>
							</form></li>
					</div>						
					</div>
				</div>
				
				<?php 
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
				$rt = $ctrl -> afficher($uri);
				?>	
				<div class="container">
					<div class="row">
					<div class="col-md-4"></div>
					<div class="col-md-4">
						<ul>
							<li><b>Nom : </b><?php print $rt['nom'] ?></li>
							<li><b>Promo : </b>
							<form action="index.php" method="post">
								<input type="hidden" name="affichage" value="true">
								<input type="hidden" name="type" value="promo">
								<input type="hidden" name="uri" value=<?php print $rt['uri_promo'] ?>>
								<input class="mysubmit" type="submit" value=<?php print $rt['nom_promo'] ?>>
							</form></li>
							<li><b>Etudiant : </b></li>

						<?php	foreach ($rt['etudiant'] as $row) {
							echo '						
							<li><form action="index.php" method="post">
								<input type="hidden" name="affichage" value="true">
								<input type="hidden" name="type" value="etudiant">
								<input type="hidden" name="uri" value="'.$row['uri'].'">
								<input class="mysubmit" type="submit" value="'.$row['nom'].'">
							</form></li>';
						}
						?>
					</div>						
					</div>
				</div>
				<?php 
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
				$rt = $ctrl -> afficher($uri);
				?>	
				<div class="container">
					<div class="row">
					<div class="col-md-4"></div>
					<div class="col-md-4">
						<ul>
							<li><b>Nom : </b><?php print $rt['nom'] ?></li>
							<li><b>Année : </b><?php print $rt['annee'] ?></li>
							<li><b>Département : </b>
							<form action="index.php" method="post">
								<input type="hidden" name="affichage" value="true">
								<input type="hidden" name="type" value="departement">
								<input type="hidden" name="uri" value=<?php print $rt['departement_uri'] ?>>
								<input class="mysubmit" type="submit" value=<?php print $rt['departement_nom'] ?>>
							</form></li>
							<li><b>Groupe(s) : </b></li>
						
						<?php	foreach ($rt['groupe'] as $rows) {
									
							echo '						
							<li><form action="index.php" method="post">
								<input type="hidden" name="affichage" value="true">
								<input type="hidden" name="type" value="groupe">
								<input type="hidden" name="uri" value="'.$rows['uri'].'">
								<input class="mysubmit" type="submit" value="'.$rows['nom'].'">
							</form></li>';
							
						}
						?>
					</div>						
					</div>
				</div>
				<?php 
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
				$rt = $ctrl -> afficher($uri);
				?>	
				<div class="container">
					<div class="row">
					<div class="col-md-4"></div>
					<div class="col-md-4">
						<ul>
							<li><b>Nom : </b><?php print $rt['nom'] ?></li>
							<li><b>Etablissement : </b>
							<form action="index.php" method="post">
								<input type="hidden" name="affichage" value="true">
								<input type="hidden" name="type" value="etablissement">
								<input type="hidden" name="uri" value=<?php print $rt['etablissement_uri'] ?>>
								<input class="mysubmit" type="submit" value=<?php print $rt['etablissement_nom'] ?>>
							</form></li>
							<li><b>Matières(s) : </b></li>
						
						<?php	foreach ($rt['matiere'] as $row) {
									echo '						
									<li>'.$row.'</li>';
									}
								
						?>
						<li><b>Professeur(s) : </b></li>
						<?php	foreach ($rt['professeur'] as $row) {
							echo '						
							<li><form action="index.php" method="post">
								<input type="hidden" name="affichage" value="true">
								<input type="hidden" name="type" value="professeur">
								<input type="hidden" name="uri" value="'.$row['uri'].'">
								<input class="mysubmit" type="submit" value="'.$row['nom'].'">
							</form></li>';
						}
						?>
						<li><b>Promotion(s) : </b></li>
						<?php	foreach ($rt['promo'] as $row) {
							echo '						
							<li><form action="index.php" method="post">
								<input type="hidden" name="affichage" value="true">
								<input type="hidden" name="type" value="promo">
								<input type="hidden" name="uri" value="'.$row['uri'].'">
								<input class="mysubmit" type="submit" value="'.$row['nom'].'">
							</form></li>';
						}
						?>
					</div>						
					</div>
				</div>
				<?php 
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
				$rt = $ctrl -> afficher($uri);
				?>	
				<div class="container">
					<div class="row">
					<div class="col-md-4"></div>
					<div class="col-md-4">
						<ul>
							<li><b>Nom : </b><?php print $rt['nom'] ?></li>
							<li><b>Adresse : </b><?php print $rt['adresse'] ?></li>
							<li><b>Ville: </b><?php print $rt['ville'] ?></li>
							<li><b>Code Postal </b><?php print $rt['codePostal'] ?></li>
							<li><b>Département </b><?php print $rt['departement'] ?></li>
							<li><b>Formation(s) : </b></li>
						<?php	foreach ($rt['dep'] as $row) {
							echo '						
							<li><form action="index.php" method="post">
								<input type="hidden" name="affichage" value="true">
								<input type="hidden" name="type" value="departement">
								<input type="hidden" name="uri" value="'.$row['uri'].'">
								<input class="mysubmit" type="submit" value="'.$row['nom'].'">
							</form></li>';
						}
						?>
							
					</div>						
					</div>
				</div>
				<?php 
				include 'includes/footer.php';
				include 'includes/script.php';
				include 'includes/foot.php';

			}
		}

?>
