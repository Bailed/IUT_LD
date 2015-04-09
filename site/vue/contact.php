<?php
include 'model/model.php';
include 'includes/head.php';
include 'includes/nav.php';
?>
	<div class="container first-header bloc">
		<div class="row">		
			<div class="class-md-12"><h1 class="text-center">Nous contacter :</h1></div>			
		</div>
	</div>
	<div class="container bloc">
		<div class="row bloc">
			<div class="col-md-4 text-justify">
				<div>
					<h2>Contact - Projet LD</h2>
					<h4><i>Envoyer nous un mail !</i></h4>
					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
					tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
					quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
					consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
					cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
					proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
				</div>
			</div>
			<div class="col-md-8">				 
         		<form class="form-horizontal" action="" method="post">
        			<fieldset>
	            		<legend class="text-center">Formulaire de contact</legend>
	    	            <!-- Name input-->
			            <div class="form-group">
			              <label class="col-md-3 control-label" for="name">Nom</label>
			              <div class="col-md-9">
			                <input id="name" name="name" type="text" placeholder="Votre nom" class="form-control">
			              </div>
			            </div>
			            <!-- Email input-->
			            <div class="form-group">
			              <label class="col-md-3 control-label" for="email">Email</label>
			              <div class="col-md-9">
			                <input id="email" name="email" type="text" placeholder="Votre email" class="form-control">
			              </div>
			            </div>
			            <!-- Message body -->
			            <div class="form-group">
			              <label class="col-md-3 control-label" for="message">Message</label>
			              <div class="col-md-9">
			                <textarea class="form-control" id="message" name="message" placeholder="Entrer votre message ici ..." rows="5"></textarea>
			              </div>
			            </div>
			    		<!-- Form actions -->
			            <div class="form-group">
			              <div class="col-md-12 text-right">
			                <button type="submit" class="btn btn-default btn-lg">Envoyer</button>
			              </div>
			            </div>
          			</fieldset>
          		</form>        
			</div>
		</div>
	</div>
<?php
include 'includes/footer.php';
include 'includes/script.php';
include 'includes/foot.php';
?>