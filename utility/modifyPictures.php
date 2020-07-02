<?php
include "DB.php";
session_start();
$db = new DB();

if($_GET["do"] == "del"){
    if(isset($_GET["name"])) {
        $owner = $db->getOwner($_GET["name"]);
        if($_SESSION['users']['Username'] == $owner) {
            $db->connect("pictures");
            $href = $db->getHref($_GET["name"]);
            $db->deletePicture($_GET["name"]);
            $href = "../pictures/full/".$href;
            unlink($href);
        }
    }
    header("Location: ../index.php");
    die();
}