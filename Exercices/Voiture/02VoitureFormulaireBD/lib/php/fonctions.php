<?php
// connectBD( ): fonction de connection à la BD
// ENTREE:
//	> ---
// SORTIE: 
//	> [ $connection ]: si tout se passe bien
//	> [ exit()      ]: s'il y a un problème de connection
function connectBD()
{
	try // essai de connection à la BD
	{
        // connection à la BD avec PDO
		$connection = new PDO('mysql:host=127.0.0.1;dbname=voitures','root','');
		
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