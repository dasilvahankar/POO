<?php
	//classe Voiture qui hérite de la classe Vehicule
	class Voiture extends Vehicule
	{
		private $_roues;			//nombre de roues
		private $_consommation;	//consommation de la voiture
		
		//___ GET _________________________________________
		//=================================================		
		public function getRoues()
		{
			return $this->_roues;
		}
		public function getConsommation()
		{
			return $this->_consommation;
		}			
		//___ SET _________________________________________
		//=================================================			
		public function setRoues( $roues )
		{
			try //on essaye le code suivant
			{
				//if( !preg_match('/^[1-9]{1}$/', $roues) )
				if( $roues < 4 ) //erreur si le nombre de roues < 2
				{
					throw new Exception( 'Nombre de roues invalide!' ); //envoi d'un message d'erreur personnalisé
				}
				else
				{
					$this->_roues = $roues;			
				}
			}
			catch(Exception $e)// en cas d'erreur
			{
				// on affiche le message d'erreur qui a été recupéré grâce à getMessage()
				echo '<erreur>Erreur: '.$e->getMessage().'</erreur><br/>';
				
				//on arrête l'exécution s'il y a du code après
				exit();
			}
		}		
		public function setConsommation( $consommation)
		{
			$this->_consommation = $consommation;
		}	
		//___ AUTRES_______________________________________
		//=================================================				
		public function __construct( $roues , $consommation , $poids , $vitesse , $couleur , $prix )
		{
			//initialisation des attributs de cette classe
			$this->_roues		= $roues;				
			$this->_consommation= $consommation;
			
			//appel du constructeur parent pour initialiser le restant des attributs
			parent::__construct( $poids , $vitesse , $couleur , $prix );			

		}
	}
?>