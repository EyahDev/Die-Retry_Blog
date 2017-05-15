<?php

namespace Blog\Modele;

// Namespaces necessaires au fonctionnement du blog
use Blog\Autoloader\Autoloader;

// Chargement des classes avec l'autoloader
require_once 'Autoloader/Autoloader.php';
Autoloader::register();


class Commentaire extends Modele {

    /**
     * Recherche des commentaires lié au billet demandé
     *
     * @param $idBillet => Identifiant du billet lié aux commentaires
     * @return mixed => // Retourne les commentaires recherchés
     */
    public function getCommentaires($idBillet) {
        // Définition de la requête SQL
        $reqSQL = 'SELECT id, com_date, auteur, contenu, billet_id FROM commentaires WHERE billet_id = ?';

        // Récuperation des commentaires liés au billet demandé
        $recupCommentaires = $this->executionRequete($reqSQL, array($idBillet));

        // Retourne tous les commentaires recuperés
        return $recupCommentaires;
    }

}