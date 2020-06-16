<?php
include "DB.php";
$isLoggedIn = false;
$name = "Not set";

if(isset($_COOKIE["cookieLIn"])){
    $isLoggedIn = true;
    $name = $_COOKIE["cookieLIn"];
}

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    if(filter_has_var(INPUT_POST, "logout")){
        echo "Sucessfully logged out";
        $isLoggedIn = false;

        if(isset($_COOKIE[session_name()])){
            setcookie(session_name(),"",time-3600,"");
            $_SESSION = array();
            session_destroy();
        }
        setcookie("cookieLIn","",time()-100);
    }else{
            $db = new DB();
        if($db->countUser(filter_input(INPUT_POST,"username")) != 0 && $db->getPassword(filter_input(INPUT_POST,"username")) == $_POST["password"]){
            $isLoggedIn = true;
            $name = filter_input(INPUT_POST,"username");
        }else{
            echo "<h3>Wrong!</h3>";
            $isLoggedIn = false;
        }
    }
}

if ($isLoggedIn){
    ?>
    <form method="post" action="../index.php">
        <button type="submit" name="Logout" id="logout" class="btn btn-outline-secondary btn-secondary" style="float: right">LogOut</button>
    </form>
    <?php
    echo "Willkommen ".$name."<br><br>";
    $_SESSION["isLoggedIn"] = $isLoggedIn;

    if(filter_has_var(INPUT_POST, "stayLoggedIn")){
        setcookie("cookieLIn", filter_input(INPUT_POST,"username"),time()+600);
    }
}else{
    include 'login.php';
}