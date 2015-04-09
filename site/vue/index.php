<?php
include 'model/model.php';
include 'includes/head.php';
include 'includes/nav.php';

?>
<div class="main clearfix" div ng-controller="MainCtrl">
	<form id="nl-form" class="nl-form" action="" methode="GET">
		Je souhaite ajouter 
		<select name="ajout">
			<option value="etudiant" selected>un étudiant</option>
			<option value="professeur">un professeur</option>
			<option value="groupe">un groupe</option>
			<option value="etablissement">un établissement</option>
			<option value="promo">une promotion</option>
			<option value="departement">un département</option>
		</select>		
		<p class="text-center"><button class="nl-submit text-center" type="submit">Envoyer ma demande</button></p>
		<div class="nl-overlay"></div>
	</form>
</div>
<script src="vue/js/nlform.js"></script>
<script type="text/javascript">
	var nlform = new NLForm( document.getElementById( 'nl-form' ) );	
</script>
<?
include 'includes/footer.php';
include 'includes/script.php';
include 'includes/foot.php';
?>