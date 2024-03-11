<?php

$img = '';
$message = '';

$name_wizard = $_SESSION['name_user'];
// var_dump($name_wizard);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $img_wizard = $_FILES['image_wizard']['name'];

    if (empty($img_wizard)) {
        $img = '<span style="color:red">*Ce champ est obligatoire</span>';
        $message = "<span style='color:red'>Vous n'avez pas remplie tout les champs !</span>";
    } else {

        //Image sorcier :
        $wizard_url = $_FILES['image_wizard']['tmp_name'];
        $wizard_type = $_FILES['image_wizard']['type'];
        $wizard_error = $_FILES['image_wizard']['error'];
        $wizard_size = $_FILES['image_wizard']['size'];

        //Obtenir l'extension de l'image du sorcier
        $imgext_wizard = explode('.', $img_wizard);
        $extension_wizard = strtolower(end($imgext_wizard));
        
        //Table des extensions autorisés
        $extensionValid = ['jpg', 'jpeg','gif','png','webp'];

        if (in_array($extension_wizard,$extensionValid)){
            move_uploaded_file($wizard_url, '../../asset/img/personnage/' . $img_wizard);
     
            $image_wizard = "../../asset/img/personnage/" .  $img_wizard;
            
            // On utilise les requêtes préparées et des marqueurs nommés
            $query_update = $bdd->prepare('UPDATE user SET image = :image WHERE name = :name');

            //On Lie les variables à la requête
            $query_update->bindValue(':image', $image_wizard);
            $query_update->bindValue(':name', $name_wizard);

            // On execute la requête
            $query_update->execute();
        } else {
            echo "Mauvaise extension d'images";
        }
    }
}