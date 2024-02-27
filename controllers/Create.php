<?php
    
    $product = '';
    $wizard = '';
    $power = '';
    $img = '';
    $message = '';
    $price = '';

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {

        //On gére dans un deuxième temps la récupération des infos du formulaire
        $name_product = $_POST["name_product"];
        $name_wizard = $_POST["name_wizard"];
        $prix = intval($_POST["prix"]);
        $img_product = $_FILES['image_product']['name'];
        $img_wizard = $_FILES['image_wizard']['name'];
        $first_power = $_POST["first_power"];
        $second_power = $_POST["second_power"];
        
        //Script: Envoie vers la base de données
        if (empty($name_product) && empty($name_wizard) && empty($prix) && empty($img_product) && empty($img_wizard) && empty($first_power) && empty($second_power)) {
            $product = $wizard = $power= $img = $price = '<span style="color:red">*Ce champ est obligatoire</span>';
            $message = "<span style='color:red'>Vous n'avez pas remplie tout les champs !</span>";
        } else {

            //On gére en premier l'upload des images
            //Image produit :
            $tmpName = $_FILES['image_product']['tmp_name'];
            $type = $_FILES['image_product']['type'];
            $error = $_FILES['image_product']['error'];
            $size = $_FILES['image_product']['size'];
            
            //Obtenir l'extension de l'image du produit
            $imgExtension = explode('.', $img_product);
            $extension = strtolower(end($imgExtension));
    
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
            
            //Vérification de l'extension
            if (in_array($extension,$extensionValid) && in_array($extension_wizard,$extensionValid)){
                move_uploaded_file($tmpName, '../../asset/img/potion/' . $img_product);
                move_uploaded_file($wizard_url, '../../asset/img/personnage/' . $img_wizard);
            } else {
                echo "Mauvaise extension d'images";
            }
            $image_product = "../../asset/img/potion/" . $img_product;
            $image_wizard = "../../asset/img/personnage/" .  $img_wizard;
            
            $newdonnees = [
                $name_product,
                $image_product,
                $name_wizard,
                $image_wizard,
                $first_power,
                $second_power,
                $prix
            ];
            
            // On utilise les requêtes préparées et des marqueurs nommés
            $reqprepare = $bdd->prepare("INSERT INTO produits(`titre`,`image_produit`,`nom_sorcier`,`image_sorcier`, `first_power`, `second_power`, `prix`) VALUES (?,?,?,?,?,?,?)");
            // On execute la requête
            $reqprepare->execute($newdonnees);
        }
        

        //if (!in_array($name_product, array_column($table, "name_product"))) {
        //On regroupe les nouvelles données dans un tableau
        // $newdonnees = [
        //     $model,
        //     $stock,
        //     $vendu,
        //     $image
        // ];
        //On utilise les requêtes préparées et des marqueurs nommés
        // $reqprepare = $conn->prepare("INSERT INTO cars(`model`,`stock`,`vendu`,`image`) VALUES (?,?,?,?)");
        //On execute la requête
        // $reqprepare->execute($newdonnees);
        // }
    }