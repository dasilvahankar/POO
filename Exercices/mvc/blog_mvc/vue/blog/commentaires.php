<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr">
<head>
	<title>Mon blog</title>
	<meta charset="utf-8">
<link href="style.css" rel="stylesheet" type="text/css" /> 
</head>
	
<body>
	<h1>Mon super blog !</h1>
	<h2>Commentaires</h2>
	<p><a href="index.php?session=commentaires">Retour à la liste des billets</a></p>
 
	<?php
	foreach($commentaires as $commentaire)
	{
	?>
		<p><b><?php echo htmlspecialchars($commentaire['auteur']); ?></b> le <?php echo $commentaire['date_commentaire_fr']; ?></p>
		<p><?php echo nl2br(htmlspecialchars($commentaire['commentaire'])); ?></p>
	<?php
	} // Fin de la boucle des commentaires
	?>
	
</body>
</html>