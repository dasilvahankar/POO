<?php
	// == CLASSE Connection=======================================
	// ===========================================================
	class Connection
	{
		// == DECLARATIIONS ======================================
		// =======================================================		
		private $_sgbd; 	//SGBD utilisé (mysql, oracle,...)
		private $_serveur;	//adresse du serveur (localhost,...)
		private $_bd;		//nom de la BD			
		private $_login;	//login de la BD
		private $_mdp;   	//mot de passe de la BD
		private $_connection; //objet PDO
		
		//=== GET ================================================
		// =======================================================		
		//renvoie le SGBD utilisé
		public function getSGBD()
		{
			return $this->_SGBD;
		}
		//renvoie l'adresse du serveur
		public function getServeur()
		{
			return $this->_serveur;
		}			
		//renvoie le nom de la BD
		public function getBD()
		{
			return $this->_BD;
		}
		//renvoie le login
		public function getLogin()
		{
			return $this->_login;
		}		
		//renvoie le mot de passe
		public function getMdp()
		{
			return $this->_mdp;
		}
		//renvoie la connection (object PDO)
		public function getConnection()
		{
			return $this->_connection;
		}		
		//=== AUTRES==============================================
		// =======================================================	
		// Select( ): fonction qui exécute un SELECT
		// ENTREE:
		//	> [ $sql ]: la requête sql
		// SORTIE: 
		//	> [ $resultats ]: résultats de la requête
		public function Select( $sql )
		{
			try
			{
				//on exécute la requête
				$resultats = $this->_connection->query( $sql );
				//$resultats = $this->_connection->query( 'mauvaise requête' ); //déclencherait une erreur, c'est à dire pas de résultats en retour
				
				//s'il y a des résultats c'est qu'il n'y a pas d'erreurs
				if( $resultats )
				{
					//renvoi de l'objet des résultats
					return $resultats;
				}
				else //s'il n'y a PAS de résultats: il y a peut-être des erreurs
				{
					//on crée une erreur de type Exception, qui est recupérée par le CATCH qui suit
					throw new Exception( 'Erreur lors du SELECT!' ); //envoi d'un message d'erreur personnalisé
				}				
			}
			catch(Exception $e)// en cas d'erreur
			{
				// on affiche le message d'erreur qui a été recupéré grâce à getMessage()
				echo '<erreur>Erreur [002]: '.$e->getMessage().'</erreur><br/>';
				
				//on arrête l'exécution s'il y a du code après
				exit();
			}
		}
		// Insert( ): fonction qui exécute un INSERT
		// ENTREE:
		//	> [ $sql ]: la requête sql
		// SORTIE: 
		//	> ---		
		public function Insert( $sql )
		{
			try
			{
				//on lance la transaction
				$this->_connection->beginTransaction();
				
				//on exécute la commande sql d'inscription
				$this->_connection->exec( $sql );

				//si jusque là tout se passe bien on valide la transaction
				$this->_connection->commit();
			}
			catch(PDOException $e) // en cas d'erreur
			{
				// on annule la transaction
				$connection->rollback();
				
				// on affiche un message d'erreur ainsi que les erreurs
				echo '<erreur>Erreur [003]: Erreur lors du INSERT!!</erreur>';		
				echo '<erreur>Erreur : '.$e->getMessage().'</erreur><br/>';
				echo '<erreur>N° : '.$e->getCode().'</erreur><br/>';
				
				//on arrête l'exécution s'il y a du code après
				exit();
			}
		}		
	
		//Constructeur de la classe
		public function __construct( $bd,$sgbd='mysql',$serveur='127.0.0.1',$login='root',$mdp='' )
		{
			try // essai de connection à la BD
			{
				// connection à la BD
				//echo $sgbd.':host='.$serveur.';dbname='.$bd.','.$login.','.$mdp;
				$this->_connection = new PDO($sgbd.':host='.$serveur.';dbname='.$bd,$login,$mdp);
								
				// on oblige mysql a prendre en compte le UTF8
				$this->_connection->exec('SET NAMES utf8');
			}
			catch(PDOException $e) // en cas d'erreur la connection ne s'effectue pas 
			{
				echo '<erreur>Erreur [001]: Impossible de se connecter à la BD, veuillez contacter votre administrateur!</erreur><br/>';		
				echo '<erreur>Erreur : '.$e->getMessage().'</erreur><br/>';
				echo '<erreur>N° : '.$e->getCode().'</erreur><br/>';			
				
				//on arrête l'exécution s'il y a du code après
				exit();
			}		
		}					
	}
?>