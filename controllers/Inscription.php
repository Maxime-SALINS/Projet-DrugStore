<?php

$name = '';
$user_message = '';
$message_password = '';
$message = '';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (!empty($_POST['name_user']) && !empty($_POST['password'])) {
        $name_user = htmlspecialchars($_POST['name_user']);
        $password = password_hash($_POST['password'],PASSWORD_DEFAULT,['cost' => 12]);
        $image = '../../asset/img/personnage/default-img.png';
        $user_default = 1;

        $sub = [$name_user,  $password, $image, $user_default];

        $insertUser = $bdd->prepare("INSERT INTO user(name,password,image,role_id)VALUES(?,?,?,?)");
        $insertUser->execute($sub);

        header('Location: ../../views/pages/index.php');
        
    } else{
        $name = $message_password = $user_message = '<span style="color:red">*Ce champ est obligatoire</span>';
        $message = "<span style='color:red'>Vous n'avez pas remplie tout les champs !</span>";
    }
}