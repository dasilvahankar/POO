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
			
			//appel du constructeur parent pour initialiser les attributs
			parent::__construct( $poids , $vitesse , $couleur , $prix );			

			//on pourrait faire ceci, SI SEULEMENT les attributs étaient PROTECTED dans la classe parent
			/*
			$this->_poids 	= $poids;	//KO
			$this->_vitesse = $vitesse;	//KO
			$this->_couleur = $couleur;	//KO
			*/
			$this->prix 	= 55555;	//OK car l'attribut est en protected	

			//Vehicule::__construct( $poids , $vitesse , $couleur , $prix ); //fonctionne aussi
		}
	}
?>