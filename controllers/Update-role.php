<?php

$wizard_message='';
$message='';

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    
    // var_dump($_POST);
    if (!empty($_POST['user']) && !empty($_POST['role'])){
        $user_id= $_POST['user'];
        $user_role= $_POST['role'];

        updateRole($bdd, $user_id, $user_role);
        $message = "<span style='color:green'>Modification réussi !</span>";

    } else {
        $wizard_message ='<span style="color:red">*Ce champ est obligatoire</span>';
        $message = "<span style='color:red'>Vous n'avez pas remplie tout les champs !</span>";
    }
}