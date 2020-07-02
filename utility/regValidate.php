<?php
include "../model/User.php";
include "DB.php";
session_start();

// validates the data what came from the registerForm.php
    $anrede = (filter_input(INPUT_POST, "anrede"));
    $vorname = (filter_input(INPUT_POST, "vorname"));
    $nachname = (filter_input(INPUT_POST, "nachname"));
    $adresse = (filter_input(INPUT_POST, "adresse"));

    if(is_numeric($_POST["plz"])){
        $temp = $_POST["plz"];
        if($temp > 0 && $temp <= 9999){
            $plz = (filter_input(INPUT_POST, "plz"));
        }else{
            header("Location: ../index.php");
            die();
        }
    }else{
        header("Location: ../index.php");
        die();
    }

    $ort = (filter_input(INPUT_POST, "ort"));

    // checks if the username dont already exists
    $db = new DB();
    $count = $db->countUser(filter_input(INPUT_POST, "username"));

    if($count == 0){
        $username = (filter_input(INPUT_POST, "username"));
    }else{
        header("Location: ../index_old.php");
        die();
    }

    // checks if the passwords are the same
    if($_POST["password"] == $_POST["passwordBest"]){
        $password = (filter_input(INPUT_POST, "password"));
    }else{
        header("Location: ../index.php");
        die();
    }

    // hashes the password and creates a new user what is added to the database
    $email = (filter_input(INPUT_POST, "email"));
    $password = hash('sha256',$password);
    $user = new User($anrede,$vorname,$nachname,$adresse,$plz,$ort,$username,$password,$email);
    $db = new DB();
    $temp = $db->registerUser($user);

    if($temp){
        if(!array_key_exists("user",$_SESSION)){
            $_SESSION["user"] = array();
        }
        array_push($_SESSION["user"],serialize($user));
        header("Location:../index.php");
    }



