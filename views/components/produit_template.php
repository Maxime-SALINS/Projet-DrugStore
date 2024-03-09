<?php
function produit_template($produit,$wizard) {
    echo '
    <div class="produit">
        <div class="dispo_img_potion">
            <img src="' . $produit['product_image'] . '" class="descrip" alt="une photo">
        </div>
        <div class="dispo_titre_description">
            <h3 class="titre_produit">Potion ' . $produit['product_name'] . '</h3>
            <div class="dispo_img_h4_sorcier">
                <h4 class="soustitre_produit">(Crée par ' . $wizard['wizard_name'] . ')</h4>
                <img src="' . $wizard['wizard_image'] . '" alt="photo Harry Potter" class="sorcier">
            </div>
            <div class="style_lien">
                <a class="style_a" href="produit.php?id_product='.$produit['id_product'].'">En savoir plus</a>
                <a class="style_a" href="modif.php?id_product='.$produit['id_product'].'">Modification</a>
                <a class="style_a" href="../../controllers/Delete.php?id_product='.$produit['id_product'].'">Supprimer</a>
            </div>
        </div>
    </div>
    ';
}