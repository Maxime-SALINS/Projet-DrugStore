<?php

$reponse = $bdd->query('SELECT * FROM product INNER JOIN wizard ON product.wizard_id = wizard.id');
$table = $reponse->fetchAll(PDO::FETCH_ASSOC);

$id = $_GET['id'];

foreach ($table as $produit) {
    if ($produit['id'] == $id) {
        echo '
        <div class="produit">
            <div class="dispo_img_potion">
                <img src="' . $produit['product_image'] . '" class="descrip" alt="une photo">
            </div>
            <div class="dispo_titre_description">
                <h3 class="titre_produit">Potion' . $produit['titre'] . '</h3>
                <div class="dispo_img_h4_sorcier">
                    <h4 class="soustitre_produit">(Crée par ' . $produit['wizard_name'] . ')</h4>
                    <img src="' . $produit['wizard_image'] . '" alt="photo'.$produit['wizard_name'].'" class="sorcier">
                </div>
                <p class="para">Pouvoir principal : ' . $produit['first_power'] . '</p>
                <p class="para"> Pouvoir secondaire : ' . $produit['second_power'] . '</p>
                <p class="para"> Prix : ' . $produit['prix'] .'€</p>
            </div>
        </div>
        ';
    }
}
