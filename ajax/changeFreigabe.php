<?php
include "../utility/DB.php";
session_start();


$db = new DB();
$db->connect("pictures");
$id = $_POST["id"];
$status = $db->getPictureState($id);
$owner = $db->getOwner($id);
if (isset($_SESSION['users']['Username'])) {
    $currentuser = $_SESSION['users']['Username'];
    if ($currentuser == $owner || $currentuser == "admin") {
        if ($status == "freigegeben") {
            $db->changePictureState($id, "gesperrt");
            echo "gesperrt";
        } else if ($status == "gesperrt") {
            $db->changePictureState($id, "freigegeben");
            echo "freigegeben";
        }
    }else{
        echo $status;
    }
}else{
    echo $status;
}


