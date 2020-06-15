<?php
function is_string_inside ($tab, $string) {
    $result = array();
    foreach ($tab as $key => $value) {
        if (strpos($key, $string) !== false) {
            $result[] = $key;
        }
    }
    return $result;
}
$post = ['simpleAnswer1' => 'champ1', 'simpleAnswer2' => 'champ2', 'simpleAnswer3' => 'champ3'];
$result = is_string_inside($post, 'simpleAnswer');
var_dump($result);