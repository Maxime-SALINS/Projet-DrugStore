<?php
$title = "Page | Accueil";
require_once '../../views/components/header.php';
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
  <h2 id="produit" class="titre_section">Les Potions d'Eldia</h2>
  <div class="card">
    <?php 
      require_once ('../../views/components/produit_template.php');

      // SELECT *
      // FROM A
      // INNER JOIN B ON A.key = B.key

      // $reponse = $bdd->query('SELECT product.id, 
      // product.titre, 
      // product.product_image, 
      // product.first_power, 
      // product.second_power, 
      // product.prix, 
      // product.wizard_id, 
      // wizard.wizard_name, 
      // wizard.wizard_image 
      // FROM product INNER JOIN wizard ON product.wizard_id = wizard.id');

      // $table = $reponse->fetchAll(PDO::FETCH_ASSOC);
      // var_dump($table);

      // foreach ($table as $produit) {
      //   echo produit_template($produit);
      // }
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
<?php  require_once '../../views/components/footer.php';?>