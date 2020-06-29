<?php

//connect to db/pictures
$gettable = new DB();
$gettable->connect("pictures");
$state = "freigegeben";

if (isset($_POST["searchtag"]) && !empty($_POST["searchtag"])) {
    $searchtag = $_POST["searchtag"];
    $a = $gettable->getPictureArray($searchtag, $searchtag, $searchtag, $state, $searchtag);
} else if (isset($_POST["user"]) || isset($_POST["userstate"])) {
    if (isset($_POST["user"]) && !empty($_POST["user"])) {
        $state = "%";
        $userfilter = $_POST["user"];
    } else if (isset($_POST["userstate"]) && !empty($_POST["userstate"])) {
        $userfilter = $_POST["userstate"];
    }
    $a = $gettable->getrestrictedPictureArray($state, $userfilter);
} else if (isset($_POST["state"])) {
    $a = $gettable->getPictureArrayAll($_POST["state"]);
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


switch ($_POST["picsort"]) {
    case "createdate":
        usort($a, "sortbycreatedate");
        break;
    case "changedate":
        usort($a, "sortbychangedate");
        break;
    default:
        usort($a, "sortbycreatedate");
}




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