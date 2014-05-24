<?php
	//class qui définit les véhicules
	class Vehicule
	{
		//attributs privés
		private $_poids;
		private $_vitesse;
		private $_couleur;
		
		//attributs protégés (SEULEMENT accessibles dans les classes filles)
		protected $prix;
	
		//___ GET _________________________________________
		//=================================================		
		public function getPoids()
		{
			return $this->_poids;
		}
		public function getVitesse()
		{
			return $this->_vitesse;
		}
		public function getCouleur()
		{
			return $this->_couleur;
		}		
		public function getPrix()
		{
			return $this->prix;
		}
		//___ AUTRES_______________________________________
		//=================================================		
		public function afficher() //affiche le contenu des attributs à l'écran
		{
			echo 'Je suis la classe <b>'.get_class( $this ).'</b><br/>';
			echo 'Poids: '.$this->_poids.'kg<br/>';
			echo 'Vitesse: '.$this->_vitesse.'km/h<br/>';
			echo 'Couleur: <a href="" style="
							display			: inline-block;
							width			: 20px;
							height			: 20px;
							line-height		: 20px;
							border			: 2px solid #050505;
							border-radius	: 50%;
							text-decoration	: none;
							background		: '.$this->_couleur.';
							box-shadow		: 0 0 3px gray;
						   "> &nbsp; </a><br/>';
			echo 'Prix: '.$this->prix.'€<br/><br/>';			
		}		
		public function __construct( $poids , $vitesse , $couleur ,$prix )
		{
			$this->_poids 	= $poids;
			$this->_vitesse = $vitesse;
			$this->_couleur = $couleur;
			$this->prix 	= $prix;			
		}
	}
?>