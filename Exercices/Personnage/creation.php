<?php 
    include_once('lib/php/fonctions.php'); 
?>
<html lang="fr">
<head>
    <meta charset="utf-8">
	<title>Création personnage</title>
    
    <!-- Feuilles de styles -->
	<link rel="stylesheet" href="css/styles.css" type="text/css">
</head>
<body>
    <header>
        <h1>Création personnage</h1>
    </header>

    <div id="contenu">
		<section>
            <article>

				<?php
				if( isset($_POST['bouton']) )
				{
					// connection à la BD
					$connection = ConnectBD();
					
					$nom 	= $_POST['nom'];
					$vie 	= $_POST['vie'];
					$force 	= $_POST['force'];
					$degats = $_POST['degats'];
						
                    try
                    {
                        //on tente d'exécuter les requêtes suivantes dans une transaction
                        //on lance la transaction
                        $connection->beginTransaction();
                        
                        //les requêtes
                        //$connection->query('SELECT * FROM utilisateurs');
                        
                        $connection->exec('INSERT INTO personnages VALUES(null,"'.$nom.'",'.$vie.','.$force.','.$degats.')');
                        //$nombredelignesmodifiees = $connection->exec("UPDATE membres SET dateinscription="2013-11-20"');
                        
                        //si jusque là tout se passe bien on valide la transaction
                        $connection->commit();
                        
                        //on affiche un petit message de confirmation
                        echo '<info> Le personnage '.$_POST['nom'].' a été crée!</info><br/><br/>';	
                        
                        // sélection de tous les personnages de la table [personnages]
                        $resultats = $connection->query('SELECT * FROM personnages');
                        
                        // recherche du enregistrement suivant
                        //$resultats->fetch(PDO::FETCH_OBJ);

                        // affichage des personnages à l'écran
                        foreach( $resultats as $perso )
                        {
                            echo '<b>ID    :</b> '.$perso['id'].'<br/>';
                            echo '<b>Nom   :</b> '.$perso['nom'].'<br/>';
                            echo '<b>vie   :</b> '.$perso['vie'].'<br/>';
                            echo '<b>Force :</b> '.$perso['force'].'<br/>';
                            echo '<b>Dégâts:</b> '.$perso['degats'].'<br/><br/>';
                        }
                        //On libére les résultats de la mémoire
                        $resultats->closeCursor();
						
						// on ferme la connexion à la BD
						unset( $connection );						
                    }
                    catch(Exception $e) // en cas d'erreur
                    {
                        // on annule la transaction
                        $connection->rollback();
                        
                        // on affiche un message d'erreur ainsi que les erreurs
                        echo '<erreur>Erreur [002]: Erreur lors de la requête, veuillez contacter votre administrateur!</erreur>';		
                        echo '<erreur>Erreur : '.$e->getMessage().'</erreur><br/>';
                        echo '<erreur>N° : '.$e->getCode().'</erreur><br/>';
                        
                        //on arrête l'exécution s'il y a du code après
                        exit();
                    } 
				}
				else
				{
				
				?>
				<form name="FormInscription" method="post" action="creation.php">
					<label><b>Nom</b></label><br/>
					<input type="text" name="nom" placeholder="nom" value="" maxlength="20"><br/><br/>
			
                    <label><b>Vie</b></label><br/>					
					<input type="text" name="vie" placeholder="vie" value="100" maxlength="3"><br/>
					<label><b>Force</b></label><br/>	
					<input type="text" name="force" placeholder="force" value="5" maxlength="3"><br/>
					<label><b>Dégâts</b></label><br/>	
					<input type="text" name="degats" placeholder="dégâts" value="0" maxlength="3"><br/><br/>	

					<input type="submit" name="bouton" value="Créer"><input type="reset" name="Effacer" value="Effacer">
				</form>
				<?php 
				}
				?>

            </article>
        </section>
	</div>
</body>
</html>