<?php namespace Blog\Vue; ?>

<!-- Définition du titre -->
<?php $this->titre = 'Mon Blog'; ?>

<!-- Affichage de la listes des billets -->
<?php foreach ($recupBillets AS $affichageBillet) : ?>
    <article>
        <header>
            <a href="<?= "index.php?action=billet&id=" .$affichageBillet['id'] ?>">
                <h1 class="titreBillet"><?= $affichageBillet['titre'] ?></h1>
            </a>
            <time><?= $affichageBillet['billet_date']?></time>
        </header>
        <p><?= $affichageBillet['contenu']?></p>
    </article>
    <hr/>
<?php endforeach; ?>