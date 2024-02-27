<?php

$id = $_GET['id'];

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    
    $first_power= $_POST['first_power'];
    $second_power= $_POST['second_power'];
    $prix= intval($_POST['prix']);
    
    //On prépare la requête SQL UPDATE
    $reqprapare = $bdd->prepare("UPDATE produits SET first_power = :first_power, second_power = :second_power, prix = :prix WHERE id = :id");

    //On Lie les variables $vendu et $stock à :vendu et :stock et $id à :id
    $reqprapare->bindValue(':id', $id);
    $reqprapare->bindValue(':first_power', $first_power);
    $reqprapare->bindValue(':second_power', $second_power);
    $reqprapare->bindValue(':prix', $prix);

    //On execute la requête
    $update = $reqprapare->execute();
}