<?php
function produit_template($produit) {
    echo '
    <div class="produit">
        <div class="dispo_img_potion">
            <img src="' . $produit['product_image'] . '" class="descrip" alt="une photo">
        </div>
        <div class="dispo_titre_description">
            <h3 class="titre_produit">Potion ' . $produit['product_name'] . '</h3>
            <p class="type_product">'.$produit['type_category'].'</p>
            <div class="dispo_img_h4_sorcier">
                <h4 class="soustitre_produit">(Crée par ' . $produit['name'] . ')</h4>
                <img src="' . $produit['image'] . '" alt="photo Harry Potter" class="sorcier">
            </div>
            <div class="style_lien">
                <a class="style_a" href="produit.php?id_product='.$produit['product_id'].'">En savoir plus</a>
                <a class="style_a" href="modif.php?id_product='.$produit['product_id'].'">Modification</a>
                <a class="style_a" href="../../controllers/Delete.php?id_product='.$produit['product_id'].'">Supprimer</a>
            </div>
        </div>
    </div>
    ';
}

function produit_template_User($produit) {
    echo '
    <div class="produit">
        <div class="dispo_img_potion">
            <img src="' . $produit['product_image'] . '" class="descrip" alt="une photo">
        </div>
        <div class="dispo_titre_description">
            <h3 class="titre_produit">Potion ' . $produit['product_name'] . '</h3>
            <p class="type_product">'.$produit['type_category'].'</p>
            <div class="dispo_img_h4_sorcier">
                <h4 class="soustitre_produit">(Crée par ' . $produit['name'] . ')</h4>
                <img src="' . $produit['image'] . '" alt="photo Harry Potter" class="sorcier">
            </div>
            <div class="style_lien">
                <a class="style_a" href="produit.php?id_product='.$produit['product_id'].'">En savoir plus</a>
            </div>
        </div>
    </div>
    ';
}