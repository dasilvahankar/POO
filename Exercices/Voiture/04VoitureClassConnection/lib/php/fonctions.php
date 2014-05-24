<?php
// genererPlaque( ): fonction qui génere une plaque minéralogique au format XXX-999
// ENTREE:
//	> ---
// SORTIE: 
//	> [ $plaque ]: plaque minéralogique
function genererPlaque()
{
	$alpha  = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
	$nombre = '0123456789';
	
	
	$plaque = $alpha[rand(0,25)].$alpha[rand(0,25)].$alpha[rand(0,25)].'-'.$nombre[rand(0,9)].$nombre[rand(0,9)].$nombre[rand(0,9)];
	
	return $plaque;
}
?>