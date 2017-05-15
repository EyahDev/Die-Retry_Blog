<?php

namespace Blog\Controleur;

// Namespaces necessaires au fonctionnement du blog
use Blog\Autoloader\Autoloader;
use Blog\Modele\Billet;
use Blog\Vue\Vue;

// Chargement des classes avec l'autoloader
require_once 'Autoloader/Autoloader.php';
Autoloader::register();

class ControleurAccueil {

    // Déclaration de la variable pour le constructeur
    private $billet;

    // Instantation de la classe Billet
    public function __construct() {
        $this->billet = new Billet();
    }

    /**
     * Récuperation de tout les billets du blog et affichage de la vue accueil
     */
    public function accueil() {
        $billets = $this->billet->getBillets();
        $vue = new Vue('Accueil');
        $vue->affichageVue(array('recupBillets' => $billets));
    }
}
