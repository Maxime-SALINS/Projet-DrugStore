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


// CONNEXION POUR MAC 

// define("DBHOST", "localhost");
// define("DBUSER", "root");
// define("DBPASS", "root");
// define("DBNAME", "entrainement");

// //DSN (Data Source Name) de connexion
// $dsn = "mysql:dbname=".DBNAME.";host=".DBHOST;


// //Se connecter à la base
// //Enlever une exception PDO
// try {
//     // On va instancier PDO
//     $bdd = new PDO ($dsn, DBUSER, DBPASS);

//     // On s'assure d'envoyer les données en UTF8

//     $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

// } catch(PDOException $e){
//     echo "Erreur:".$e->getMessage();
// }

