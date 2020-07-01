<div class="container-fluid">
    <h1>Welcome to our Picture Cloud</h1>
    <div class="row">
        <div id="content" class="col-md-2">
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
                if(isset($_SESSION['users']['Username'])){
                    echo "<h3>Welcome ".$_SESSION['users']['Username']."</h3>";
                    echo '<form method="post" action="utility/login.php">';
                    echo '<button type="submit" name="logout" id="logout" class="btn btn-primary" style="float: right">Logout</button>';
                    echo '</form>';
                }else{
                    include "loginForm.php";
                    $tmp = "registrieren";
                    echo "<button class='btn btn-primary' onclick='showreg()'>Registrieren</button>";
                }
            ?>
            <script type="text/javascript">
                function showreg() {
                    $("#includecontent").load("inc/registerForm.php");
                }
            </script>

        </div>
    </div>
</div>
