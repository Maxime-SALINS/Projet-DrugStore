<?php
require_once dirname(__DIR__) . '/function/product.fn.php';

$id = $_GET['id_product'];

$msg_error = '';
$message = '';

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    
    $description= $_POST['description'];
    $prix= intval($_POST['prix']);

    if(empty($description) && empty($prix)) {
        $msg_error = '<span style="color:red">*Ce champ est obligatoire</span>';
        $message = "<span style='color:red'>Vous n'avez pas remplie tout les champs !</span>";
    } else {
        queryUpdateProduct($bdd, $id, $description, $prix);
        $message = "<span style='color:red'>Modification réussi !</span>";
    }
}