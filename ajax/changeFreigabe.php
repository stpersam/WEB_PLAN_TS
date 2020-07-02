<?php
include "../utility/DB.php";

$db = new DB();
$db->connect("pictures");
$name = $_POST["name"];
$status = $db->getPictureState($name);

if($status == "freigegeben"){
    $db->changePictureState($name,"gesperrt");
    echo "gesperrt";
}else if($status == "gesperrt"){
    $db->changeStatus($name,"freigegeben");
    echo "freigegeben";
}
