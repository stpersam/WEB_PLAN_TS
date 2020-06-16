<?php
if(!empty(filter_input(INPUT_POST,"username"))){

    $anrede = (filter_input(INPUT_POST, "anrede"));
    $vorname = (filter_input(INPUT_POST, "vorname"));
    $nachname = (filter_input(INPUT_POST, "nachname"));
    $adresse = (filter_input(INPUT_POST, "adresse"));

    if(is_numeric($_POST["pls"])){
        $temp = $_POST["pls"];
        if($temp > 0 && $temp <= 9999){
            $plz = (filter_input(INPUT_POST, "plz"));
        }else{
            header("Location: ../index.php?wrong=plz");
        }
    }else{
        header("Location: ../index.php?wrong=plz");
    }

    $ort = (filter_input(INPUT_POST, "ort"));


    $username = (filter_input(INPUT_POST, "username"));

    if($_POST["password"] == $_POST["passwordBest"]){
        $password = (filter_input(INPUT_POST, "password"));
    }else{
        header("Location: ../index.php?wrong=pwns");
    }

    $email = (filter_input(INPUT_POST, "email"));

    $user = new User($anrede,$vorname,$nachname,$adresse,$plz,$ort,$username,$password,$email);
    $db = new DB();
    $db->registerUser($user);
}

