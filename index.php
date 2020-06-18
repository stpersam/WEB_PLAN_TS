<?php session_start();?>
<!DOCTYPE html>
<html>

<head>
    <title>UE11</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.css" />
    <script src="https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <style>
        body {
            margin-left: 15%;
            margin-right: 15%;
        }
    </style>
</head>

<body>
        <a href="index.php"><button>HOME</button></a>

    <?php
    include "model/picture.php";
    include "utility/DB.php";
    include "model/User.php";


    switch (filter_input(INPUT_GET,"use",FILTER_SANITIZE_SPECIAL_CHARS)){
        case "reg":{
            include "inc/registerForm.php";
            break;
        }
        default:{
            include 'inc/loginForm.php';
        }
    }


    if (isset($_GET["wrong"])) {
        if ($_GET["wrong"] == "pwns") {
            $message = "Passwords are not the same";
            echo "<script type='text/javascript'>alert('$message');</script>";
        } else if ($_GET["wrong"] == "plz") {
            $message = "Wrong PLZ";
            echo "<script type='text/javascript'>alert('$message');</script>";
        }else if ($_GET["wrong"] == "un") {
            $message = "Wrong Username";
            echo "<script type='text/javascript'>alert('$message');</script>";
        }
    }

    include "inc/gallery.php";
    ?>

</body>

</html>