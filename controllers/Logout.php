<?php

session_start();

$_SESSION = array();

session_destroy();

header('Location: ../../../La-boutique-du-chemin-de-traverse/views/pages/index.php');

?>