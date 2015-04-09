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
					<li data-ng-repeat="item in donnees | filter:filtre | orderBy:maColonne:reverse"><a href="">{{item.id}} | {{item.name}}</a></li>
				</ul>
			</div>
		</div>
	</div>
</div>

<script type="text/javascript" src="vue/js/libs/angular/angular.min.js" chartset="utf-8"></script>
<script type="text/javascript" src="vue/js/libs/angular-resource/angular-resource.min.js" charset="utf-8"></script>
<script src="vue/js/app.js" type="text/javascript"></script>
<script src="vue/js/service.js" type="text/javascript"></script>
<script src="vue/js/controller.js" type="text/javascript"></script>


<?php
include 'includes/footer.php';
include 'includes/script.php';
include 'includes/foot.php';
?>