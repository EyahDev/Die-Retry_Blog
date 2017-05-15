<?php

namespace Blog\Modele;

// Chargement(s) de(s) classe(s) propre à PHP
use PDO;

abstract class Modele {

    private $bdd;

    /**
     * Connexion à la base de données
     *
     * @return PDO => Retourne l'accès de la base de données
     */
    private function getDatabase() {
        if ($this->bdd == null) {
            // Connexion à la base de données
            $this->bdd = new PDO('mysql:host=localhost;dbname=die&retry_blog;charset=UTF8','root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
        }

        // Retourne l'accès à la base de données
        return $this->bdd;
    }

    /**
     * Execution de la requête SQL
     *
     * @param $reqSQL => requête SQL
     * @param null $params => Charge un tableau de paramètre dans le cas d'une requête preparé
     * @return \PDOStatement => Retourne le resultat de la requête
     */
    protected function executionRequete($reqSQL, $params = null) {
        if ($params == null) {
            // Execution de la requête simple
            $resultat = $this->getDatabase()->query($reqSQL);
        } else {
            // Execution de la requête preparé si il y a des paramètres
            $resultat = $this->getDatabase()->prepare($reqSQL);
            $resultat->execute($params);
        }

        // Retourne le resultat dans les 2 cas
        return $resultat;
    }
}