<?php

namespace  Blog\Vue;

use Exception;

class Vue {

    // Nom du fichier de la vue demandé
    private $fichier;

    // Titre de la vue (défini dans le fichier)
    private $titre;

    public function __construct($action) {
        // Chargement du fichier de la vue par rapport à l'action
        $this->fichier = 'Vue\vue' . $action . '.php';
    }

    /**
     * Genère la vue demandé à l'utilisateur
     *
     * @param $fichier => Le fichier vue à charger
     * @param $donnees =>
     * @return string => Retourne le contenu(la vue) mis en tampon
     * @throws Exception
     */
    public function generateurVue($fichier, $donnees) {
        if (file_exists($fichier)) {

            // Extraction des données pour les intégrer dans la vue
            extract($donnees);

            // Début de la temporisation
            ob_start();

            // Affichage du contenu de la vue
            require $fichier;

            // Fin de la temporisation en renvoyant la vue à l'utilisateur
            return ob_get_clean();
        } else {
            throw new Exception("Fichier '$fichier' introuvable");
        }
    }

    public function affichageVue($donnees) {
        // Génération de la vue demandé par l'utilisateur
        $contenu = $this->generateurVue($this->fichier, $donnees);

        // Génération du gabarit
        $vue = $this->generateurVue('Vue/gabarit.php', array(
            'titre' => $this->titre,
            'contenu' => $contenu
        ));

        // Affichage de la vue
        echo $vue;
    }
}