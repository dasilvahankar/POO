<?php
	include_once('lib/php/voiture.class.php');
?>

<!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="utf-8">
	<title>Voiture: vrOom vrOom</title>

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
	<h1>Voiture: vrOom vrOom</h1>
</header>

<div id="wrapper">
	
	<?php
		//création d'une nouvelle voiture
		$voiture = new Voiture( 'James','Mercedes',60,6,'BOND-007' );

		//affichage des donnéees à l'écran
		echo '<br/><br/>';
		echo '<img src="img/'.$voiture->marque().'.png"><br/><br/>';		
		echo $voiture->proprietaire().'<br/>';
		echo $voiture->marque().'<br/>';
		echo $voiture->Reservoir().'l<br/>';
		echo $voiture->Consommation().'l / 100km<br/>';
		echo $voiture->Plaque().'<br/>';
		//affichage de la route depuis la méthode afficherRoute de la classe Voiture
		//l'idéal serait d'avoir une fonction plutôt qu'une méthode, 
		//afin de ne pas mélanger l'affichage avec notre classe
		$voiture->afficherRoute();
		echo $voiture->Distance().' km parcourus';
	?>

	</section>
</div>
	
</body>
</html>