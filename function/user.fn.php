<?php

function login ($bdd, $username, $password){

    $sql = $bdd->prepare("SELECT * FROM user INNER JOIN role ON user.role_id =role.idrole WHERE name = :name");
    $sql->bindValue(':name', $username, PDO::PARAM_STR);

    $sql->execute();

    $result = $sql->fetch(PDO::FETCH_OBJ);

    if(!$result){
        $msg_error = "Login ou mot de passe invalide";
        return ['result'=>false, 'msg'=> $msg_error];
    } else {
        if(password_verify($password, $result->password)){
            setUserSession($bdd, $result->id, $result->name, $result->role);
            $msg_sucess = "Connexion réussi";
            return ['result'=>true, 'msg'=> $msg_sucess];
        } else {
            $msg_error = "Login ou mot de passe invalide";
            return ['result'=>false, 'msg'=> $msg_error];
        }
    }
}

function setUserSession ($bdd, $id, $username, $role){
    // session_start();
    $sql = "UPDATE user SET lastLogin = NOW() WHERE id=:id";
    $stmt = $bdd->prepare($sql);
    $stmt->bindValue(':id', $id, PDO::PARAM_INT);

    $stmt->execute();

    $_SESSION['id'] = $id;
    $_SESSION['name'] = $username;
    $_SESSION['role'] = $role;

}

function userSubscribe($bdd, $username, $password){
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    $sql_check_username = $bdd->prepare("SELECT * FROM user WHERE name = :name");
    $sql_check_username->bindValue(':name', $username, PDO::PARAM_STR);
    $sql_check_username->execute();

    $result_username = $sql_check_username->fetch(PDO::FETCH_OBJ);

    if($result_username){
        $msg_error = "Ce nom d'utilisateur existe déjà.";
        return ['result'=>false, 'msg'=> $msg_error];
    } else {
        $sql_subscribe = $bdd->prepare("INSERT INTO user (name, password, image, role_id) VALUES (:name, :password, '../../asset/img/personnage/default-img.png', 1)");
        $sql_subscribe->bindValue(':name', $username, PDO::PARAM_STR);
        $sql_subscribe->bindValue(':password', $hashed_password, PDO::PARAM_STR);

        if($sql_subscribe->execute()){
            $msg_success = "Inscription réussie.";
            // Connecter l'utilisateur automatiquement après l'inscription réussie
            setUserSession($bdd, $bdd->lastInsertId(), $username, 'user');
            return ['result'=>true, 'msg'=> $msg_success];
        } else {
            $msg_error = "Une erreur est survenue lors de l'inscription.";
            return ['result'=>false, 'msg'=> $msg_error];
        }
    }
}
