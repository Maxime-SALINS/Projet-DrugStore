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

function userSubcribe($bdd, $username, $password, $image, $user_default){

    $insertTable = [
        $username,
        $password,
        $image,
        $user_default
    ];

    $sql = "INSERT INTO user(name,password,image,role_id) VALUES(?,?,?,?)";
    $stmt = $bdd->prepare($sql);

    $stmt->execute($insertTable);
    
}