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
      <ul class="ul_navbar">
        <li>
          <a class="stylea" href="index.php">Accueil</a>
        </li>
        <li>
          <a class="stylea" href="ajout_produit.php">Ajout produit</a>
        </li>
        <li>
          <a class="stylea" href="ajout_wizard.php">Ajout sorcier</a>
        </li>
        <li>
          <a class="stylea" target="_blank" href="contact.php">Contact</a>
        </li>
      </ul>
      <ul class="ul_connexion">
        <li class="btn_login">
          <a class="login_singup" href="#">Connexion</a>
        </li>
        <li class="btn_singup">
          <a class="login_singup" href="#">Inscription</a>
        </li>
      </ul>
    </nav>
  </header>