<?php
require_once '../utilities/db.php';

$id = $_GET["id"];
//On prépare la requête SQL DELETE
$reqprepare = $bdd->prepare("DELETE FROM `produits` WHERE id = :id");

//On Lie la variable $id à 'id'
$reqprepare->bindValue(':id', $id);

//On execute la requête
$delete = $reqprepare->execute();

//On redirige vers la page index.php
header('Location:../views/pages/index.php');
// echo "la suppression à marcher";