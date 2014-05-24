<?php

// On demande les 5 derniers billets (modèle)
include_once('modele/blog/get_billets.php');

$billets = get_billets(0, 5);
/*
var_dump( $billets );

// On effectue du traitement sur les données (contrôleur)
// Ici, on doit surtout sécuriser l'affichage`

foreach($billets as $cle => $billet)
{
    $billets[$cle]['titre'] = htmlspecialchars($billet['titre']);
	//nl2br = crée les retours à la ligne du contenu avec nl2br(), équivalent de echo "\n"	
    $billets[$cle]['contenu'] = nl2br(htmlspecialchars($billet['contenu']));
}

var_dump( $billets );
*/
// On affiche la page (vue)
include_once('vue/blog/index.php');