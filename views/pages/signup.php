<?php

$title = "Page | Inscription";
require_once '../../views/components/header.php';
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
                <select name="user_type" id="user_type">
                    <option value="">Choix utilisateur</option>
                    <option value="user">Utilisateur</option>
                    <option value="wizard">Sorcier</option>
                </select>
                <?php echo $user_message?>
            </div>
            <div>
                <button type="submit">Connexion</button>
            </div>
            <?php echo $message?>
        </form>
    </div>
</section>

<?php  require_once '../../views/components/footer.php';?>