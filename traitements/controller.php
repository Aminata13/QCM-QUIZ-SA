<?php
require_once('data/model.php');
session_start();


function displayUserPage($post) {
    $login = $post['username'];
    $password = $post['password'];

    if (empty($login) || empty($password)) {
        return 'error';
    } else {
        //appel de la fonction de select du model
        $result = authenticate($login, $password);
        $user = $result->fetch();

        if (!$user) {
            echo 'error';
    
        } else {
            $_SESSION['user'] = $user;
            echo $user['profil'];
    
        }
    }
    
}

function deconnection () {
    unset( $_SESSION['user']);
    session_destroy();
}

function isConnected () {
    return isset($_SESSION['user']);
}
$post = array(
    'username' => 'Ibou', 
    'password' => 'iboupassword', 
    'confirmPassword' => 'iboupassword',
    'firstname' => 'Ibou',
    'surname' => 'DIATTA',
    'file' => array('name' => 'test', 'type' => 'JPEG')
);

function upload_image ($file='file') {
    $target_dir = "public/uploads/";
    $target_file = $target_dir . basename($_FILES[$file]["name"]);

    // Check if image file is a actual image or fake image
    if(empty($_FILES[$file]["tmp_name"])) {
        return "Ce fichier n'est pas une image.";
    } else {
        // Check if file already exists
        if (file_exists($target_file)) {
            return "Ce fichier existe déjà.";
        } else {
            // Check file size
            if ($_FILES[$file]["size"] > 500000) {
                return "Ce fichier est trop large.";
            } else {
                // if everything is ok, try to upload file
                move_uploaded_file($_FILES[$file]["tmp_name"], $target_file);
                echo "true";
            }
    
        }

    }
    
}