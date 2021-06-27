<?php session_start(); ?>
<script type="text/javascript" src="./utility/showcontents.js"></script>
<link rel="stylesheet" href="res/assets/css/main.css" />
<!-- CSS -->
<style>
    .btn-color {
        background-color: #734F6F;
        color: #FFFFFF;
    }

    .btn-color:hover {
        background-color: #56435B;
        /* Green */
        color: white;
    }

    p {
        text-align: center;
    }

    h1 {
        text-align: center;
    }

    h2 {
        text-align: center;
    }

    .alignit {
        text-align: center;
    }


</style>
<!-- NAVBAR -->
<nav class="navbar navbar-dark sticky-top" style="background-color: #055959;"></nav>
<!-- CONTENT -->
<div class="container">    
    <h2>Willkommen <?php if (isset($_SESSION['user'])) {
                    echo $_SESSION['user'];
                } ?> bei Plan-ts</h2>
    
    <div class="row">
        <div id="content" class="col-md-12">
            <p>
                Melde dich and oder Registriere dich um unsere App nutzen zu können!
            </p>           
    
        </div>
    </div>
    <div class="row">
        <div class="container">
            <div id="login" class="col-md-12">
                <?php
                if (isset($_SESSION['user'])) {
                    echo '<form method="post" action="./utility/LoginAPI.php">';
                    echo '<button type="submit" name="logout" id="logout" class="btn btn-color" style="float: right">Logout</button>';
                    echo '</form>';
                } else {
                    include "loginForm.php";
                    $tmp = '"registrieren"';
                    echo "<div class='container alignit'><button class='btn btn-color' onclick='showcontents($tmp)'>Registrieren</button></div>";
                }
                ?>

            </div>
        </div>
    </div>
</div>