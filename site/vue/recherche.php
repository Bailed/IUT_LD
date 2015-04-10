<?php
include 'model/model.php';
include 'includes/head.php';
include 'includes/nav.php';
?>
<div class="container">
	<div class="row">
		<div class="col-md-12 text-center">
		<div data-ng-controller="MainCtrl">
			<label><h2>Je cherche ... </h2></label>
			<input type="text" name="filtre" id="filtre" placeholder="Un professeur, un étudiant, ..." data-ng-model="filtre.$">
			
				<ul class="malist">
					<button  ng-click="test = {item.label}" class="elmaList" ng-repeat="item in donnees | filter:filtre | limitTo:3 ">{{item.label}}</button>
				</ul>

				test : {{test}}
			</div>
		</div>
	</div>
</div>


<?php
include 'includes/footer.php';
include 'includes/script.php';
include 'includes/foot.php';
?>