<?php
	class Voiture
	{
		//déclaration des attributs privés et publiques
		private $_proprietaire; //nom du proprietaire
		private $_marque;		//la marque (Audi, Lada, ...)
		private $_marqueID;		//le ID de la marque (1, 2, 3, ...)		
		private $_reservoir;	//capacité du réservoir en litres			
		private $_consommation;	//consommation en litres / 100 km
		private $_plaque;   	//plaque minéralogique
		private $_distance;
		
		//*** GET ***************************************
		//renvoie le nom du propriétaire
		public function Proprietaire()
		{
			return $this->_proprietaire;
		}
		//renvoie le nom de la marque
		public function Marque()
		{
			return $this->_marque;
		}
		//renvoie le ID de la marque
		public function MarqueID()
		{
			return $this->_marqueID;
		}			
		//renvoie la capacité du réservoir en litres
		public function Reservoir()
		{
			return $this->_reservoir;
		}
		//renvoie la consommation en litres / 100 km
		public function Consommation()
		{
			return $this->_consommation;
		}		
		//renvoie la plaque minéralogique
		public function Plaque()
		{
			return $this->_plaque;
		}
		//renvoie la distance parcourue par la voiture
		public function Distance()
		{
			return $this->_distance;
		}	
		//*** SET ***************************************			
		//attribution d'un nom au propriétaire
		public function setProprietaire( $proprietaire )
		{
			$this->_proprietaire = $proprietaire;
		}
		//attribution de la marque
		public function setMarque( $marque )
		{	
			$this->_marque = $marque;
		}			
		//attribution de la capacité du réservoir en litres
		public function setReservoir( $reservoir )
		{
			$this->_reservoir = $reservoir;
		}
		//attribution de la consommation en litres / 100 km
		public function setConsommation( $consommation )
		{
			$this->_consommation = $consommation;
		}		
		//attribution de la plaque minéralogique
		public function setPlaque( $plaque )
		{
			$this->_plaque = $plaque;
		}				
		//*** AUTRES *************************************		
		//affichage des données de la classe
		public function afficher()
		{
			echo 'Classe '.get_class($this).'<br/>';
			echo $this->proprietaire.'<br/>';
			echo $this->_marque.'<br/>';
			echo $this->_reservoir.'ℓ<br/>';
			echo $this->_consommation.'ℓ / 100km<br/>';
			echo '<b>'.$this->_plaque.'</b><br/>';
		}	
		//affichage de la route
		public function afficherRoute()
		{
			echo '<img src="img/debut.png"><br/>';
			//echo '<img src="img/route.png" height="15" width="'.$distance.'">';			
			for( $i=0 ; $i<$this->_distance ; $i+=10)
			{
				//on fait une interligne toutes les 500 images de la route affichées
				if( ($i>0) && ($i%500==0) )
				{
					echo '<br/>';
				}
				echo '<img src="img/route.png">';
			}
			echo '<br/><img src="img/fin.png"><br/><br/>';
		}
		//Constructeur de la classe
		public function __construct( $proprietaire,$marque,$reservoir,$consommation,$plaque )
		{
			$this->_proprietaire= $proprietaire;
			$this->_marque 		= $marque;
			//extraction des données de la marque depuis le formulaire
																//exemple:	$marque contient '1.Mercedes'
			$marque 	 		= explode( '.' , $marque ); 	//$marque[0] = m_id de la table marque = 1 et $marque[1] = m_nom de la table marque = 'Mercedes'
			$this->_marqueID 	= $marque[0]; 					// 1
			$this->_marque 	 	= $marque[1]; 					// Mercedes						
			$this->_reservoir 	= $reservoir;
			$this->_consommation= $consommation;
			$this->_plaque 		= $plaque;
			$this->_distance	= $this->_reservoir / $this->_consommation * 100;
		}						
	}
?>