<?php
include 'model/model.php';
include 'includes/head.php';
include 'includes/nav.php';
?>
<div class="container">
	<div class="row">
		<div class="col-md-12 text-center">
			<label><h2>Je cherche ... </h2></label>
			<input type="text" name="filtre" id="filtre" placeholder="Un professeur, un étudiant, ..." data-ng-model="filtre.$" placeholder="..." class="monfiltre">
			<div data-ng-controller="MainCtrl">
				<ul class="malist">
					<li data-ng-repeat="item in donnees | filter:filtre | orderBy:maColonne:reverse"><a href="">{{item.type}} | {{item.label}}</a></li>
				</ul>
			</div>
		</div>
	</div>
</div>


<?php
include 'includes/footer.php';
include 'includes/script.php';
include 'includes/foot.php';
?>