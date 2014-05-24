<?php
	include_once('lib/php/fonctions.php');
	include_once('lib/php/voiture.class.php');	
?>

<!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="utf-8">
	<title>Voiture: Formulaire et liste de sélection dynamique</title>

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
	<h1>Voiture: Formulaire et liste de sélection dynamique</h1>
</header>

<div id="wrapper">
	
	<!-- Navigation -->	
	<nav>&nbsp;</nav>
	
	<!-- Contenu -->
	<section id="box">
		<article>
			<form name='FormVoiture' method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>">
				<table>
					<tr>
						<td>
							<b><label><b>Propriétaire</b></label></b>
						</td>
						<td><input type="text" name="proprietaire" placeholder="nom du propriétaire" maxlength="30"></td>							
					</tr>					
					<tr><td>&nbsp;</td><td>&nbsp;</td></tr>
					<tr>
						<td>
							<b><label><b>Marque</b></label></b>
						</td>
						<td>
							<select name="marque">
							<?php	
								//connection à la BD
								$connection = ConnectBD();
								
								try
								{
									//Selection de toutes les marques dans la BD
									$resultats = $connection->query('SELECT * FROM marques');

									foreach( $resultats as $marque )
									{
										echo '<option value="'.$marque['m_id'].'.'.$marque['m_nom'].'">'.$marque['m_nom'].'</option>';
									}

									//on libére les résultats de la mémoire
									$resultats->closeCursor();		
									
									//on ferme la connexion à la BD
									unset( $connection );	
								}
								catch(PDOException $e) // en cas d'erreur
								{
									// on affiche un message d'erreur ainsi que les erreurs
									echo '<erreur>Erreur [0023]: Erreur lors de la requête, veuillez contacter votre administrateur!</erreur>';		
									echo '<erreur>Erreur : '.$e->getMessage().'</erreur><br/>';
									echo '<erreur>N° : '.$e->getCode().'</erreur><br/>';
									
									//on arrête l'exécution s'il y a du code après
									exit();
								} 						
							?>								
							</select>
						</td>							
					</tr>					
					<tr><td>&nbsp;</td><td>&nbsp;</td></tr>
					<tr>
						<td>
							<b><label><b>Réservoir</b></label></b>
						</td>
						<td>
							<select name="reservoir">
								<option value="40">40</option>
								<option value="45">45</option>
								<option value="50">50</option>
								<option value="55">55</option>
								<option value="60" selected>60</option>
								<option value="65">65</option>						
								<option value="70">70</option>
								<option value="75">75</option>
								<option value="80">80</option>						
							</select> ℓ
						</td>							
					</tr>					
					<tr>
						<td>
							<b><label><b>Consommation</b></label></b>
						</td>
						<td>
							<select name="consommation">
								<option value="1">1</option>
								<option value="2">2</option>
								<option value="3">3</option>
								<option value="4">4</option>
								<option value="5" selected>5</option>
								<option value="6">6</option>						
								<option value="7">7</option>
								<option value="8">8</option>
								<option value="9">9</option>
								<option value="10">10</option>
							</select> ℓ / 100km				
						</td>							
					</tr>					
					<tr><td>&nbsp;</td><td>&nbsp;</td></tr>	
					<tr>
						<td>
							<b><label><b>Plaque</b></label></b>
						</td>
						<td><input type="text" name="plaque" placeholder="nom du propriétaire" maxlength="30" value="<?php echo genererPlaque(); ?>"></td>							
					</tr>					
					<tr><td>&nbsp;</td><td>&nbsp;</td></tr>	
					<tr>
						<td>
							<input type="submit" name="bouton" value="Afficher">
						</td>
						<td>&nbsp;</td>							
					</tr>
				</table>
			</form>	
		</article>
		
		<article class="center">		
		<?php
			//si l'utilisateur a soumis le formulaire
			if( isset($_POST['bouton']) )
			{
				//recupération des données depuis le formulaire
				$proprietaire= $_POST['proprietaire'];
				$marque 	 = $_POST['marque'];
				$reservoir	 = $_POST['reservoir'];		
				$consommation= $_POST['consommation'];
				$plaque 	 = $_POST['plaque'];
			
				//création d'une nouvelle voiture
				$voiture = new Voiture( $proprietaire,$marque,$reservoir,$consommation,$plaque );

				//affichage des donnéees à l'écran
				?>
				<table>
					<tr>
						<td class="right">
							<img src="img/marques/<?php echo $voiture->MarqueID(); ?>.png">
						</td>
						<td class="left">
							<?php echo $voiture->Proprietaire(); ?><br/>
							<?php echo $voiture->Marque(); ?><br/>
							<?php echo $voiture->Reservoir(); ?> ℓ<br/>
							<?php echo $voiture->Consommation(); ?> ℓ / 100km
						</td>
					</tr>
					<tr>
						<td colspan="2" class="center">
							<plaque><?php echo $voiture->Plaque(); ?></plaque>
						</td>
					</tr>
					<tr>
						<td colspan="2" class="center">
							<?php echo $voiture->AfficherRoute(); ?>
						</td>
					</tr>
					<tr>
						<td colspan="2" class="center">
							<?php echo $voiture->Distance(); ?> km parcourus
						</td>
					</tr>				
				</table>
		<?php
			}
		?>
		</article>
	</section>

</div>
	
</body>
</html>