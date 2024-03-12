<?php
$title = "Page | Gestion rôle";
require_once dirname(__DIR__) . '/components/header.php';
require_once dirname(dirname(__DIR__)) . '/utilities/db.php';
require_once dirname(dirname(__DIR__)) . '/function/user.fn.php';

$table_role = selectRoleUpdate($bdd);
$table_user = selectWizardUpdate($bdd);

require_once dirname(dirname(__DIR__)) . '/controllers/Update-role.php';
require_once dirname(dirname(__DIR__)) . '/function/select.fn.php';
?>
<section>
    <h2>Modification des rôles utilisateur</h2>
    <div>
        <form action="" method="post">
            <div>
                <label for="wizard">Sélectionner un utilisateur</label>
                <select name="user" id="user">
                    <option value="" >Choix de l'utilisateur</option>
                    <?php
                        foreach ($table_user as $wizard) {
                            echo selectWizard($wizard);
                        }
                    ?>
                </select>
                <?php echo $wizard_message?>
            </div>
            <div>
            <label for="wizard">Sélectionner le nouveau role</label>
                <select name="role" id="role">
                    <option value="">Choix du rôle</option>
                    <?php
                        foreach ($table_role as $role) {
                            echo selectRole($role);
                        }
                    ?>
                </select>
                <?php echo $wizard_message?>
            </div>
            <div>
                <button class="buttonlivredor" type="submit">ENVOYER !</button>
            </div>
            <?php echo $message?>
        </form>
    </div>
</section>


<?php require_once dirname(__DIR__) . '/components/footer.php';?>