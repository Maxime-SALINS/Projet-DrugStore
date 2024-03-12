<?php

require_once dirname(__DIR__) . '/function/product.fn.php';

$table_product = queryProductIndex($bdd);

$id = $_GET['id_product'];

foreach ($table_product as $produit) {
    if ($produit['product_id'] == $id) {
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
                                <h4 class="soustitre_produit">(Crée par ' . $produit['name'] . ')</h4>
                                <img src="' . $produit['image'] . '" alt="photo' . $produit['name'] . '" class="sorcier">
                            </div>
                            <p class="p_product">Description : ' . $produit['description'] . '</p>
                            <p class="type_product">'.$produit['type_category'].'</p>
                            <p class="prix_product"> Prix : ' . $produit['price'] . '€</p>
                        </div>
                    </div>
                </div>
            </section>
        ';
    }
}
