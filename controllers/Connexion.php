<?php

require_once dirname(__DIR__) . '/function/user.fn.php';

$name = '';
$user_message = '';
$message_password = '';
$message = '';
$connexion = '';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    if (!empty($_POST['name_user']) && !empty($_POST['password'])) {
        
        $name_user = htmlspecialchars($_POST['name_user']);
        $password = $_POST['password'];

        $table = login($bdd, $name_user, $password);

        if($table['result'] == true){
            header('Location: ../../views/pages/index.php');
            exit();
        } else {
            $connexion = '<span style="color:red">'.$table['msg'].'</span>';
        }
    } else {
        $name = $message_password = $user_message = '<span style="color:red">*Ce champ est obligatoire</span>';
        $message = "<span style='color:red'>Vous n'avez pas remplie tout les champs !</span>";
    }
}