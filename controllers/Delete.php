<?php
require_once dirname(__DIR__). '/utilities/db.php';

$id = $_GET['id_product'];
//On prépare la requête SQL DELETE
$reqprepare = $bdd->prepare("DELETE FROM `product` WHERE product_id = :product_id");

//On Lie la variable $id à 'id'
$reqprepare->bindValue(':product_id', $id);

//On execute la requête
$delete = $reqprepare->execute();

//On redirige vers la page index.php
header('Location:../views/pages/index.php');
// echo "la suppression à marcher";