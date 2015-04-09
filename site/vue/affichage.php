<?php

	class affichage
	{
		function genereVueEtudiant()
		{
<<<<<<< HEAD
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
									<select class="selectpicker" name="groupe">
										<option>http://localhost/~MBP-0/IUT_LD/site/ressource/info1goupe1_2014-2015.rdf</option>
										<option>groupe 2</option>
										<option>groupe 3</option>
									</select><br>
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
=======
			?><html>
				<body>
					<form action="index.php" method="post">
					id : <input id="IdentifiantEtudiant" name="IdentifiantEtudiant" type="text">   <br/>
					nom : <input name="nom" type="text">   <br/>
					prenom : <input name="prenom" type="text">   <br/>
					<select name="groupe">
						<option>http://localhost/IUT_LD/site/ressource/info2_groupe1_2014-2015.rdf</option>
						<option>groupe 2</option>
						<option>groupe 3</option>
					</select><br>
					<input id="submit" name="etudiant" type="submit" value="soumettre">
					</form>
				</body>
			</html><?php
>>>>>>> dadc16921a764c0c306fdb4e5aa8def28a151610
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
<<<<<<< HEAD
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
					nom : <input class="form-control" name="nom" type="text">   <br/>
					etablissement : <input class="form-control" name="etablissementD" type="text">   <br/>
					matiere : <input class="form-control" name="matiere" type="text">   <br/>
					<input class="form-control" id="submit" name="departement" type="submit" value="soumettre">
=======
			?><html>
				<body>
					<form action="index.php" method="post">
					nom : <input name="nom" type="text">   <br/>
					etablissement : <input name="etablissementD" type="text">   <br/>
					<input id="submit" name="departement" type="submit" value="soumettre">
>>>>>>> dadc16921a764c0c306fdb4e5aa8def28a151610
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






