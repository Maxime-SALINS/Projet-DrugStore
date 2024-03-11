<?php
$title = "Page | Ajout produit";
require_once '../../views/components/header.php';
require_once '../../utilities/db.php';

//Requête pour récupèrer les wizards
$req_user = $bdd->query("SELECT * 
FROM role r
INNER JOIN user u
ON r.idrole = u.role_id
WHERE role = 'wizard'
");

$table_user = $req_user->fetchAll(PDO::FETCH_ASSOC);

//Requête pour récupèrer les category
$query_category = $bdd->query("SELECT * 
FROM category 
");

$table_category = $query_category->fetchAll(PDO::FETCH_ASSOC);

//Requête pour récupèrer les produits
$query_product = $bdd->query("SELECT * 
FROM product 
");

$table_product = $query_product->fetchAll(PDO::FETCH_ASSOC);

//Appel de la logique pour rajouter un produit
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
                        require_once '../../views/components/select_category.php';

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
                        require_once '../../views/components/select_wizard.php';

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

<?php require_once '../../views/components/footer.php'; ?>