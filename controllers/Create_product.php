<?php

    require_once dirname(__DIR__) . '/function/product.fn.php';

    $table_product = queryProduct($bdd);
    
    $product = '';
    $descript = '';
    $wizard_message = '';
    $category_message = '';
    $img = '';
    $message = '';
    $price = '';

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {

        //On gére la récupération des infos du formulaire
        $name_product = $_POST["name_product"];
        $prix = intval($_POST["prix"]);
        $descript_product = $_POST['product_description'];
        $id_wizard = intval($_POST["wizard"]);
        $id_category = intval($_POST["category"]);
        
        //Image produit :
        $img_product = $_FILES['image_product']['name'];
        $tmpName = $_FILES['image_product']['tmp_name'];
        $type = $_FILES['image_product']['type'];
        $error = $_FILES['image_product']['error'];
        $size = $_FILES['image_product']['size'];

        //Script: Envoie vers la base de données
        if (empty($name_product) && empty($prix) && empty($img_product) && empty($descript_product) && empty($id_wizard) && empty($id_category)) {
            $product = $wizard_message = $category_message = $descript = $img = $price = '<span style="color:red">*Ce champ est obligatoire</span>';
            $message = "<span style='color:red'>Vous n'avez pas remplie tout les champs !</span>";
        } else if (!in_array($name_product, array_column($table_product, "product_name"))) {

            //Obtenir l'extension de l'image du produit
            $imgExtension = pathinfo($img_product, PATHINFO_EXTENSION);
            
            //Table des extensions autorisés
            $extensionValid = ['jpg', 'jpeg','gif','png','webp'];
            
            //Vérification de l'extension
            if (!in_array(strtolower($imgExtension),$extensionValid)){
                $message = "<span style='color:red'>Mauvaise extension d'images</span>";
            } else {

                move_uploaded_file($tmpName, '../../asset/img/potion/' . $img_product);
                $image_product = "../../asset/img/potion/" . $img_product;

                uploadProduct($bdd, $name_product, $image_product, $descript_product, $prix, $id_category, $id_wizard);
                $message = "<span style='color:green'>Produit ajouté avec succès !</span>";
            }
        } else {
            $message = "<span style='color:red'>Le produit existe déjà !</span>";
        }
    }