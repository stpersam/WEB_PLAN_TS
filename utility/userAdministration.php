<?php
include "DB.php";
session_start();
$db = new DB();

if($_GET["do"] == "del"){
    if(isset($_GET["id"])) {
        $db->connect("users");
        $db->deleteUser($_GET["id"]);
    }
    header("Location: ../index_old.php?use=log");
    die();
}