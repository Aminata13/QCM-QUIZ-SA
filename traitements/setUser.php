<?php
require_once('../data/model.php');

$target_dir = "../public/uploads/";
$target_file = $target_dir . basename($_FILES['file']["name"]);

// Check if image file is a actual image or fake image
if(empty($_FILES['file']["tmp_name"])) {
    echo "Le fichier téléchargé n'est pas une image.";
} else {
    // Check if file already exists
    if (file_exists($target_file)) {
        echo "Le fichier image existe déjà.";
    } else {
        // Check file size
        if ($_FILES['file']["size"] > 500000) {
            echo "Le fichier image est trop large.";
        } else {
            // if everything is ok, try to upload file
            if (move_uploaded_file($_FILES['file']["tmp_name"], $target_file)) {
                
                $login = $_POST['username'];
                $password = $_POST['password'];
                $confirmPassword = $_POST['confirmPassword'];
                $surname = $_POST['surname'];
                $firstname = $_POST['firstname'];

                //validations
                if (empty($login) ||empty($password) || empty($confirmPassword) || empty($surname) || empty($firstname)) {
                    echo 'Veuillez remplir tous les champs.';
                } elseif ($password !== $confirmPassword) {
                    echo 'Les deux mots de passe ne correspondent pas.';
                } else {
                    //enregistrement du user dans la BD
                    $result = setUserAndAvatar($login, $password, $surname, $firstname);

                    if ($result != 1) {
                        echo '*Ce login existe déjà.';
                    } else {
                        echo 'ok';
                    }
                }
            } else {
                echo 'Erreur au moment de l\'upload.Veuillez réessayer.';
            }
            
        }

    }

}