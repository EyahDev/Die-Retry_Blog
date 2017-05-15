<?php

namespace Blog\Controleur;

// Namespaces necessaires au fonctionnement du blog
use Blog\Autoloader\Autoloader;
use Blog\Modele\Billet;
use Blog\Modele\Commentaire;
use Blog\Vue\Vue;

// Chargement des classes avec l'autoloader
require_once 'Autoloader/Autoloader.php';
Autoloader::register();

class ControleurBillet {

    // Déclaration des variables pour le constructeur
    private $billet;
    private $commentaires;

    /**
     * Constructeur du ControleurBillet
     *
     * Instantiation des billets dans la variable $billet
     * Instantiation des commentaires dans la variable $commentaires
     */
    public function __construct() {
        $this->billet = new Billet();
        $this->commentaires = new Commentaire();
    }

    /**
     * Recupération du billets demandés et des commentaires associés
     *
     * @param $idBillet => id du billet demandé
     */
    public function billet($idBillet) {
        $billet = $this->billet->getBillet($idBillet);
        $commentaires = $this->commentaires->getCommentaires($idBillet);

        $vue = new Vue('Billet');
        $vue->affichageVue(array(
            'affichageBillet' => $billet,
            'commentairesLus' => $commentaires
        ));
    }
}