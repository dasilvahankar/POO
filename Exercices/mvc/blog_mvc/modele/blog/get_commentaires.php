<?php
function get_commentaires($offset, $limit, $billet)
{
	//récuperation de la connection à la BD
    global $bdd;
    $offset = (int) $offset;
    $limit = (int) $limit;
        
    $req = $bdd->prepare('SELECT * AS date_creation_fr FROM commentaires WHERE id = :billet ORDER BY date_commentaire DESC LIMIT :offset, :limit');
    $req->bindParam(':billet', $offset, PDO::PARAM_INT);	
    $req->bindParam(':offset', $offset, PDO::PARAM_INT);
    $req->bindParam(':limit', $limit, PDO::PARAM_INT);
    $req->execute();
	//j'appelle ici la fonction fetchAll() plutôt que de faire une boucle avec fetch()
	//fetchAll() = rassemble toutes les données dans un grand tableau, retourne donc un array contenant les billets demandés	
    $billets = $req->fetchAll();
    
    
    return $billets;
}
//ce fichier PHP ne contient pas la balise de fermeture ? > celle-ci n'est pas obligatoire
//c'est recommandé de ne pas l'écrire, surtout dans le modèle et le contrôleur d'une architecture MVC
//cela permet d'éviter des problèmes liés à l'envoi de HTML avant l'utilisation de fonctions comme setCookie qui nécessitent d'être appelées avant tout code HTML