<?php

$name = '';
$user_message = '';
$message_passage = '';
$message = '';
$tableChoice = '';
$id_colum = '';
$nameColum = '';
$passwordColum = '';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    if (!empty($_POST['name_user']) && !empty($_POST['password']) && !empty($_POST['user_type'])) {
        $name_user = htmlspecialchars($_POST['name_user']);
        $password = $_POST['password'];
        $user_type = $_POST['user_type'];

        if ($user_type == 'admin') {
            $tableChoice = 'admin';
            $nameColum = 'admin_name';
            $passwordColum = 'admin_password';
            $id_colum = 'id_admin';
        } else if ($user_type == 'wizard') {
            $tableChoice = 'wizard';
            $nameColum = 'wizard_name';
            $passwordColum = 'wizard_password';
            $id_colum = 'id_wizard';
        } else {
            $tableChoice = 'user';
            $nameColum = 'user_name';
            $passwordColum = 'user_password';
            $id_colum = 'id_user';
        }

        $autentification = [$name_user, $password];

        $recupUser = $bdd->prepare("SELECT * FROM $tableChoice WHERE $nameColum = ? AND $passwordColum = ?");
        $recupUser->execute($autentification);

        if ($recupUser->rowCount() > 0) {
            // echo "Connexion réussi";
            $_SESSION['name_user'] = $name_user;
            $_SESSION['password'] = $password;
            $_SESSION['user_type'] =  $tableChoice;
            $_SESSION[$id_colum] = $recupUser->fetch()[$id_colum];
            header('Location: ../../views/pages/index.php');
        } else {
            $message = "Votre mot de passe ou nom d'utilisateur est incorrect";
        }
    } else {
        $name = $message_passage = $user_message = '<span style="color:red">*Ce champ est obligatoire</span>';
        $message = "<span style='color:red'>Vous n'avez pas remplie tout les champs !</span>";
    }
}
