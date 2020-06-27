<?php



//connect to db/pictures
$gettable = new DB();
$gettable->connect("pictures");

//initate searchtag and get array of fitting SELECT
$searchtag = "XXXXXXXXXXXXXXXXXXXXXXXXXXXXXX";
$state = "XXXXXXXXXXXXXXXXXXXXXXXXXXXXXX";
$userfilter = "XXXXXXXXXXXXXXXXXXXXXXXXXXXXXX";


if (isset($_POST["searchtag"]) && !empty($_POST["searchtag"])) {
    $searchtag = $_POST["searchtag"];
}
if (isset($_POST["user"]) && !empty($_POST["user"])) {
    $userfilter = $_POST["user"];
}
if (isset($_POST["state"]) && !empty($_POST["state"])) {
    $state = "freigegeben";
}
if (isset($_POST["userstate"]) && !empty($_POST["userstate"])) {
    $userfilter = $_POST["userstate"];
    $state = "freigegeben";
}

if ($state != "XXXXXXXXXXXXXXXXXXXXXXXXXXXXXX" && $userfilter != "XXXXXXXXXXXXXXXXXXXXXXXXXXXXXX") {
    $a = $gettable->getrestrictedPictureArray($state, $userfilter);
} else {
    $a = $gettable->getPictureArray($searchtag, $searchtag, $searchtag, $state, $userfilter);
}

//loop to show fancybox pictures with
if ($searchtag != null || $userfilter != null || $state != null) {
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
        echo "<button class='btn btn-secondary' onclick='MoreInfo($newvar)'>more..</button>";
        echo "<div id='$href' style='display: none'>";
        echo "<p>Creator: $owner</p>";
        echo "<p>Created: $capturedate</p>";
        echo "<p>Changed: $changedate</p>";
        echo "<p>Latitude: $latitude</p>";
        echo "<p>Longitude: $longitude</p>";
        echo "</div>";
        
        echo "</div>";
    }
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
</script>
