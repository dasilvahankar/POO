<?php
include_once('modele/connexion_sql.php');


if( isset($_GET['section']) )
{
    switch( $_GET['section'] )
	{
		case 'index':
			include_once('controleur/blog/index.php');
		break;
		case 'commentaires':
			include_once('controleur/blog/commentaires.php');
		break;
	}
}
else
{
	include_once('controleur/blog/index.php');
}

