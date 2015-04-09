<?php
include 'model/model.php';
include 'includes/head.php';
include 'includes/nav.php';
?>
<div class="main clearfix">
	<form id="nl-form" class="nl-form">
		Je souhaite ajouter 
		<select>
			<option value="1" selected>un étudiant</option>
			<option value="2">un professeur</option>
			<option value="3">une matière</option>
		</select> à
		<select>
			<option value="1" selected>un groupe</option>
			<option value="2">une promotion</option>
			<option value="3">département informatique</option>
		</select>
		<p class="text-center"><button class="nl-submit text-center" type="submit">Envoyer ma demande</button></p>
		<div class="nl-overlay"></div>
	</form>
</div>
<?php
include 'includes/footer.php';
include 'includes/script.php';
include 'includes/foot.php';
?>