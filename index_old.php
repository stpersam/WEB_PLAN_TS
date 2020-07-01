<?php session_start(); ?>
<!DOCTYPE html>
<html>

<head>
    <title>PictureCloud</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>

    <!-- Fancybox/Fancyapps-->
    <!-- 1. Add latest jQuery and fancybox files -->
    <!--<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.min.js"></script>-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.css" />
    <script src="https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.js"></script>

    <!-- Bootstrap 4-->
    <!-- CSS only -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <!-- JS, Popper.js, and jQuery -->
    <!-- <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
   -->
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>




</head>

<body>

        <nav class="navbar navbar-expand-lg navbar-dark bg-dark justify-content-center sticky-top">
            <a class="navbar-brand" href="index_old.php?use=home">Home</a>
            <div class="">
                <ul class="navbar-nav">
                    <li class="nav-item"><a class="nav-link" href="index_old.php?use=log">Profil</a></li>
                    <li class="nav-item"><a class="nav-link" onclick="showgallery()">GalleryAJAX</a></li>
                    <li class="nav-item"><a class="nav-link" onclick="removegallery()">GalleryAJAXRE</a></li>
                    <li class="nav-item"><a class="nav-link" href="index_old.php?use=gallery">Gallery</a></li>
                    <li class="nav-item"><a class="nav-link" href="index_old.php?use=chat">Chat</a></li>
                    <li class="nav-item"><a class="nav-link" href="index_old.php?use=help">Hilfe</a></li>
                    <li class="nav-item"><a class="nav-link" href="index_old.php?use=imp">Impressum</a></li>
                </ul>
            </div>
        </nav>
    <div class="container">

        <?php
        include "model/picture.php";
        include "utility/DB.php";
        include "model/User.php";
        if (isset($_SESSION['users']['Username'])) {
            $currentuser = $_SESSION['users']['Username'];
        }
        switch (filter_input(INPUT_GET, "use", FILTER_SANITIZE_SPECIAL_CHARS)) {
            case "home": {
                    echo "<h1>Welcome at our Page </h1>";
                    break;
                }
            case "gallery": {
                    include "inc/gallery.php";
                    break;
                }
            case "reg": {
                    include "inc/registerForm.php";
                    break;
                }
            case "imp": {
                    include "inc/impressum.php";
                    break;
                }
            case "help": {
                    include "inc/hilfe.php";
                    break;
                }
            case "log": {
                    if ($_SESSION["users"]["Status"] == "aktive") {
                        if (isset($_SESSION["users"]["Username"])) {
                            echo '<form method="post" action="utility/login.php">';
                            echo '<button type="submit" name="logout" id="logout" class="btn btn-primary" style="float: right">Logout</button>';
                            echo '</form>';

                            echo "<h1>Welcome " . $_SESSION["users"]["Username"] . "</h1><br><br>";

                            if ($_SESSION["users"]["Rolle"] == "admin") {
                                include "inc/userVerwaltung.php";
                            } else if ($_SESSION["users"]["Rolle"] == "user") {

                                echo "<h1>Usersite</h1>";
                                echo '<form method="post" action="inc/profilbearbeiten.php">';
                                echo '<button type="submit" name="ep" id="ep" class="btn btn-primary" style="float: right">Edit Profile</button>';
                                echo '</form>';
                            }
                        } else {
                            header("Location: index_old.php");
                            break;
                        }
                    } else {
                        header("Location: index_old.php");
                        break;
                    }
                    break;
                }
            case "chat": {
                    echo "<h1>Welcome at our Chat </h1>";
                    include "inc/chat.php";
                    break;
                }
            default: {
                    include "inc/loginForm.php";
                    echo "<a href='index_old.php?use=reg' class='btn btn-primary'>Register</a>";
                    break;
                }
        }

        if (isset($_GET["wrong"])) {
            if ($_GET["wrong"] == "pwns") {
                $message = "Passwords are not the same";
                echo "<script type='text/javascript'>alert('$message');</script>";
            } else if ($_GET["wrong"] == "plz") {
                $message = "Wrong PLZ";
                echo "<script type='text/javascript'>alert('$message');</script>";
            } else if ($_GET["wrong"] == "un") {
                $message = "Wrong Username";
                echo "<script type='text/javascript'>alert('$message');</script>";
            } else if ($_GET["wrong"] == "pw") {
                $message = "Wrong Password";
                echo "<script type='text/javascript'>alert('$message');</script>";
            } else if ($_GET["wrong"] == "st") {
                $message = "The Status of this User is set to inaktive";
                echo "<script type='text/javascript'>alert('$message');</script>";
            }
        }



        ?>
        
        
        <div id="galleryajax"></div>


        <script type="text/javascript">
            function showgallery() {
                $("#galleryajax").load("inc/gallery.php");
            };
            function removegallery(){
                $( "#galleryajax" ).empty();
            }
        </script>
        <button onlick=showgallery()>KLICK ME</button>
    </div>
</body>

</html>