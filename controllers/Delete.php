<?php
require_once dirname(__DIR__). '/utilities/db.php';

$id = $_GET['id_product'];

queryDelete($bdd, $id);

//On redirige vers la page index.php
header('Location:../views/pages/index.php');
// echo "la suppression à marcher";