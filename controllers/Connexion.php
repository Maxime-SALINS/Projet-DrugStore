<?php

$name = '';
$user_message = '';
$message_password = '';
$message = '';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    if (!empty($_POST['name_user']) && !empty($_POST['password'])) {
        $name_user = htmlspecialchars($_POST['name_user']);
        $nameChek = [$name_user];
    
        $req_name = $bdd->prepare("SELECT password FROM user WHERE name = ?");
        $req_name->execute($nameChek);

        if($req_name->rowCount() > 0) {

            $table_user = $req_name->fetchAll(PDO::FETCH_ASSOC);

            $password = $_POST['password'];
            $hash = $table_user[0]['password'];
            $passwordCheck = password_verify($password, trim($hash));
            
            if($passwordCheck === true) {
    
                $recupUser = $bdd->prepare("SELECT * 
                FROM user u 
                INNER JOIN role r 
                ON u.role_id = r.idrole 
                WHERE name =?"
                );
                $recupUser->execute($nameChek);
        
                $table = $recupUser->fetchAll(PDO::FETCH_ASSOC);
                // var_dump($table);
                
                $_SESSION['name_user'] = $name_user;
                $_SESSION['password'] = $password;
                $_SESSION['user_type'] =  $table[0]['role'];
                $_SESSION['id'] = $table[0]['id'];;
                // var_dump($_SESSION['id']);
                header('Location: ../../views/pages/index.php');
    
            } else {
                $message = "Votre mot de passe est incorrect";
            }
        } else {
            $message = "Votre nom d'utilisateur n'existe pas !";
        }
    } else {
        $name = $message_password = $user_message = '<span style="color:red">*Ce champ est obligatoire</span>';
        $message = "<span style='color:red'>Vous n'avez pas remplie tout les champs !</span>";
    }
}

