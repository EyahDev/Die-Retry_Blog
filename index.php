<?php

namespace Blog;

use Blog\Controleur\Routeur;

require 'Controleur/Routeur.php';

$routeur = new Routeur();
$routeur->routerRequete();
