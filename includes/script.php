<script src="js/libs/jquery/dist/jquery.min.js"></script>
<script src="js/libs/jquery.cookie.js"></script>
<script type="text/javascript">
(function($){

	if($.cookie('cookiebar') === undefined) {
	$('body').append('<div class="cookie" id="cookie">En poursuivant votre navigation sur ce site, vous acceptez l’utilisation de cookies pour réaliser des statistiques de visites anonymes.<div id="cookie_btn" class="cookie_btn"><a href="#">Ok</a></div><a href="http://www.google.com/intl/fr_ALL/analytics/index.html">En savoir plus</a></div>');
	$("nav.navbartop").css("margin-top", "2%");
	};
	$('#cookie_btn').click(function(e){
		e.preventDefault();
		$.cookie('cookiebar', "viewed");
	})

	
})(jQuery);


</script>

<script src="js/libs/bootstrap/dist/js/bootstrap.min.js"></script>
<script src="js/nlform.js"></script>
<script type="text/javascript">
	var nlform = new NLForm( document.getElementById( 'nl-form' ) );	
</script>