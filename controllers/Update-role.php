<?php

$wizard_message='';
$message='';

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    
    // var_dump($_POST);
    if (!empty($_POST['user']) && !empty($_POST['role'])){
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
    } else {
        $wizard_message ='<span style="color:red">*Ce champ est obligatoire</span>';
        $message = "<span style='color:red'>Vous n'avez pas remplie tout les champs !</span>";
    }
}