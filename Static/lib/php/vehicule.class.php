<?php
	//class qui définit les véhicules
	class Vehicule
	{
		//attributs privés
		private $_poids;
		private $_vitesse;
		private $_couleur;
		private $_prix;
		//attributs statiques = communs aux objets crées
		private static $_nombre = 0;
	
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
			return $this->_prix;
		}
		//fonction statique qui est accessible sans être instanciée (création d'un objet)
		public static function getNombre()
		{
			return self::$_nombre;
		}	
		//___ AUTRES_______________________________________
		//=================================================		
		public function afficher() //affiche le contenu des attributs à l'écran
		{
			echo 'Je suis l\'objet n°<b>'.self::$_nombre.'</b> et j\'appartients à la classe <b>'.get_class( $this ).'</b><br/>';
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
			echo 'Prix: '.$this->_prix.'€<br/><br/>';			
		}		
		public function __construct( $poids , $vitesse , $couleur ,$prix )
		{
			$this->_poids 	= $poids;
			$this->_vitesse = $vitesse;
			$this->_couleur = $couleur;
			$this->_prix 	= $prix;
			self::$_nombre++;	
		}
	}
?>