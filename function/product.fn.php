<?php

function uploadProduct($bdd, $name_product, $image_product, $descript_product, $prix, $id_category, $id_wizard){
    $newdonnees = [
        $name_product,
        $image_product,
        $descript_product,
        $prix,
        $id_category,
        $id_wizard
    ];
    
    // On utilise les requêtes préparées et des marqueurs nommés
    $sql = $bdd->prepare("INSERT INTO product(`product_name`,`product_image`, `description`,`price`,`category_id`,`user_id`) VALUES (?,?,?,?,?,?)");
    // On execute la requête
    $sql->execute($newdonnees);
}

function queryWizard($bdd){
    //Requête pour récupèrer les wizards
    $req_user = $bdd->query("SELECT * 
    FROM role r
    INNER JOIN user u
    ON r.idrole = u.role_id
    WHERE role = 'wizard'
    ");

    $table_user = $req_user->fetchAll(PDO::FETCH_ASSOC);

    return $table_user;
}

function queryCategory($bdd) {
    //Requête pour récupèrer les category
    $query_category = $bdd->query("SELECT * FROM category ");

    $table_category = $query_category->fetchAll(PDO::FETCH_ASSOC);

    return $table_category;
}

function queryProduct($bdd){
    //Requête pour récupèrer les produits
    $query_product = $bdd->query("SELECT * FROM product");
    
    $table_product = $query_product->fetchAll(PDO::FETCH_ASSOC);

    return $table_product;
}

function queryUpdateProduct($bdd, $id, $description, $prix){
    //On prépare la requête SQL UPDATE
    $reqprapare = $bdd->prepare("UPDATE product SET description = :description, price = :price WHERE product_id = :product_id");

    //On Lie les variables $vendu et $stock à :vendu et :stock et $id à :id
    $reqprapare->bindValue(':product_id', $id);
    $reqprapare->bindValue(':description', $description);
    $reqprapare->bindValue(':price', $prix);
    
    //On execute la requête
    $reqprapare->execute();
}

function queryProductIndex($bdd) {

    $reponse = $bdd->query(
        'SELECT * 
        FROM product p 
        INNER JOIN category c 
        ON p.category_id = c.id
        JOIN user u
        ON p.user_id = u.id'
    );
  
    $table_product = $reponse->fetchAll(PDO::FETCH_ASSOC);

    return $table_product;
}

function queryWizardIndex($bdd,$username){
    $query_wizard = $bdd->prepare("SELECT *
        FROM user u
        INNER JOIN product p
        ON u.id = p.user_id
        JOIN category c
        ON p.category_id = c.id
        WHERE name = :name
    ");

    $query_wizard->bindValue(':name', $username);
    $query_wizard->execute();

    $table_product = $query_wizard->fetchAll(PDO::FETCH_ASSOC);

    return $table_product;
    
}

function queryDelete($bdd, $id){
    //On prépare la requête SQL DELETE
    $reqprepare = $bdd->prepare("DELETE FROM `product` WHERE product_id = :product_id");

    //On Lie la variable $id à 'id'
    $reqprepare->bindValue(':product_id', $id);

    //On execute la requête
    $reqprepare->execute();
}