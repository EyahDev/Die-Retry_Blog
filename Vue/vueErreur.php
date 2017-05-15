<?php namespace Blog\Vue; ?>

<!-- Définition du titre de la page  -->
<?php $titre = "Mon Blog"; ?>

<!-- Début de la mise en tampon -->
<?php ob_start();?>
<p>Une erreur est survenue : <?= $msgErreur ?></p>

<!-- Fin de la mise en tampo et stockage dans une variable -->
<?php $contenu = ob_get_clean(); ?>

<!--Récuration du gabarit pour l'affichage du contenu -->
<?php require "gabarit.php"; ?>
