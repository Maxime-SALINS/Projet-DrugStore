<?php

require_once dirname(__DIR__) . '/function/user.fn.php';

$img = '';
$message = '';

$name_wizard = $_SESSION['name'];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    //Image sorcier :
    $img_wizard = $_FILES['image_wizard']['name'];
    $wizard_url = $_FILES['image_wizard']['tmp_name'];
    $wizard_type = $_FILES['image_wizard']['type'];
    $wizard_error = $_FILES['image_wizard']['error'];
    $wizard_size = $_FILES['image_wizard']['size'];

    if (empty($img_wizard)) {
        $img = '<span style="color:red">*Ce champ est obligatoire</span>';
        $message = "<span style='color:red'>Vous n'avez pas remplie tout les champs !</span>";
    } else {

        //Obtenir l'extension de l'image du sorcier
        $imgext_wizard = pathinfo($img_wizard, PATHINFO_EXTENSION);
        
        //Table des extensions autorisés
        $extensionValid = ['jpg', 'jpeg','gif','png','webp'];

        if (in_array(strtolower($imgext_wizard),$extensionValid)){
           
            move_uploaded_file($wizard_url, '../../asset/img/personnage/' . $img_wizard);
     
            $image_wizard = "../../asset/img/personnage/" .  $img_wizard;

            updateWizarsImage($bdd, $image_wizard, $name_wizard);

            $message = "Vous avez modifier votre photo de profil";
    
        } else {
            $message = "Mauvaise extension d'images";
        }
    }
}