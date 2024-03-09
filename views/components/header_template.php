<?php

function headerAdmin(){
    return'
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
        <li class="btn_logout">
            <a class="login_singup" href="../../controllers/Logout.php">Déconnexion</a>
        </li>
    </ul>';
}

function headerWizard(){
    return'
    <ul class="ul_navbar">
        <li>
            <a class="stylea" href="index.php">Accueil</a>
        </li>
        <li>
            <a class="stylea" href="ajout_produit.php">Ajout produit</a>
        </li>
        <li>
            <a class="stylea" target="_blank" href="contact.php">Contact</a>
        </li>
    </ul>
    <ul class="ul_connexion">
        <li class="btn_logout">
            <a class="login_singup" href="../../controllers/Logout.php">Déconnexion</a>
        </li>
    </ul>';
}

function headerUserLogin(){
    return '
    <ul class="ul_navbar">
        <li>
            <a class="stylea" href="index.php">Accueil</a>
        </li>
        <li>
            <a class="stylea" href="#produit">Produit</a>
        </li>
        <li>
            <a class="stylea" href="#team">Notre équipe</a>
        </li>
        <li>
            <a class="stylea" target="_blank" href="contact.php">Contact</a>
        </li>
    </ul>
    <ul class="ul_connexion">
        <li class="btn_logout">
            <a class="login_singup" href="../../controllers/Logout.php">Déconnexion</a>
        </li>
    </ul>';
}

function headerUser(){
    return '
    <ul class="ul_navbar">
        <li>
            <a class="stylea" href="index.php">Accueil</a>
        </li>
        <li>
            <a class="stylea" href="#produit">Produit</a>
        </li>
        <li>
            <a class="stylea" href="#team">Notre équipe</a>
        </li>
        <li>
            <a class="stylea" target="_blank" href="contact.php">Contact</a>
        </li>
    </ul>
    <ul class="ul_connexion">
        <li class="btn_login">
            <a class="login_singup" href="login.php">Connexion</a>
        </li>
        <li class="btn_singup">
            <a class="login_singup" href="signup.php">Inscription</a>
        </li>
    </ul>';
}