<?php
function produit_template($produit) {
    echo '
    <div class="produit">
        <div class="dispo_img_potion">
            <img src="' . $produit['image_produit'] . '" class="descrip" alt="une photo">
        </div>
        <div class="dispo_titre_description">
            <h3 class="titre_produit">Potion' . $produit['titre'] . '</h3>
            <div class="dispo_img_h4_sorcier">
                <h4 class="soustitre_produit">(Crée par ' . $produit['nom_sorcier'] . ')</h4>
                <img src="' . $produit['image_sorcier'] . '" alt="photo Harry Potter" class="sorcier">
            </div>
            <a href="produit.php?id='.$produit['id'].'">En savoir plus</a>
            <a href="Delete.php?id='.$produit['id'].'">Supprimer</a>
            <a href="modif.php?id='.$produit['id'].'">Modification</a>
        </div>
    </div>
    ';
}