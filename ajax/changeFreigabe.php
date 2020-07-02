<?php
include "../utility/DB.php";
session_start();

if (isset($_SESSION['users']['Username'])) {
    $currentuser = $_SESSION['users']['Username'];
} else {
    $currentuser = "";
}

$db = new DB();
$db->connect("pictures");
$name = $_POST["pname"];
$status = $db->getPictureState($name);
$owner = $db->getOwner($name);

if ($currentuser == $owner) {
    if ($status == "freigegeben") {
        $db->changePictureState($name, "gesperrt");
        echo "gesperrt";
    } else if ($status == "gesperrt") {
        $db->changePictureState($name, "freigegeben");
        echo "freigegeben";
    }
}

