<?php
require_once('traitements/controller.php');

define('ACTION', 'action');

if (isset($_GET[ACTION])) 
{
    if ($_GET[ACTION] == 'login') 
    {
        displayUserPage($_POST);

    } elseif($_GET[ACTION] == 'signup') 
    {
        require_once('pages/signup.php');
    } 
    elseif ($_GET[ACTION]=="admin")
    {
        if (isConnected()){
        
            if (isset($_GET["page"]))
            {
              
                if ($_GET["page"]=="showPlayers") {

                    require_once 'pages/player/list.php';

                } elseif ($_GET["page"]=="addQuestion") {

                    require_once 'pages/question/new.php';

                } elseif ($_GET["page"]=="showQuestions") {

                    require_once 'pages/question/list.php';

                } elseif ($_GET["page"]=="addAdmin") {

                    require_once('pages/signup.php');
                }
                
            } else
            {
                require_once 'pages/admin/layout_admin.php';
            }
        } else
        {
            require_once 'pages/layout.php'; 
        }
    } elseif ($_GET[ACTION]=="player")
    {
        require_once 'pages/player/game.php';
    }
} else 
{
    require_once('pages/layout.php');
}