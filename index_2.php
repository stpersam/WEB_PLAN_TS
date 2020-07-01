<!DOCTYPE HTML>
<?php session_start(); ?>
<!--
	Helios by HTML5 UP
	html5up.net | @ajlkn
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html>

<head>
    <title>Picture Cloud</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
    <link rel="stylesheet" href="res/assets/css/main.css" />
    <noscript>
        <link rel="stylesheet" href="res/assets/css/noscript.css" /></noscript>


    <!-- Fancybox/Fancyapps-->
    <!-- 1. Add latest jQuery and fancybox files -->
    <script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.css" />
    <script src="https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.js"></script>

    <!-- Bootstrap 4-->
    <!-- CSS only -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <!-- JS, Popper.js, and jQuery -->
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>

    <script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script>

</head>

<body class="homepage is-preload">
    <?php
    include "model/picture.php";
    include "utility/DB.php";
    include "model/User.php";

    if (isset($_SESSION['users']['Username'])) {
        $currentuser = $_SESSION['users']['Username'];
    } else {
        $currentuser = "";
    }
    ?>

    <script type="text/javascript">
        $(document).ready(function() {
            $("#includecontent").load("inc/home.php");
        });

        function showcontent($id) {
<<<<<<< HEAD
            var currentuser = "'" + <?php
                                if (isset($_SESSION['users']['Username'])) {
                                    echo '"testing"';
                                    //echo $_SESSION['users']['Username'];
                                } ?> + "'";
            
=======
>>>>>>> 1d8c41e28e0673af8c3aa6b843da470d17ddb9e8
            switch ($id) {
                case "gallery":
                    $("#includecontent").load("inc/gallery.php");
                    break;
                case "impressum":
                    $("#includecontent").load("inc/impressum.php");
                    break;
                case "help":
                    $("#includecontent").load("inc/hilfe.php");
                    break;

                case "registrieren":
                    $("#includecontent").load("inc/registerForm.php");
                    break;
                case "chat":
<<<<<<< HEAD
                    if (currentuser !== "''")
                        $("#includecontent").load("inc/chat.php");
                    else {
                        $("#includecontent").load("inc/loginForm.php");
                    }
=======
                    $("#includecontent").load("inc/chat.php");
>>>>>>> 1d8c41e28e0673af8c3aa6b843da470d17ddb9e8
                    break;
                default:
                    $("#includecontent").load("inc/home.php");
                    break;
            }
        }
    </script>

    <div id="page-wrapper">
        <!-- Header -->
        <div id="header">
            <!-- Inner -->
            <div class="inner">
                <header>
                    <h1><a href="index_2.php" id="logo">Picture Cload</a></h1>
                    <hr />
                    <p>The world greatest Picture Gallery Manager</p>
                </header>
            </div>

            <!-- Nav -->
            <nav id="nav">
                <ul>
                    <li><a href="" onclick="showcontent('')">Home</a></li>
                    <li><a href="" onclick="showcontent('gallery')">Gallery</a></li>
                    <li><a href="" onclick="showcontent('chat')">Chat</a></li>
                    <li><a href="" onclick="showcontent('help')">Help</a></li>
                    <li><a href="" onclick="showcontent('impressum')">Impressum</a></li>
                </ul>
            </nav>
        </div>

        <!-- Content -->
        <section id="content">

            <body>
                <div id="includecontent" class="wrapper style2">
                </div>
            </body>
        </section>

        <footer class="text-center ">
            <a href="#header" class=""><i class="fa fa-arrow-up"></i>To the top</a>
        </footer>

        <script src="res/assets/js/jquery.min.js"></script>
        <script src="res/assets/js/jquery.dropotron.min.js"></script>
        <script src="res/assets/js/jquery.scrolly.min.js"></script>
        <script src="res/assets/js/jquery.scrollex.min.js"></script>
        <script src="res/assets/js/browser.min.js"></script>
        <script src="res/assets/js/breakpoints.min.js"></script>
        <script src="res/assets/js/util.js"></script>
        <script src="res/assets/js/main.js"></script>
</body>

</html>