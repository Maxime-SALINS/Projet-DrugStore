<?php

$title = "Page | Connexion";
require_once '../../views/components/header.php';
require_once '../../utilities/db.php';
require_once '../../controllers/Connexion.php';

?>
<section>
    <h2>Connexion</h2>
    <div>
        <form action="" method="post">
            <div>
                <input type="text" name="name_user" id="name_user" placeholder="Entrer votre nom" autocomplete="off">
                <?php echo $name?>
            </div>
            <div>
                <input type="password" name="password" id="password" placeholder="Mot de passe" autocomplete="off">
                <?php echo $message_password?>
            </div>
            <div>
                <button type="submit">Connexion</button>
            </div>
            <?php echo empty($message) ? $connexion: $message ?>
        </form>
    </div>
</section>

<?php  require_once '../../views/components/footer.php';?>