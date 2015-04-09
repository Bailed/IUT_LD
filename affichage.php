<?php
include 'model/model.php';
include 'includes/head.php';
include 'includes/nav.php';
?>
<div class="container">
	<div class="row">
		<div class="col-md-12 text-center">
			<h2>Affichage</h2>
		</div>
		<div class="col-md-4 text-center"></div>
		<div class="col-md-4 text-center">
			<form>
			  <div class="form-group">
			    <label for="exampleInputEmail1">ID Etudiant</label>
			    <input type="text" class="form-control" placeholder="EXXXXXXX">
			  </div>
			  <div class="form-group">
			    <label for="exampleInputPassword1">Nom</label>
			    <input type="text" class="form-control" id="" placeholder="Nom">
			  </div>
			   <div class="form-group">
			    <label for="">Prénom</label>
			    <input type="text" class="form-control" id="" placeholder="Prénom">
			  </div>
			   <div class="form-group">
			    <label for="exampleInputPassword1">Groupe</label>
			    <select name="groupe" id="exampleInputGroup">
			    	<option value="groupe1">Groupe 1 Info 1</option>
			    	<option value="groupe2">Groupe 2</option>
			    	<option value="groupe3">Groupe 3</option>
			    </select>
			  </div>

			  
			  <button type="submit" class="btn btn-default">Submit</button>
			</form>
		</div>
		<div class="col-md-4 text-center"></div>
	</div>
</div>


<script type="text/javascript" src="js/libs/angular/angular.min.js" chartset="utf-8"></script>
<script type="text/javascript" src="js/libs/angular-resource/angular-resource.min.js" charset="utf-8"></script>
<script src="js/app.js" type="text/javascript"></script>
<script src="js/service.js" type="text/javascript"></script>
<script src="js/controller.js" type="text/javascript"></script>


<?php
include 'includes/footer.php';
include 'includes/script.php';
include 'includes/foot.php';
?>