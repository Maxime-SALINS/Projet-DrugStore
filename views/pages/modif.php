<?php
$title = "Page | Modification";
require_once dirname(__DIR__) . '/components/header.php';
require_once dirname(dirname(__DIR__)) . '/utilities/db.php';
require_once dirname(dirname(__DIR__)) . '/controllers/Update.php';

?>

<form action="" method="post">
    <div>
        <textarea name="description" id="description" cols="30" rows="10" placeholder="Modifier la description"></textarea>
        <?php echo $msg_error?>
    </div>
    <div>
        <input type="number" name="prix" id="prix" placeholder="Prix du produit">
        <?php echo $msg_error?>
    </div>
    <button type="submit">Envoyer</button>
    <?php echo $message?>
</form>

<?php require_once dirname(__DIR__) . '/components/footer.php'; ?>