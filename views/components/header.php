<?php
session_start();

require_once 'header_template.php';

?>

<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?php echo !empty($title) ? $title  : "Page | Accueil" ?></title>
  <link rel="stylesheet" href="../../asset/css/style.css">
  <link rel="stylesheet" href="../../asset/css/product.css">
  <link rel="shortcut icon" href="../../asset/img/logo/Logo_projet.png" type="image/x-icon">
</head>

<body>
  <header>
    <div>
    <a href="index.php"><img class="logo" src="../../asset/img/logo/Logo_projet.png" alt="un logo"></a>
    </div>
    <nav class="navbar">
      <?php 
      if (empty($_SESSION['user_type'])) {
        echo headerAdmin();
      } else if ($_SESSION['user_type'] == 'admin'){
        echo headerUser();
      }
      
      ?>
    </nav>
  </header>