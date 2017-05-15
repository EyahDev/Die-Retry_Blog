<?php

namespace Blog\Modele;

// Namespaces necessaires au fonctionnement du blog
use Blog\Autoloader\Autoloader;

// Chargement(s) de(s) classe(s) propre à PHP
use Exception;

// Chargement des classes avec l'autoloader
require_once 'Autoloader/Autoloader.php';
Autoloader::register();

class Billet extends Modele {

    /**
     * Recuperation de tous les billets du blog
     *
     * @return \PDOStatement => Retourne les billets récuperés via l'execution de la requête SQL
     */
    public function getBillets() {
        // Définition de la requête SQL
        $reqSQL = 'SELECT id, titre, contenu, billet_date FROM billets ORDER BY id DESC';

        // Récuperation des billets en executant la requête
        $recupBillets = $this->executionRequete($reqSQL);

        // Retourne tous les billets récuperés
        return $recupBillets;
    }

    /**
     * Recupération d'un seul billet grâce à son id
     *
     * @param $idBillet => Identifiant du billet demandé
     * @return mixed => Retourne le resultat de la recherche
     * @throws \Exception => genère un message d'erreur
     */
    public function getBillet($idBillet) {
        // RDéfinition de la requête SQL
        $reqSQL = 'SELECT id, titre, contenu, billet_date FROM billets WHERE id = ?';

        // Recuperation du billet demandé
        $recupBillet = $this->executionRequete($reqSQL, array($idBillet));

        // Retourne le billet demandé si il n'y a qu'un seul resultat, si non il genère un message d'erreur
        if ($recupBillet->rowCount() == 1) {
            return $recupBillet->fetch();
        } else {
            throw new Exception("Aucun billet ne correspond à l'identifiant '$idBillet'");
        }

    }
}