<?php

// On demande les 5 derniers commentaires (modèle)
include_once('modele/blog/get_commentaires.php');

$commentaires = get_commentaires(0, 10, $GET['billet']);
/*
var_dump( $commentaires );

// On effectue du traitement sur les données (contrôleur)
// Ici, on doit surtout sécuriser l'affichage
foreach($commentaires as $cle => $commentaire)
{
    $commentaires[$cle]['titre'] = htmlspecialchars($commentaire['titre']);
	//nl2br = crée les retours à la ligne du contenu avec nl2br(), équivalent de echo "\n"	
    $commentaires[$cle]['contenu'] = nl2br(htmlspecialchars($commentaire['contenu']));
}

var_dump( $commentaires );
*/
include_once('vue/blog/commentaires.php');
// On affiche la page (vue)