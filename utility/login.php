<?php
include "../utility/DB.php";
session_start();

$isLoggedIn = false;

if(isset($_COOKIE["cookieLIn"])){
    $isLoggedIn = true;
}

// if clicked on the logout button the session will be destroyed and the user is logged out
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    if(filter_has_var(INPUT_POST, "logout")){
        $isLoggedIn = false;
        $db = new DB();
        $db->changeState($_SESSION['users']['Username'],"offline");
        if(isset($_COOKIE[session_name()])){
            setcookie(session_name(),"",time-3600,"");
            $_SESSION = array();
            session_destroy();
        }
        setcookie("cookieLIn","",time()-100);
        header("Location: ../index.php");
        die();
    }else{
        $db = new DB();
        if($db->countUser(filter_input(INPUT_POST,"username")) != 0){
            if($db->getPassword(filter_input(INPUT_POST,"username")) === hash('sha256',filter_input(INPUT_POST,"password"))){
                $isLoggedIn = true;
            }else{
                $isLoggedIn = false;
                header("Location:../index.php");
                die();
            }
        }else{
            $isLoggedIn = false;
            header("Location:../index.php");
            die();
        }
    }
}

//if the user is logged in his stade will be set to online and his attributes will be added to the Session.
if($isLoggedIn){
    $db = new DB();
    $user = $db->getUser(filter_input(INPUT_POST,"username"));

    $_SESSION["users"] = $user;
    $_SESSION["isLoggedIn"] = $isLoggedIn;

    $state = $db->getState($_SESSION["users"]["Username"]);
    if($state == "offline"){
        $db->changeState($_SESSION["users"]["Username"],"online");;
    }

    if(filter_has_var(INPUT_POST, "stayLoggedIn")){
        setcookie("cookieLIn", filter_input(INPUT_POST,"username"),time()+600);
    }
    header("Location:../index.php");
} else{
    header("Location:../index.php");
}

