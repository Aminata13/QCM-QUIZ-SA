<?php

function connectionDatabase()
{
    try {
        $db = new PDO('mysql:host=localhost;dbname=qcm_quiz_sa;charset=utf8', 'root', '');
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        return $db;
    } catch (Exception $e) {
        die('Erreur : ' . $e->getMessage());
    }
}

function authenticate($login, $password)
{
    $db = connectionDatabase();

    $sql = 'SELECT * FROM users WHERE login =:login AND password =:password';

    $query = $db->prepare($sql);
    $query->execute(array('login' => $login, 'password' => $password));

    return $query;
}

function setUser($login, $password, $surname, $firstname, $profil)
{
    $statut = 1;
    try {
        $db = connectionDatabase();

        $query = $db->prepare("INSERT INTO users(login, password, surname, firstname, profil, status) VALUES(:login, :password, :surname, :firstname, :profil, :statut)");
        $query->bindParam("login", $login, PDO::PARAM_STR);
        $query->bindParam("password", $password, PDO::PARAM_STR);
        $query->bindParam("surname", $surname, PDO::PARAM_STR);
        $query->bindParam("firstname", $firstname, PDO::PARAM_STR);
        $query->bindParam("profil", $profil, PDO::PARAM_STR);
        $query->bindParam("statut", $statut, PDO::PARAM_INT);
        $query->execute();

        return $db->lastInsertId();
    } catch (PDOException $e) {
        return 'Ce login existe déjà';
    }
}

function setUserAndAvatar($login, $password, $surname, $firstname, $profil)
{
    $result = setUser($login, $password, $surname, $firstname, $profil);

    if (is_numeric($result)) {
        //on récupere l'id que l'on met dans $user et on insert dans avatars
        $user = (int) $result;
        $target_dir = "public/uploads/";
        $path = $target_dir . basename($_FILES['file']["name"]);
        $type = $_FILES['file']["type"];

        try {
            $db = connectionDatabase();

            $query = $db->prepare("INSERT INTO avatars(path, type, user) VALUES(:path, :type, :user)");
            $query->bindParam("path", $path, PDO::PARAM_STR);
            $query->bindParam("type", $type, PDO::PARAM_STR);
            $query->bindParam("user", $user, PDO::PARAM_STR);
            $query->execute();

            return 1;
        } catch (PDOException $e) {
            exit($e->getMessage());
        }
    } else {
        return 0;
    }
}

function selectPlayers($limit, $offset)
{
    try {
        $db = connectionDatabase();

        $query = $db->prepare("SELECT id, firstname, surname, score, status FROM users WHERE profil='player' ORDER BY score DESC LIMIT :limit OFFSET :offset");
        $query->bindParam("limit", $limit, PDO::PARAM_INT);
        $query->bindParam("offset", $offset, PDO::PARAM_INT);
        $query->execute();

        return $query->fetchAll();
    } catch (PDOException $e) {
        exit($e->getMessage());
    }
}

function blockPlayer($id, $blocked)
{
    try {
        $db = connectionDatabase();

        if ($blocked == "true") {
            $query = $db->prepare("UPDATE users SET status=1 WHERE id =:id");
        } elseif ($blocked == "false") {
            $query = $db->prepare("UPDATE users SET status=0 WHERE id =:id");
        }
        $query->bindParam("id", $id, PDO::PARAM_INT);
        $query->execute();

        return 1;
    } catch (PDOException $e) {
        exit($e->getMessage());
    }
}

function updatePlayer($id, $surname, $firstname, $score)
{
    try {
        $db = connectionDatabase();

        $query = $db->prepare("UPDATE users SET surname =:surname, firstname =:firstname, score =:score WHERE id =:id");
        $query->bindParam("surname", $surname, PDO::PARAM_STR);
        $query->bindParam("firstname", $firstname, PDO::PARAM_STR);
        $query->bindParam("score", $score, PDO::PARAM_INT);
        $query->bindParam("id", $id, PDO::PARAM_INT);
        $query->execute();

        return 1;
    } catch (PDOException $e) {
        exit($e->getMessage());
    }
}
// var_dump(selectQuestions(5,0));
function selectQuestions($limit, $offset)
{
    try {
        $db = connectionDatabase();

        $query = $db->prepare("SELECT questions.id as idQuestion, questions.libelle AS question, questions.type, a.libelle AS answer, a.etat as state 
        FROM (SELECT * FROM questions ORDER BY questions.id LIMIT :limit OFFSET :offset) questions 
        INNER JOIN answers AS a ON questions.id = a.id_questions 
        ORDER BY questions.id ASC");
        $query->bindParam("limit", $limit, PDO::PARAM_INT);
        $query->bindParam("offset", $offset, PDO::PARAM_INT);
        $query->execute();

        return $query->fetchAll(2);
    } catch (PDOException $e) {
        exit($e->getMessage());
    }
}

function setQuestion($question, $type, $point)
{
    try {
        $db = connectionDatabase();

        $query = $db->prepare("INSERT INTO questions(libelle, type, score) VALUES(:question, :type, :score)");
        $query->bindParam("question", $question, PDO::PARAM_STR);
        $query->bindParam("type", $type, PDO::PARAM_STR);
        $query->bindParam("score", $point, PDO::PARAM_INT);
        $query->execute();

        return $db->lastInsertId();
    } catch (PDOException $e) {
        exit($e->getMessage());
    }
}

function setAnswer($idQuestion, $answer, $state)
{
    try {
        $db = connectionDatabase();

        $query = $db->prepare("INSERT INTO answers(libelle, etat, id_questions) VALUES(:libelle, :etat, :question)");
        $query->bindParam("libelle", $answer, PDO::PARAM_STR);
        $query->bindParam("etat", $state, PDO::PARAM_INT);
        $query->bindParam("question", $idQuestion, PDO::PARAM_INT);
        $query->execute();

        return 1;
    } catch (PDOException $e) {
        exit($e->getMessage());
    }
}
