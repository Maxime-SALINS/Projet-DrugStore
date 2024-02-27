<?php

$servername = 'localhost';
$username = 'root';
$database = 'drug_store';

//On essaie de se connecter à la base de données test
try{
  $bdd = new PDO("mysql:host=$servername;dbname=$database", $username);
  //On définit le mode d'erreur de PDO sur Exception
  $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  // echo 'Connexion réussie';
}

/*On capture les exceptions si une exception est lancée et on affiche
 *les informations relatives à celle-ci*/
catch(PDOException $e){
  echo "Erreur : " . $e->getMessage();
}