<nav class="navbar navbar-default">
  			<div class="container">
 
    			<div class="navbar-header">
    			  <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
				        <span class="sr-only">Toggle navigation</span>
				        <span class="icon-bar"></span>
				        <span class="icon-bar"></span>
				        <span class="icon-bar"></span>
			      </button>
      			<a class="navbar-brand" href="index.php">IUT Nantes | Linked Data</a>
   				</div>

    <!-- Collapse Nav Bar -->

    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li<?php if((isActive() == 'index.php') or (isActive() == '')) {echo ' class="active"';}?>><a href="index.php">Création</a></li>
        <li<?php if(isActive() == 'recherche.php') {echo ' class="active"';}?>><a href="recherche.php">Recherche</a></li>
      </ul>


      <!-- Nav Bar Menu Droite -->


      <ul class="nav navbar-nav navbar-right">
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">En savoir plus <span class="caret"></span></a>
          <ul class="dropdown-menu" role="menu">
            <li<?php if(isActive() == 'equipe.php') {echo ' class="active"';}?>><a href="equipe.php">Equipe</a></li>
            <li<?php if(isActive() == 'projet.php') {echo ' class="active"';}?>><a href="projet.php">Projet</a></li>
            <li class="divider"></li>
            <li<?php if(isActive() == 'contact.php') {echo ' class="active"';}?>><a href="contact.php">Contact</a></li>
          </ul>
        </li>
      </ul>
    </div>
  </div>
  </nav>