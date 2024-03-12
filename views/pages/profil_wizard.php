<?php
$title = "Page | Ajout sorcier";
require_once dirname(__DIR__) .'/components/header.php';
require_once '../../utilities/db.php';

require_once '../../controllers/Update_wizard.php';

?>
<section>
    <h2>Téléchargement d'image</h2>
    <div>
        <form action="" method="post" enctype="multipart/form-data">
            <div>
                <label for="image_wizard">Modifier votre image</label>
                <input type="file" name="image_wizard" id="image_wizard">
                <?php echo $img?>
            </div>
            <div>
                <button type="submit">ENVOYER !</button>
            </div>
            <?php echo $message?>
        </form>
    </div>
</section>

<?php  require_once dirname(__DIR__) . '/components/footer.php';?>