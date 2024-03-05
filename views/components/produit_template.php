<?php
function produit_template($produit) {
    echo '
    <div class="produit">
        <div class="dispo_img_potion">
            <img src="' . $produit['product_image'] . '" class="descrip" alt="une photo">
        </div>
        <div class="dispo_titre_description">
            <h3 class="titre_produit">Potion ' . $produit['titre'] . '</h3>
            <div class="dispo_img_h4_sorcier">
                <h4 class="soustitre_produit">(Crée par ' . $produit['wizard_name'] . ')</h4>
                <img src="' . $produit['wizard_image'] . '" alt="photo Harry Potter" class="sorcier">
            </div>
            <div class="style_lien">
                <a class="style_a" href="produit.php?id='.$produit['id'].'">En savoir plus</a>
                <a class="style_a" href="modif.php?id='.$produit['id'].'">Modification</a>
                <a class="style_a" href="../../controllers/Delete.php?id='.$produit['id'].'">Supprimer</a>
            </div>
        </div>
    </div>
    ';
}