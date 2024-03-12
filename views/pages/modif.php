<?php
$title = "Page | Modification";
require_once dirname(__DIR__) . '/components/header.php';
require_once '../../utilities/db.php';
require_once '../../controllers/Update.php';

?>

<form action="" method="post">
    <div>
        <textarea name="description" id="description" cols="30" rows="10" placeholder="Modifier la description"></textarea>
    </div>
    <div>
        <input type="number" name="prix" id="prix" placeholder="Prix du produit">
    </div>
    <button type="submit">Envoyer</button>
</form>

<?php require_once dirname(__DIR__) . '/components/footer.php'; ?>