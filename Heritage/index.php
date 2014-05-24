<?php
	// === INCLUDE ==========================================
	//ajout des librairies(classes, fonctions,...) externes
	include_once('lib/php/vehicule.class.php');
	include_once('lib/php/voiture.class.php');	
?>

<!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="utf-8">
	<title>Héritage: Parent(vehicule) et fille(voiture)</title>

	<!-- Feuilles de styles -->
	<link rel="stylesheet" href="css/styles.css" type="text/css">
	<link rel="stylesheet" href="css/shCore.css" type="text/css">
	<link rel="stylesheet" href="css/shThemeDefault.css" type="text/css">

	<!-- Scripts -->
	<script type="text/javascript" src="js/shCore.js"></script>
	<script type="text/javascript" src="js/shBrushPhp.js"></script>	
</head>

<body>
<!-- Entête -->
<header>	
	<h1>Héritage: Parent(vehicule) et fille(voiture)</h1>
</header>

<div id="wrapper">
	
	<!-- Navigation -->	
	<nav>&nbsp;</nav>
	
	<!-- Contenu -->
	<section id="box">
		<article>

		<?php
			//création d'un objet de type Vehicule( poids , vitesse max , couleur , prix )
			$vroom = new Vehicule( 80 , 240 , '#d1ceb2' , 8500 );
			$vroom->afficher();		
			
			$voiture = new Voiture( 4 , 6 , 850 , 240 , '#00a0e9' , 18000 );
			$voiture->afficher();
			
			echo $voiture->getConsommation().' litres/100km<br/>' ;
			echo 'toujours sur '.$voiture->getRoues().' roues!<br/>';
		?>
		
		</article>
	</section>

</div>
	
</body>
</html>