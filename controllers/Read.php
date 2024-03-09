<?php
$req = $bdd->query('SELECT * FROM product INNER JOIN wizard ON product.wizard_id_wizard = wizard.id_wizard');
$reponse = $bdd->query('SELECT * FROM category_has_product INNER JOIN product ON category_has_product.product_id_product = product.id_product');

$table_wizard = $req->fetchAll(PDO::FETCH_ASSOC);
$table_product = $reponse->fetchAll(PDO::FETCH_ASSOC);

$id = $_GET['id_product'];

foreach ($table_product as $produit) {
    foreach($table_wizard as $wizard){
        if ($produit['id_product'] == $id) {
            echo '
            <section class="style_section_product">
                <h3 class="title_product">Potion ' . $produit['product_name'] . '</h3>
                <div class="dispo_infos_product">
                    <div class="product">
                        <div class="dispo_img_potion">
                            <img src="' . $produit['product_image'] . '" class="descrip" alt="une photo">
                        </div>
                        <div class="dispo_titre_description">
                            <div class="dispo_img_h4_sorcier">
                                <h4 class="soustitre_produit">(Crée par ' . $wizard['wizard_name'] . ')</h4>
                                <img src="' . $wizard['wizard_image'] . '" alt="photo'.$wizard['wizard_name'].'" class="sorcier">
                            </div>
                            <p class="p_product">Description : ' . $produit['product_description'] . '</p>
                            <p class="prix_product"> Prix : ' . $produit['price'] .'€</p>
                        </div>
                    </div>
                </div>
            </section>
            ';
        }
    }
}
