<?php namespace Blog\Vue; ?>
<?php $titre = "Mon Blog - " . $affichageBillet['titre'] ; ?>

<article>
    <header>
        <h1 id="titreBillet"><?= $affichageBillet['titre'] ?></h1>
        <time><?= $affichageBillet['billet_date'] ?></time>
    </header>
    <p><?= $affichageBillet['contenu']?></p>
</article>
<hr/>
<header>
    <h1 id="titreReponses">Réponse à <?= $affichageBillet['titre']?></h1>
</header>

<?php foreach ($commentairesLus AS $affichageCom): ?>
    <p><?= $affichageCom['auteur'] ?> dit :</p>
    <p><?= $affichageCom['contenu']?></p>
<?php endforeach; ?>