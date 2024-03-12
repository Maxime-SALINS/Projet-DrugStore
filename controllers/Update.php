<?php

$id = $_GET['id_product'];

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    
    $description= $_POST['description'];
    $prix= intval($_POST['prix']);
    
    //On prépare la requête SQL UPDATE
    $reqprapare = $bdd->prepare("UPDATE product SET description = :description, price = :price WHERE product_id = :product_id");

    //On Lie les variables $vendu et $stock à :vendu et :stock et $id à :id
    $reqprapare->bindValue(':product_id', $id);
    $reqprapare->bindValue(':description', $description);
    $reqprapare->bindValue(':price', $prix);

    //On execute la requête
    $reqprapare->execute();
}