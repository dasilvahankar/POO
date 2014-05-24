<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr">
<head>
	<title>Mon blog</title>
	<meta charset="utf-8">
<link href="style.css" rel="stylesheet" type="text/css" /> 
</head>
	
<body>
	<h1>Mon super blog !</h1>
	<p>Derniers billets du blog :</p>
 
	<?php
	// Connexion à la base de données
	try
	{
		$bdd = new PDO('mysql:host=localhost;dbname=test', 'root', '');
	}
	catch(Exception $e)
	{
			die('Erreur : '.$e->getMessage());
	}

	// On récupère les 5 derniers (car on trie sur la date de création, le plus récent d'abord) billets
	$req = $bdd->query('SELECT id, titre, contenu, DATE_FORMAT(date_creation, \'%d/%m/%Y à %Hh%imin%ss\') AS date_creation_fr FROM billets ORDER BY date_creation DESC LIMIT 0, 5');

	while ($donnees = $req->fetch())
	{
	?>
	<div class="news">
		<h3>
			<?php echo htmlspecialchars($donnees['titre']); ?>
			<em>le <?php echo $donnees['date_creation_fr']; ?></em>
		</h3>
		
		<p>
		<?php
		// On affiche le contenu du billet
		echo nl2br(htmlspecialchars($donnees['contenu']));
		?>
		<br />
		<em><a href="commentaires.php?billet=<?php echo $donnees['id']; ?>">Commentaires</a></em>
		</p>
	</div>
	<?php
	} // Fin de la boucle des billets
	$req->closeCursor();
	?>
</body>
</html>