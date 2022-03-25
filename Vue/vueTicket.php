<?php $this->titre = "Ticketing - " . $ticket['titre']; ?>

<article>
    <header>
        <h1 class="titreTicket"><?= $ticket['titre'] ?></h1>
        <time><?= $ticket['date'] ?></time>
    </header>
    <p><?= $ticket['contenu'] ?></p>
</article>
<hr />

<article>
    <h1 class="titreBillet">État du ticket : </h1><p><?= $ticket['etat'] ?></p>
</article>



<header>
    <h1 id="titreReponses">Réponses à <?= $ticket['titre'] ?></h1>
</header>
<?php foreach ($commentaires as $commentaire): ?>
    <p><?= $commentaire['date'] ?></p>
    <p><?= $commentaire['auteur'] ?> dit :</p>
    <p><?= $commentaire['contenu'] ?></p>
<?php endforeach; ?>
<hr />
<form method="post" action="index.php?action=commenter">
    <input id="auteur" name="auteur" type="text" placeholder="Votre pseudo" 
           required /><br />
    <textarea id="txtCommentaire" name="contenu" rows="4" 
              placeholder="Votre commentaire" required></textarea><br />
    <input type="hidden" name="id" value="<?= $ticket['id'] ?>" />
    <input type="submit" value="Commenter" />
</form>

