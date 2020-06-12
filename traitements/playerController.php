<?php
require_once('data/model.php');

function fetchPlayers($post) {
    $limit = $post['limit'];
    $offset  = $post['offset'];

    $data = selectPlayers($limit, $offset);

    echo json_encode($data);
}