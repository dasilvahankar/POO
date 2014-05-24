<?php
// === SESSION: classe qui gére les sessions du site
class Session
{
	//variable static, qui est commune à chaque objet crée avec la classe Session
	private static $_sessionExiste = false;
	//variable qui nous dit si un utilisateur est connecté	
	private static $_isConnecte = false;	
	//nombre de sessions ouvertes
	private static $_cptSession = 0;
		
	// === GET =================================
	public static function get( $cle1 , $cle2 = false)
	{
		if( $cle2 == true )
		{
			if( isset($_SESSION[$cle1][$cle2]) )
			{
				return $_SESSION[$cle1][$cle2];		
			}			
		}
		else
		{
			if( isset($_SESSION[$cle1]) )
			{
				return $_SESSION[$cle1];	
			}					
		}
		return false;
	}
	//est-ce qu'il y a une connection?
	public static function isConnecte()
	{
		return self::$_isConnecte;
	}		
	//est-ce que la session est ouverte?
	public static function getEtat()
	{
		return self::$_sessionExiste;
	}		
	//recupération du compteur
	public static function getcptSession()
	{
		return self::$_cptSession;	
	}		
	// === SET =================================
	//création et initialisation d'une variable de session 
	public static function set( $nom , $valeur)
	{
		//initialisation de la variable de session
		$_SESSION[ $nom ] = $valeur;
		//connection de l'utilisateur
		self::$_isConnecte = true;
		//incrementation du nombre de variables de session
		self::cptSession();		
	}		
	// === AUTRES===============================
	//ouverture de session
	public static function ouvrir()
	{
		if( !self::$_sessionExiste )
		{
			session_start();
			self::$_sessionExiste = true;
		}
	}
	//fermeture de la session
	public static function fermer()
	{
		//détruit toutes les variables de la session
		session_unset();
		//détruit la session
		session_destroy();	
		//redirection vers la page d'accueil
		header('refresh: 3;url=index.php');
	}		
	//affiche tout le contenu de $_SESSION
	public static function afficher()
	{
		echo '<pre>';
		var_dump( $_SESSION );
		echo '</pre>';			
	}
	//incrémentation du compteur
	public static function cptSession()
	{
		self::$_cptSession++;	
	}	
}
?>