<?php


if($_SERVER['REQUEST_METHOD'] == 'POST'){
    
    // var_dump($_POST);

    $user_id= $_POST['user'];
    $user_role= $_POST['role'];

    // var_dump($user_name);
    // var_dump( $user_role);
    
    //On prépare la requête SQL UPDATE
    $query_update = $bdd->prepare("UPDATE user SET role_id = :role_id WHERE id = :id");

    //On Lie les variables $vendu et $stock à :vendu et :stock et $id à :id
    $query_update->bindValue(':id', $user_id);
    $query_update->bindValue(':role_id', $user_role);

    // //On execute la requête
    $query_update->execute();
}