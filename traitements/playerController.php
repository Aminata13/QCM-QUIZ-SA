<?php
include('../data/model.php');

if (isset($_POST['limit'])) {
    $limit = $_POST['limit'];
    $offset  = $_POST['offset'];

    $data = selectPlayers($limit, $offset);

    echo json_encode($data);
} 
if (isset($_POST['blocked']) && isset($_POST['id'])) {
    $id = $_POST['id'];
    $blocked = $_POST['blocked'];

    $result = blockPlayer($id, $blocked);

    if ($result == 1) {
        echo 'correct';
    }
}

if (isset($_POST['surname'])) {
    $id = $_POST['id'];
    $surname = $_POST['surname'];
    $firstname = $_POST['firstname'];
    $score = $_POST['score'];

    if (empty($id) || empty($surname) || empty($firstname) || empty($score)) {
        echo 'Veuillez renseigner tous les champs.';
    } else {     
        $result = updatePlayer($id, $surname, $firstname, $score);
        if ($result == 1) {
            echo 'correct';
        } else {
            echo 'erreur';
        }
    }

}