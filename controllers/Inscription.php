<?php

require_once dirname(__DIR__) .'/function/user.fn.php';

$name = '';
$user_message = '';
$message_password = '';
$message = '';

$req_user = $bdd->query("SELECT * FROM user");
$table_user = $req_user->fetchAll(PDO::FETCH_ASSOC);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (!empty($_POST['name_user']) && !empty($_POST['password'])) {
        $name_user = htmlspecialchars($_POST['name_user']);
        $password = password_hash($_POST['password'],PASSWORD_DEFAULT,['cost' => 12]);
        $image = '../../asset/img/personnage/default-img.png';
        $user_default = 1;

        if(!in_array($name_user, array_column($table_user, "name"))){

            userSubcribe($bdd, $name_user, $password, $image, $user_default);
    
            header('Location: ../../views/pages/index.php');
        } else {
            $message = "Cette utilisateur existe déjà !";
        }
        
    } else{
        $name = $message_password = $user_message = '<span style="color:red">*Ce champ est obligatoire</span>';
        $message = "<span style='color:red'>Vous n'avez pas remplie tout les champs !</span>";
    }
}