<?php
$title = "Page | Ajout produit";
require_once dirname(__DIR__) . '/components/header.php';
require_once dirname(dirname(__DIR__)) . '/utilities/db.php';
require_once dirname(dirname(__DIR__)) . '/function/product.fn.php';
require_once dirname(dirname(__DIR__)) . '/function/select.fn.php';

$table_user = queryWizard($bdd);
$table_category = queryCategory($bdd);

//Appel de la logique pour rajouter un produit
require_once dirname(dirname(__DIR__)) . '/controllers/Create_product.php';

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
                <textarea name="product_description" id="product_description" cols="30" rows="10" placeholder="Déscription du produit"></textarea>
                <?php echo $descript ?>
            </div>
            <div>
                <input type="number" name="prix" id="prix" placeholder="Prix du produit">
                <?php echo $price ?>
            </div>
            <div>
                <label for="category">Sélectionner une catégorie de produit</label>
                <select name="category" id="category">
                    <option value="" >Choix du catégorie</option>
                    <?php
                        foreach ($table_category as $category) {
                            echo selectCategory($category);
                        }
                    ?>
                </select>
                <?php echo $category_message?>
            </div>
            <div>
                <label for="wizard">Sélectionner un sorcier</label>
                <select name="wizard" id="wizard">
                    <option value="" >Choix du sorcier</option>
                    <?php
                        foreach ($table_user as $wizard) {
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
            <div>
                <button type="submit">ENVOYER !</button>
            </div>
            <?php echo $message ?>
        </form>
    </div>
</section>

<?php require_once dirname(__DIR__) . '/components/footer.php'; ?>