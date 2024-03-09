<?php
$name = '';
$user_message = '';
$message_password = '';
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

        if ($user_type == 'wizard') {
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

        $sub = [$name_user,  $password];

        $insertUser = $bdd->prepare("INSERT INTO $tableChoice($nameColum,$passwordColum)VALUES(?,?)");
        $insertUser->execute($sub);

        header('Location: ../../views/pages/index.php');
        
    } else{
        $name = $message_password = $user_message = '<span style="color:red">*Ce champ est obligatoire</span>';
        $message = "<span style='color:red'>Vous n'avez pas remplie tout les champs !</span>";
    }
}