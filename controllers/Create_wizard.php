<?php

$wizard = '';
$img = '';
$message = '';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $name_wizard = $_POST["name_wizard"];
    $img_wizard = $_FILES['image_wizard']['name'];

    if (empty($name_wizard) && empty($img_wizard)) {
        $wizard= $img = '<span style="color:red">*Ce champ est obligatoire</span>';
        $message = "<span style='color:red'>Vous n'avez pas remplie tout les champs !</span>";
    } else if (!in_array($name_wizard, array_column($wizard_table, "wizard_name"))) {
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
            
            $newdonnees = [
                $name_wizard,
                $image_wizard
            ];
            
            // On utilise les requêtes préparées et des marqueurs nommés
            $reqprepare = $bdd->prepare("INSERT INTO wizard(`wizard_name`,`wizard_image`) VALUES (?,?)");
            // On execute la requête
            $reqprepare->execute($newdonnees);
        } else {
            echo "Mauvaise extension d'images";
        }
    } else {
        echo "Le sorcier existe déjà !";
    }
}