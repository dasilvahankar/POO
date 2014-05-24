<!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="utf-8">
	<title>Voiture: procédural</title>

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
	<h1>Voiture: procédural</h1>
</header>

<div id="wrapper">
	
	<?php
		$proprio		= 'James';
		$marque			= 'Mercedes';
		$reservoir		= 60;
		$consommation	= 10;
		$plaque			= 'BOND-007';
		
		echo '<br/><br/>';
		echo '<img src="img/'.$marque.'.png"><br/><br/>';		
		echo $proprio.'<br/>';
		echo $marque.'<br/>';
		echo $reservoir.'ℓ<br/>';
		echo $consommation.'ℓ / 100km<br/>';
		echo $plaque.'<br/>';
		
		$distance = ($reservoir/$consommation)*100;

		echo '<img src="img/debut.png">';
		//echo '<img src="img/route.png" height="16" width="'.$distance.'">';			
		for( $i=0 ; $i<$distance ; $i+=10)
		{
			echo '<img src="img/route.png">';
		}
		echo '<img src="img/fin.png"><br/><br/>';
		echo $distance.' km parcourus';
	?>

</div>
	
</body>
</html>