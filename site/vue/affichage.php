<?php

	class affichage
	{
		function genereVueEtudiant()
		{
			include 'model/model.php';
			include 'includes/head.php';
			include 'includes/nav.php';
			?>
					<div class="container">
						<div class="row">
						<div class="col-md-4"></div>
							<div class="col-md-4 text-center">	
							<div class="form-group">					
								<form action="index.php" method="post">
									<input type="hidden" name="create" value="etudiant">
									<label>ID :</label> <input class="form-control" id="IdentifiantEtudiant" name="IdentifiantEtudiant" type="text">   <br/>
									<label>nom :</label> <input class="form-control" name="nom" type="text">   <br/>
									<label>prénom :</label> <input class="form-control" name="prenom" type="text">   <br/>
									<input class="form-control" name="groupe" type="text">
									<input class="form-control" id="submit" name="etudiant" type="submit" value="soumettre">
							
								</form>
							</div>
						</div>
					</div>
					</div>
			
			<?php
			include 'includes/footer.php';
			include 'includes/script.php';
			include 'includes/foot.php';
		}

		function genereVueGroupe()
		{
			include 'model/model.php';
			include 'includes/head.php';
			include 'includes/nav.php';
			?>
			<div class="container">
						<div class="row">
						<div class="col-md-4"></div>
							<div class="col-md-4 text-center">	
							<div class="form-group">					
								<form action="index.php" method="post">
								<input type="hidden" name="create" value="groupe">
									nom : <input class="form-control" name="nom" type="text">   <br/>
									annee : <input class="form-control" name="annee" type="text">   <br/>
									promo : <input class="form-control" name="promo" type="text">   <br/>
									<input class="form-control" id="submit" name="groupe" type="submit" value="soumettre">
							
								</form>
							</div>
						</div>
					</div>
				</div>
					
			<?php
			include 'includes/footer.php';
			include 'includes/script.php';
			include 'includes/foot.php';
		}

		function genereVueProfesseur()
		{
			include 'model/model.php';
			include 'includes/head.php';
			include 'includes/nav.php';
			?>
			<div class="container">
						<div class="row">
						<div class="col-md-4"></div>
							<div class="col-md-4 text-center">	
							<div class="form-group">					
								<form action="index.php" method="post">
								<input type="hidden" name="create" value="professeur">
					nom : <input class="form-control" name="nom" type="text">   <br/>
					prenom : <input class="form-control" name="prenom" type="text">   <br/>
					matiere : <input class="form-control" name="matiere" type="text">   <br/>
					departement : <input class="form-control" name="departement" type="text">   <br/>
					<input class="form-control" id="submit" name="professeur" type="submit" value="soumettre">
					</form>

							</div>
						</div>
					</div>
					</div>
					
			<?php
			include 'includes/footer.php';
			include 'includes/script.php';
			include 'includes/foot.php';
		}

		function genereVuePromo()
		{
			include 'model/model.php';
			include 'includes/head.php';
			include 'includes/nav.php';
			?>
			<div class="container">
						<div class="row">
						<div class="col-md-4"></div>
							<div class="col-md-4 text-center">	
							<div class="form-group">					
								<form action="index.php" method="post">
								<input type="hidden" name="create" value="promo">
					nom : <input class="form-control" name="nom" type="text">   <br/>
					annee : <input class="form-control" name="annee" type="text">   <br/>
					departement : <input class="form-control" name="departement" type="text">   <br/>
					<input class="form-control" id="submit" name="promo" type="submit" value="soumettre">
					</form>

							</div>
						</div>
					</div>
					</div>
					
			<?php
			include 'includes/footer.php';
			include 'includes/script.php';
			include 'includes/foot.php';
		}

		function genereVueDepartement()
		{
			include 'model/model.php';
			include 'includes/head.php';
			include 'includes/nav.php';
			?>
			<div class="container">
						<div class="row">
						<div class="col-md-4"></div>
							<div class="col-md-4 text-center">	
							<div class="form-group">					
								<form action="index.php" method="post">
								<input type="hidden" name="create" value="departement">
					nom : <input class="form-control" name="nom" type="text">   <br/>
					etablissement : <input class="form-control" name="etablissementD" type="text">   <br/>
					matiere : <input class="form-control" name="matiere" type="text">   <br/>
					<input class="form-control" id="submit" name="departement" type="submit" value="soumettre">
					</form>

							</div>
						</div>
					</div>
					</div>
					
			<?php
			include 'includes/footer.php';
			include 'includes/script.php';
			include 'includes/foot.php';
		}

		function genereVueEtablissement()
		{
			include 'model/model.php';
			include 'includes/head.php';
			include 'includes/nav.php';
			?>
			<div class="container">
						<div class="row">
						<div class="col-md-4"></div>
							<div class="col-md-4 text-center">	
							<div class="form-group">					
								<form action="index.php" method="post">
								<input type="hidden" name="create" value="etablissement">
					nom : <input class="form-control" name="nom" type="text">   <br/>
					adresse : <input class="form-control" name="adresse" type="text">   <br/>
					ville : <input class="form-control" name="ville" type="text">   <br/>
					code postal : <input class="form-control" name="codepostal" type="text">   <br/>
					departement : <input class="form-control" name="departement" type="text">   <br/>
					<input class="form-control" id="submit" name="etablissement" type="submit" value="soumettre">
					</form>

							</div>
						</div>
					</div>
					</div>
					
			<?php
			include 'includes/footer.php';
			include 'includes/script.php';
			include 'includes/foot.php';
		}

		function index()
		{
			include __DIR__.'/index.php';
		}

		function recherche()
		{
			include __DIR__.'/recherche.php';
		}

		function projet()
		{
			include __DIR__.'/projet.php';
		}

		function equipe()
		{
			include __DIR__.'/equipe.php';
		}

		function contact()
		{
			include __DIR__.'/contact.php';
		}
	}
?>






