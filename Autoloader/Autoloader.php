<?php
namespace Blog\Autoloader;


class Autoloader {

    /**
     * Enregistre notre autoloader
     */
    public static function register(){
        spl_autoload_register(array(__CLASS__, 'autoload'));
    }

    /**
     * Inclue le fichier correspondant à classe demandé
     * @param $class string => Le nom de la classe à charger
     */

    private static function autoload($class) {
        $class = str_replace('Blog' . '\\', '../', $class);
        $class = str_replace('\\', '/', $class);
        require '/' . $class . '.php';

    }
}
