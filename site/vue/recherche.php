<?php
include 'model/model.php';
include 'includes/head.php';
include 'includes/nav.php';
?>
<div class="container">
	<div class="row">
	<div class="col-md-4"></div>
		<div class="col-md-4 text-center">
		<div data-ng-controller="MainCtrl">
			<label><h2>Je cherche ... </h2></label>
			<input type="text" name="filtre" id="filtre" class="form-control" data-ng-model="filtre.$">
			
				<ul class="malist">
					<li ng-click="test(item.type,item.uri,item.label)" class="elmaList" ng-repeat="item in donnees | filter:filtre | limitTo:3 "><a href="">{{item.label}}</a></li>
				</ul>

				Selélctionné : {{renvoi[2]}}
			<form action="index.php" method="post">
			<input type="hidden" name="affichage" value="true">
			<input type="hidden" name="type" value="{{renvoi[0]}}">
			<input type="hidden" name="uri" value="{{renvoi[1]}}">
			<input class="form-control" type="submit">
 				
			</form>
	
			</div>
		</div>
	</div>
</div>


<?php
include 'includes/footer.php';
include 'includes/script.php';
include 'includes/foot.php';
?>