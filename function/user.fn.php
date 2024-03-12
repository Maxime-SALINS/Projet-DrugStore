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

function updateWizarsImage($bdd, $image_wizard, $name_wizard) {
    
    // On utilise les requêtes préparées et des marqueurs nommés
    $query_update = $bdd->prepare('UPDATE user SET image = :image WHERE name = :name');

    //On Lie les variables à la requête
    $query_update->bindValue(':image', $image_wizard);
    $query_update->bindValue(':name', $name_wizard);
    
    // On execute la requête
    $query_update->execute();
}

function selectRoleUpdate($bdd){
    $query_role = $bdd->query("SELECT * FROM role");

    $table_role = $query_role->fetchAll(PDO::FETCH_ASSOC);
    // var_dump($table_role);

    return $table_role;
}

function selectWizardUpdate($bdd) {
    $query_user = $bdd->query("SELECT u.id, u.name, r.idrole, r.role 
    FROM user u 
    INNER JOIN role r 
    ON u.role_id = r.idrole"
    );

    $table_user = $query_user->fetchAll(PDO::FETCH_ASSOC);
    // var_dump($table_user);

    return $table_user;
}