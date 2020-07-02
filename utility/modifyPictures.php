<?php
include "DB.php";
session_start();
$db = new DB();

if($_GET["do"] == "del"){
    if(isset($_GET["name"])) {
        $owner = $db->getOwner($_GET["name"]);
        if($_SESSION['users']['Username'] == $owner) {
            $db->connect("pictures");
            $db->deletePicture($_GET["name"]);
        }
    }
    header("Location: ../index.php");
    die();
}