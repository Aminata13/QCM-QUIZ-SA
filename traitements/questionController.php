<?php
include('../data/model.php');

if (isset($_POST['type'])) {
    $question = $_POST['question'];
    $type = $_POST['type'];
    $score = $_POST['point'];

    $id = setQuestion($question, $type, $score);

    if (is_numeric($id)) {
        if ($type == 'text') {
            $result = setAnswer($id, $_POST['textAnswer'], 1);
        } elseif ($type == "simple") {
            $i = 0;
            $answers = is_string_inside($_POST, 'simpleAnswer');
            while (isset($answers[$i])) {
                $value = $answers[$i];
                $answer = $_POST[$value];
                if ($_POST['answer'] == $value) {
                    $state = 1;
                } else {
                    $state = 0;
                }
                $result = setAnswer($id, $answer, $state);
                $i++;
            }
        } elseif ($type == "multiple") {
            $j = 0;
            $answers = is_string_inside($_POST, 'multipleAnswer');
            while (isset($answers[$j])) {
                $value = $answers[$j];
                $answer = $_POST[$value];
                $goodAnswers = is_string_inside($_POST, 'checkbox');
                $k = 0;
                while (isset($goodAnswers[$k])) {
                    $key = $goodAnswers[$k];
                    if ($_POST[$key] == $value) {
                        $state = 1;
                    }
                    $k++;
                }
                if (!isset($state)) {
                    $state = 0;
                }
                $result = setAnswer($id, $answer, $state);
                $j++;
            }
        }
    } else {
        echo 'erreur question';
    }
    if ($result == 1) {
        echo 'ok';
    } else {
        echo 'erreur';
    }
}

function is_string_inside ($tab, $string) {
    $result = array();
    foreach ($tab as $key => $value) {
        if (strpos($key, $string) !== false) {
            $result[] = $key;
        }
    }
    return $result;
}

