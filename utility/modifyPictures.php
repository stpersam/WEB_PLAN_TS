<?php
include "DB.php";
session_start();
$db = new DB();

if($_GET["do"] == "del"){
    if(isset($_GET["name"])) {
        $owner = $db->getOwner($_GET["name"]);
        if($_SESSION['users']['Username'] == $owner || $_SESSION['users']['Username'] == "admin") {
            $db->connect("pictures");
            $href = $db->getHref($_GET["name"]);
            $db->deletePicture($_GET["name"]);
            $href = "../pictures/full/".$href;
            $href2 = "../pictures/thumbnail/".$href;
            unlink($href);
            unlink($href2);
        }
    }
    header("Location: ../index.php");
    die();
}