<?php
include "DB.php";
$db = new DB();

if($_GET["do"] == "del"){
    if(isset($_GET["id"])) {
        $db->connect("users");
        $db->deleteUser($_GET["id"]);
    }
    header("Location: ../index.php?use=log");
    die();
}