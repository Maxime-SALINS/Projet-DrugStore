<?php

require_once '../utilities/db.php';

$reponse = $bdd->query('SELECT * FROM produits');
$table = $reponse->fetchAll(PDO::FETCH_ASSOC);

