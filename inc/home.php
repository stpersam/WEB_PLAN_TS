<script type="text/javascript" src="./utility/showcontents.js"></script>
<link rel="stylesheet" href="res/assets/css/main.css" />
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
</style>
<div class="container">
    <h1>Welcome to our Picture Cloud</h1>
    <div class="row">
        <div id="content" class="col-md-10">
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
        <div id="login" class="col-md-2">
            <?php
            session_start();
            if (isset($_SESSION['users']['Username'])) {
                echo "<h3>Welcome " . $_SESSION['users']['Username'] . "</h3>";
                echo '<form method="post" action="utility/login.php">';
                echo '<button type="submit" name="logout" id="logout" class="btn btn-color" style="float: right">Logout</button>';
                echo '</form>';
            } else {
                include "loginForm.php";
                $tmp = '"registrieren"';
                echo "<button class='btn btn-color' onclick='showcontents($tmp)'>Registrieren</button>";
            }
            ?>
        </div>
    </div>
</div>