<?php 
require_once ('../../views/components/header.php');
require_once ('../../controllers/Create.php');

?>

<section>
    <h2>Formulaire d'ajout de produit</h2>
    <div>
        <form action="" method="post" enctype="multipart/form-data">
            <div>
                <input type="text" name="name_product" id="name_product" placeholder="Nom produit">
                <?php echo $product?>
            </div>
            <div>
                <input type="text" name="name_wizard" id="name_wizard" placeholder="Nom sorcier">
                <?php echo $wizard?>
            </div>
            <div>
                <input type="text" name="first_power" id="first_power" placeholder="Premier pouvoir">
                <?php echo $power?>
            </div>
            <div>
                <input type="text" name="second_power" id="second_power" placeholder="Second pouvoir">
                <?php echo $power?>
            </div>
            <div>
                <input type="number" name="prix" id="prix" placeholder="Prix du produit">
                <?php echo $price?>
            </div>
            <div>
                <label for="image_product">Image du produit</label>
                <input type="file" name="image_product" id="image_product">
                <?php echo $img?>
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