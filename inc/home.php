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
<nav class="navbar navbar-dark bg-dark sticky-top"></nav>
<!-- CONTENT -->
<div class="container">
    <h2>Welcome <?php if (isset($_SESSION['users']['Username'])) {
                    echo $_SESSION['users']['Username'];
                } ?> to our Picture Cloud</h2>
    <div class="row">
        <div id="content" class="col-md-12">
            <p>
                Lorem ipsum dolor sit amet, consectetur adipiscing elit,
                sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris
                nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in
                reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla
                pariatur. Excepteur sint occaecat cupidatat non proident, sunt in
                culpa qui officia deserunt mollit anim id est laborum.
            </p>
        </div>
    </div>
    <div class="row">
        <div class="container">
            <div id="login" class="col-md-12">
                <?php
                if (isset($_SESSION['users']['Username'])) {
                    echo '<form method="post" action="utility/login.php">';
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