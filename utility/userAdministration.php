<?php
include "DB.php";
session_start();
$db = new DB();

// deletes the user if the admin clicks on the delete user button
if($_GET["do"] == "del"){
    if(isset($_GET["id"])) {
        $db->connect("users");
        $db->deleteUser($_GET["id"]);
    }
    header("Location: ../index.php");
    die();
}