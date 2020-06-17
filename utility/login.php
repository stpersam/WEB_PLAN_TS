<?php
include "DB.php";


    if(isset($_COOKIE["cookieLIn"])){
        $isLoggedIn = true;
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


            if($db->countUser(filter_input(INPUT_POST,"username")) != 0){
                if($db->getPassword(filter_input(INPUT_POST,"username")) == $_SESSION["users"]["Password"] || $db->getPassword(filter_input(INPUT_POST,"username")) == filter_input(INPUT_POST,"password")){
                    $isLoggedIn = true;
                }else{
                    echo "<h3>Wrong Password!</h3>";
                    $isLoggedIn = false;
                }
            }else{
                echo "<h3>Wrong Username!</h3>";
                $isLoggedIn = false;
            }
        }
    }

