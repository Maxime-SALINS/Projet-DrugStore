<?php
$title = "Page | Accueil";
require_once dirname(__DIR__) . '/components/header.php';
require_once '../../utilities/db.php';
?>
<section class="sec1">
  <h1>La boutique du sorcier</h1>
  <div class="homeP">
    <h2>Qui somme nous ?</h2>
    <p>
      Bienvenue au "Chemin de Traverse", l'échoppe où la magie et le
      surnaturel fusionnent pour donner naissance à des potions uniques.
      Nous vous proposons une collection de potions médicinales magiques
      permettant de recevoir d'incroyables transformations ou aptitudes
      physiques, même si cela peut avoir un coût. Notre personnel, revêtu
      de blouses mystérieuses ornées du slogan "le bataillon d'exploration",
      est prêt à partager ses connaissances sur l'alliance entre le liquide
      cérébrospinal des titans et les enchantements magiques, visant à
      promouvoir la santé et le bien-être. Pénétrez dans notre boutique et
      venez découvrir l'union harmonieuse de la science et de la magie
      dédiée à votre bien-être.
    </p>
    <h2>Sortez le titan en VOUS !!!</h2>
  </div>
</section>
<section class="potion">
  <h2 id="produit" class="titre_section">
    <?php
    if (!empty($_SESSION['name'])) {
      $titre = 'Voici vos produits ' . $_SESSION['name'] . '';
    } else {
      $titre = '';
    }
    echo empty($titre) ? "Les Potions d'Eldia" : $titre;
    ?>
  </h2>
  <div class="card">
    <?php
    require_once dirname(__DIR__).'/components/produit_template.php';

    // SELECT *
    // FROM A
    // INNER JOIN B ON A.key = B.key
    $reponse = $bdd->query(
      'SELECT * 
      FROM product p 
      INNER JOIN category c 
      ON p.category_id = c.id
      JOIN user u
      ON p.user_id = u.id'
    );

    $table_product = $reponse->fetchAll(PDO::FETCH_ASSOC);
    // var_dump($table_product);
    if (empty($_SESSION['role'])) {
      foreach ($table_product as $produit) {
        echo produit_template_User($produit);
      }
    } else if ($_SESSION['role'] == 'admin') {
      foreach ($table_product as $produit) {
        echo produit_template($produit);
      }
    } else if ($_SESSION['role'] == 'wizard') {

      $username = $_SESSION['name'];

      $query_wizard = $bdd->prepare("SELECT *
        FROM user u
        INNER JOIN product p
        ON u.id = p.user_id
        JOIN category c
        ON p.category_id = c.id
        WHERE name = :name
        ");

      $query_wizard->bindValue(':name', $username);
      $query_wizard->execute();

      $table_product = $query_wizard->fetchAll(PDO::FETCH_ASSOC);
      // var_dump($table_product);

      foreach ($table_product as $produit) {
        echo produit_template($produit);
      }
    } else {
      foreach ($table_product as $produit) {
        echo produit_template_User($produit);
      }
    }
    ?>
  </div>
</section>
<section id="team" class="personnel">
  <h2 class="titre_section">Le Personnel</h2>
  <div class="card_perso">
    <div class="perso">
      <h3 class="styleP">Armin Arlet</h3>
      <img src="../../asset/img/personnage/arminPhotode.jpg" class="photodePro" alt="une image">
      <p class="para_Personnel">Directeur Adjoint</p>
    </div>
    <div class="perso">
      <h3 class="styleP">Eren Yeager</h3>
      <img src="../../asset/img/personnage/photoDeren.jpg" class="photodePro" alt="une image">
      <p class="para_Personnel">CEO</p>
    </div>
    <div class="perso">
      <h3 id="styleP">Mikasa Ackerman </h3>
      <img src="../../asset/img/personnage/mikasaphotode_profil.jpg" class="photodePro" alt="une image">
      <p class="para_Personnel">Directrice Ressource Humaine</p>
    </div>
  </div>
</section>
<?php require_once dirname(__DIR__) . '/components/footer.php'; ?>