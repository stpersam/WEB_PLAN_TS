<?php
include "DB.php";
include "../model/picture.php";
// get the q parameter from URL
$q = $_REQUEST["q"];
$db = new DB();
$db->connect("pictures");
$a = $db->getTags($q);

$hint = "";

// lookup all hints from array if $q is different from ""
if ($q !== "") {
    $q = strtolower($q);
    $len=strlen($q);
    foreach($a as $name) {
        if (stristr($q, substr($name->getName(), 0, $len))) {
            if ($hint === "") {
                $hint = $name->getHref();
                echo $hint;
                die();
            } else {
                $hint .= ", $name";
            }
        }
    }
}
// returns the searched hint if nothing found, no suggestion will be displayed
$hint ="no suggestion";
echo $hint ;
?>