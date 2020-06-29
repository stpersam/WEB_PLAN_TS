<?php
include "../model/picture.php";
include "../utility/DB.php";


//connect to db/pictures
$gettable = new DB();
$gettable->connect("pictures");
$state = "freigegeben";



if (isset($_GET["searchtag"]) && !empty($_GET["searchtag"])) {
    $searchtag = $_GET["searchtag"];
    $a = $gettable->getPictureArray($searchtag, $searchtag, $searchtag, $state, $searchtag);
} else if (isset($_GET["user"]) || isset($_GET["userstate"])) {
    if (isset($_GET["user"]) && !empty($_GET["user"])) {
        $state = "%";
        $userfilter = $_GET["user"];
       
    } else if (isset($_GET["userstate"]) && !empty($_GET["userstate"])) {
        $userfilter = $_GET["userstate"];
    }
    echo $userfilter;
    $a = $gettable->getrestrictedPictureArray($state, $userfilter);
} else if (isset($_GET["state"])) {
    $a = $gettable->getPictureArrayAll($_GET["state"]);
} else {
    $a = $gettable->getPictureArrayAll($state);
}

function sortbycreatedate($p1, $p2)
{
    if ($p1->getCapturedate() == $p2->getCapturedate()) {
        return 0;
    }
    return ($p1->getCapturedate() > $p2->getCapturedate()) ? +1 : -1;
}
function sortbychangedate($p1, $p2)
{
    if ($p1->getChangedate() == $p2->getChangedate()) {
        return 0;
    }
    return ($p1->getChangedate() > $p2->getChangedate()) ? +1 : -1;
}

if (isset($_GET["picsort"])){
    $picsort = $_GET["picsort"]; 
}
else 
$picsort = "";



switch ($picsort) {
    case "createdate":
        usort($a, "sortbycreatedate");
        break;
    case "changedate":
        usort($a, "sortbychangedate");
        break;
    default:
        usort($a, "sortbycreatedate");
}



echo "<div class='row'>";

//loop to show fancybox pictures with

foreach ($a as $ab) {
    $href = $ab->getHref();
    echo "<div class='col-md-3'>";
    echo "<a href='pictures/full/$href' data-fancybox='mygallery'><img src='pictures/thumbnail/$href' class='imgs'></img></a>";

    $name = $ab->getName();
    $state = $ab->getState();
    echo "<p>";
    echo "$name";
    echo " ($state)";
    echo "</p>";

    $owner = $ab->getOwner();
    $capturedate = $ab->getCapturedate();
    $changedate = $ab->getChangedate();
    $latitude = $ab->getLatitude();
    $longitude = $ab->getLongitude();
    $newvar = '"' . $href . '"';
    echo "<button class='btn btn-outline-dark btn-sm' onclick='MoreInfo($newvar)'>more..</button>";
    echo "<div id='$href' style='display: none'>";
    echo "<p>Creator: $owner</p>";
    echo "<p>Created: $capturedate</p>";
    echo "<p>Changed: $changedate</p>";
    echo "<p>Latitude: $latitude</p>";
    echo "<p>Longitude: $longitude</p>";
    echo "<a href='' id='deletepic'>delete</a>";
    echo "</div>";

    echo "</div>";
}
echo "</div>";

?>

<script>
    function MoreInfo(id) {
        var x = document.getElementById(id);
        if (x.style.display === "none") {
            x.style.display = "block";
        } else {
            x.style.display = "none";
        }
    }

    window.onload = function() {
        var a = document.getElementById("deletepic");
        a.onclick = function() {
            //todo function that deletes picture from DB (if picture.owner == currentuser) 

        }
    }
</script>