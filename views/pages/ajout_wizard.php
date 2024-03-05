<?php 
require_once ('../../views/components/header.php');
require_once ('../../utilities/db.php');

$reponse = $bdd->query('SELECT * FROM wizard');
$table = $reponse->fetchAll(PDO::FETCH_ASSOC);

require_once ('../../controllers/Create_wizard.php');

?>
<section>
    <h2>Formulaire d'ajout de sorcier</h2>
    <div>
        <form action="" method="post" enctype="multipart/form-data">
            <div>
                <input type="text" name="name_wizard" id="name_wizard" placeholder="Nom sorcier">
                <?php echo $wizard?>
            </div>
            <div>
                <label for="image_wizard">Image du sorcier</label>
                <input type="file" name="image_wizard" id="image_wizard">
                <?php echo $img?>
            </div>
            <div class="w-100 d-flex justify-content-center p-5">
                <button class="buttonlivredor" type="submit">ENVOYER !</button>
            </div>
            <?php echo $message?>
        </form>
    </div>
</section>

<?php  require_once '../../views/components/footer.php';?>