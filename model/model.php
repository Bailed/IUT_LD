<?php
function isActive() {
	$tmp = "http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']; 
	$path = strrev(explode( '/',strrev($tmp))[0]);
	return $path;
}

function isTitle() {
	$tmp = "http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']; 
	$path = ucfirst(explode('.',strrev(explode( '/',strrev($tmp))[0]))[0]);
	echo $path;
}

