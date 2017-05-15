<?php

namespace Blog\Controleur;

// Namespaces necessaires au fonctionnement du blog
use Blog\Autoloader\Autoloader;
use Blog\Vue\Vue;
use Exception;

// Chargement des classes avec l'autoloader
require_once 'Autoloader/Autoloader.php';
Autoloader::register();

class Routeur {

    // Déclaration des variables pour le constructeurs
    private $ctrlAccueil;
    private $ctrlBillet;

    /**
     * Constructeur du routeur
     *
     * Instantiation du Controleur Accueil dans la variable ctrlAccueil
     * Instatiation du Controleur Billet dans la variable ctrlBillet
     */
    public function __construct() {
        $this->ctrlAccueil = new ControleurAccueil();
        $this->ctrlBillet = new ControleurBillet();
    }

    /**
     * Affichage de la vue erreur si une erreur est généré
     *
     * @param $msgErreur => Message d'erreur
     */
    private function erreur($msgErreur) {
        $vue = new Vue('Erreur');
        $vue->affichageVue(array('msgErreur' => $msgErreur));
    }

    /**
     * Traitement de la requête entrante par l'index.php
     */
    public function routerRequete() {
        try {
            // Vérification si l'action et défini
            if (isset($_GET['action'])) {
                // Vérification si l'action est bien égal à billet
                if ($_GET['action'] == 'billet') {
                    // Vérification si l'id est défini
                    if (isset($_GET['id'])) {
                        // vérification de la valeur numéro de l'id
                        $idBillet = intval($_GET['id']);
                        // Chargement du billet spécifique à l'id
                        if ($idBillet != 0) {
                            $this->ctrlBillet->billet($idBillet);
                        } else {
                            throw new Exception("Identifiant de billet non valide");
                        }
                    } else {
                        throw new Exception("Identifiant de billet non défini");
                    }
                } else {
                    throw new Exception("Action non valide");
                }
            // Si l'action n'est pas défini, redirection vers l'accueil
            } else {
                $this->ctrlAccueil->accueil();
            }
        } catch (Exception $e) {
            $this->erreur($e->getMessage());
        }
    }
}
