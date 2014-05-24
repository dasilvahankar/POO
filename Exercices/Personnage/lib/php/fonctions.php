<?php
// fonction de connection à la BD
function connectBD()
{
	try // essai de connection à la BD
	{
        // essai de connection à la BD avec PDO
		$connection = new PDO('mysql:host=127.0.0.1;dbname=monjeu', 'root', '');
		
		// on oblige mysql a prendre en compte le UTF8
		$connection->exec('SET NAMES utf8');
		
        // renvoi de des données de connection à la BD
		return $connection;		
	}
	catch(Exception $e) // en cas d'erreur la connection ne s'effectue pas 
	{
		echo '<erreur>Erreur [001]: Impossible de se connecter à la BD, veuillez contacter votre administrateur!</erreur><br/>';		
		echo '<erreur>Erreur : '.$e->getMessage().'</erreur><br/>';
		echo '<erreur>N° : '.$e->getCode().'</erreur><br/>';			
        
        //on arrête l'exécution s'il y a du code après
        exit();
	}    
}
?>