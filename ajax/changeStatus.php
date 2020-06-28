<?php
include "DB.php";

$db = new DB();
$db->connect("users");
$username = $db->getUsername($_POST["id"]);
$status = $db->getStatus($username);

if($status == "aktive"){
    $db->changeStatus($_POST["id"],"inaktive");
    echo "inaktive";
}else if($status == "inaktive"){
    $db->changeStatus($_POST["id"],"aktive");
    echo "aktive";
}
