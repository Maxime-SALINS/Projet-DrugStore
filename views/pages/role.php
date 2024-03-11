<?php
$title = "Page | Gestion rôle";
require_once '../../views/components/header.php';
require_once '../../utilities/db.php';

$query_role = $bdd->query("SELECT * FROM role");

$table_role = $query_role->fetchAll(PDO::FETCH_ASSOC);
// var_dump($table_role);

$query_user = $bdd->query("SELECT u.id, u.name, r.idrole, r.role 
FROM user u 
INNER JOIN role r 
ON u.role_id = r.idrole"
);

$table_user = $query_user->fetchAll(PDO::FETCH_ASSOC);
// var_dump($table_user);

require_once '../../controllers/Update-role.php';
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
                        require_once '../../views/components/select_wizard.php';

                        foreach ( $table_user as $wizard) {
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
                        require_once '../../views/components/select_role.php';
            
                        foreach ( $table_role as $role) {
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


<?php require_once '../../views/components/footer.php';?>