<?php
require_once '../../views/components/header.php';
require_once '../../utilities/db.php';
require_once '../../controllers/Update.php';

?>

<form action="" method="post">
    <div>
        <input type="text" name="first_power" id="first_power" placeholder="Premier pouvoir">
    </div>
    <div>
        <input type="text" name="second_power" id="second_power" placeholder="Second pouvoir">
    </div>
    <div>
        <input type="number" name="prix" id="prix" placeholder="Prix du produit">
    </div>
    <button type="submit">Envoyer</button>
</form>

<?php require_once '../../views/components/footer.php'; ?>