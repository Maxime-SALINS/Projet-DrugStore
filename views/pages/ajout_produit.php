<?php
$title = "Page | Ajout produit";
require_once '../../views/components/header.php';
require_once '../../utilities/db.php';

$reponse = $bdd->query('SELECT * FROM product');
$table = $reponse->fetchAll(PDO::FETCH_ASSOC);

$reponse = $bdd->query('SELECT * FROM wizard');
$table_wizard = $reponse->fetchAll(PDO::FETCH_ASSOC);

require_once '../../controllers/Create_product.php';

?>

<section>
    <h2>Formulaire d'ajout de produit</h2>
    <div>
        <form action="" method="post" enctype="multipart/form-data">
            <div>
                <input type="text" name="name_product" id="name_product" placeholder="Nom produit">
                <?php echo $product ?>
            </div>
            <div>
                <input type="text" name="first_power" id="first_power" placeholder="Premier pouvoir">
                <?php echo $power ?>
            </div>
            <div>
                <input type="text" name="second_power" id="second_power" placeholder="Second pouvoir">
                <?php echo $power ?>
            </div>
            <div>
                <input type="number" name="prix" id="prix" placeholder="Prix du produit">
                <?php echo $price ?>
            </div>
            <div>
                <label for="wizard">Sélectionner un sorcier</label>
                <select name="wizard_id" id="wizard_id">
                    <option value="" >Choix du sorcier</option>
                    <?php
                        require_once '../../views/components/select_wizard.php';

                        foreach ($table_wizard as $wizard) {
                            echo selectWizard($wizard);
                        }
                    ?>
                </select>
                <?php echo $wizard_message?>
            </div>
            <div>
                <label for="image_product">Image du produit</label>
                <input type="file" name="image_product" id="image_product">
                <?php echo $img ?>
            </div>
            <div class="w-100 d-flex justify-content-center p-5">
                <button class="buttonlivredor" type="submit">ENVOYER !</button>
            </div>
            <?php echo $message ?>
        </form>
    </div>
</section>

<?php require_once '../../views/components/footer.php'; ?>