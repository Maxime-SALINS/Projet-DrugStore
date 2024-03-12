<?php

$title = "Page | Inscription";
require_once dirname(__DIR__) . '/components/header.php';
require_once '../../utilities/db.php';
require_once '../../controllers/Inscription.php';

?>
<section>
    <h2>Inscription</h2>
    <div>
        <form action="" method="post">
            <div>
                <input type="text" name="name_user" id="name_user" placeholder="Créer votre nom" autocomplete="off">
                <?php echo $name?>
            </div>
            <div>
                <input type="password" name="password" id="password" placeholder="Créer votre mot de passe" autocomplete="off">
                <?php echo $message_password?>
            </div>
            <div>
                <button type="submit">Inscription</button>
            </div>
            <?php echo $message?>
        </form>
    </div>
</section>

<?php  require_once dirname(__DIR__) . '/components/footer.php';?>