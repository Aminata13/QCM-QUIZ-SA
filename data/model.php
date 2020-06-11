<?php

function connectionDatabase() {
    try
    {
        $db = new PDO('mysql:host=localhost;dbname=qcm_quiz_sa;charset=utf8', 'root', '');
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
        return $db;
    }
    catch (Exception $e)
    {
        die('Erreur : ' . $e->getMessage());
    }
}

function authenticate($login, $password) {
    $db = connectionDatabase();

    $sql = 'SELECT * FROM users WHERE login =:login AND password =:password';

    $query = $db->prepare($sql);
    $query->execute(array('login'=>$login, 'password'=>$password));

    return $query;
}

function setUser($login, $password, $surname, $firstname) {
    $statut = 1;
    if(isset($_SESSION['user'])) { 
        $profil = 'admin'; 
    }
    else {
     $profil = 'player';    
    }

    try {
        $db = connectionDatabase();

        $query = $db -> prepare("INSERT INTO users(login, password, surname, firstname, profil, status) VALUES(:login, :password, :surname, :firstname, :profil, :statut)");
        $query -> bindParam("login",$login,PDO::PARAM_STR);
        $query -> bindParam("password",$password,PDO::PARAM_STR);
        $query -> bindParam("surname",$surname,PDO::PARAM_STR);
        $query -> bindParam("firstname",$firstname,PDO::PARAM_STR);
        $query -> bindParam("profil",$profil,PDO::PARAM_STR);
        $query -> bindParam("statut",$statut,PDO::PARAM_INT);
        $query -> execute();

        return $db->lastInsertId();
    } catch(PDOException $e) {
        return 'Ce login existe déjà';
    }
         
}

function setUserAndAvatar($login, $password, $surname, $firstname) {
    $result = setUser($login, $password, $surname, $firstname);

    if (is_numeric($result)) {
        //on récupere l'id que l'on met dans $user et on insert dans avatars
        $user = (int)$result;
        $target_dir = "public/uploads/";
        $path = $target_dir . basename($_FILES['file']["name"]);
        $type = $_FILES['file']["type"];

        try {
            $db = connectionDatabase();
    
            $query = $db -> prepare("INSERT INTO avatars(path, type, user) VALUES(:path, :type, :user)");
            $query -> bindParam("path",$path,PDO::PARAM_STR);
            $query -> bindParam("type",$type,PDO::PARAM_STR);
            $query -> bindParam("user",$user,PDO::PARAM_STR);
            $query -> execute();
    
            return 1;
        } catch(PDOException $e) {
            exit($e -> getMessage());
        }
    } else {
        return 0;
    }
}

