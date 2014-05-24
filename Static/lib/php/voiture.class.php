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
			$this->_roues = $roues;			
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