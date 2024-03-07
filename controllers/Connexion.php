<?php

$name ='';
$message_passage = '';
$message = '';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    
    if (!empty($_POST['name_user']) && !empty($_POST['password'])) {
        $name_user = $_POST['name_user'];
        $password = $_POST['password'];
    } else {
        $name = $message_passage = '<span style="color:red">*Ce champ est obligatoire</span>';
        $message = "<span style='color:red'>Vous n'avez pas remplie tout les champs !</span>";
    }

}
