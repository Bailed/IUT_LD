<?php

	class affichage
	{
		function genereVueEtudiant()
		{
			?><html>
				<body>
					<form action="index.php" method="post">
					id : <input id="IdentifiantEtudiant" name="IdentifiantEtudiant" type="text">   <br/>
					nom : <input name="nom" type="text">   <br/>
					prenom : <input name="prenom" type="text">   <br/>
					<select name="groupe">
						<option>groupe 1</option>
						<option>groupe 2</option>
						<option>groupe 3</option>
					</select><br>
					<input id="submit" name="etudiant" type="submit" value="soumettre">
					</form>
				</body>
			</html><?php
		}

		function genereVueGroupe()
		{
			?><html>
				<body>
					<form action="index.php" method="post">
					nom : <input name="nom" type="text">   <br/>
					annee : <input name="annee" type="text">   <br/>
					promo : <input name="promo" type="text">   <br/>
					<input id="submit" name="groupe" type="submit" value="soumettre">
					</form>
				</body>
			</html><?php
		}

		function genereVueProfesseur()
		{
			?><html>
				<body>
					<form action="index.php" method="post">
					nom : <input name="nom" type="text">   <br/>
					prenom : <input name="prenom" type="text">   <br/>
					matiere : <input name="matiere" type="text">   <br/>
					departement : <input name="departement" type="text">   <br/>
					<input id="submit" name="professeur" type="submit" value="soumettre">
					</form>
				</body>
			</html><?php
		}

		function genereVuePromo()
		{
			?><html>
				<body>
					<form action="index.php" method="post">
					nom : <input name="nom" type="text">   <br/>
					annee : <input name="annee" type="text">   <br/>
					departement : <input name="departement" type="text">   <br/>
					<input id="submit" name="promo" type="submit" value="soumettre">
					</form>
				</body>
			</html><?php
		}

		function genereVueDepartement()
		{
			?><html>
				<body>
					<form action="index.php" method="post">
					nom : <input name="nom" type="text">   <br/>
					etablissement : <input name="etablissementD" type="text">   <br/>
					matiere : <input name="matiere" type="text">   <br/>
					<input id="submit" name="departement" type="submit" value="soumettre">
					</form>
				</body>
			</html><?php
		}

		function genereVueEtablissement()
		{
			?><html>
				<body>
					<form action="index.php" method="post">
					nom : <input name="nom" type="text">   <br/>
					adresse : <input name="adresse" type="text">   <br/>
					ville : <input name="ville" type="text">   <br/>
					code postal : <input name="codepostal" type="text">   <br/>
					departement : <input name="departement" type="text">   <br/>
					<input id="submit" name="etablissement" type="submit" value="soumettre">
					</form>
				</body>
			</html><?php
		}

		function index()
		{
			?><html>
				<body>
					<ul>
						<li><a href="index.php?etudiant=true">etudiant</a></li>
						<li><a href="index.php?groupe=true">groupe</a></li>
						<li><a href="index.php?promo=true">promo</a></li>
						<li><a href="index.php?etablissement=true">etablissement</a></li>
						<li><a href="index.php?departement=true">departement</a></li>
						<li><a href="index.php?professeur=true">professeur</a></li>
					</ul>
				</body>
			</html><?php
		}
	}
?>






