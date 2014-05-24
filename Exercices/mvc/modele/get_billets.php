<?php
function get_billets($offset, $limit)
{
	//récuperation de la connection à la BD
	//cela nous évite de devoir se reconnecter à la BD à chaque fois (trop lourd)
    global $bdd;
    $offset = (int) $offset;
    $limit = (int) $limit;
        
    $req = $bdd->prepare('SELECT id, titre, contenu, DATE_FORMAT(date_creation, \'%d/%m/%Y à %Hh%imin%ss\') AS date_creation_fr FROM billets ORDER BY date_creation DESC LIMIT :offset, :limit');
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