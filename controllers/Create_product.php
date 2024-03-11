<?php
    
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
        $img_product = $_FILES['image_product']['name'];
        $descript_product = $_POST['product_description'];
        $id_wizard = intval($_POST["wizard"]);
        $id_category = intval($_POST["category"]);
        
        //Script: Envoie vers la base de données
        if (empty($name_product) && empty($prix) && empty($img_product) && empty($descript_product) && empty($id_wizard) && empty($id_category)) {
            $product = $wizard_message = $category_message = $descript = $img = $price = '<span style="color:red">*Ce champ est obligatoire</span>';
            $message = "<span style='color:red'>Vous n'avez pas remplie tout les champs !</span>";
        } else if (!in_array($name_product, array_column($table_product, "produc_name"))) {

            //On gére en premier l'upload des images
            //Image produit :
            $tmpName = $_FILES['image_product']['tmp_name'];
            $type = $_FILES['image_product']['type'];
            $error = $_FILES['image_product']['error'];
            $size = $_FILES['image_product']['size'];
            
            //Obtenir l'extension de l'image du produit
            $imgExtension = explode('.', $img_product);
            $extension = strtolower(end($imgExtension));
            
            //Table des extensions autorisés
            $extensionValid = ['jpg', 'jpeg','gif','png','webp'];
            
            //Vérification de l'extension
            if (in_array($extension,$extensionValid)){
                move_uploaded_file($tmpName, '../../asset/img/potion/' . $img_product);
                
                $image_product = "../../asset/img/potion/" . $img_product;
                
                $newdonnees = [
                    $name_product,
                    $image_product,
                    $descript_product,
                    $prix,
                    $id_category,
                    $id_wizard
                ];
                
                // On utilise les requêtes préparées et des marqueurs nommés
                $reqprepare = $bdd->prepare("INSERT INTO product(`product_name`,`product_image`, `description`,`price`,`category_id`,`user_id`) VALUES (?,?,?,?,?,?)");
                // On execute la requête
                $reqprepare->execute($newdonnees);
            } else {
                echo "Mauvaise extension d'images";
            }
        } else {
            echo "Le produit existe déjà !";
        }
    }