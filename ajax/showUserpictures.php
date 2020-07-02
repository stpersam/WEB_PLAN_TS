<?php
include "../utility/DB.php";
include "../model/picture.php";

$db = new DB();
$db->connect("users");
$username = $db->getUsername($_POST["id"]);
$pictures = $db->getrestrictedPictureArray("%",$username);


if(empty($pictures)){
    echo "No Pictures";
}else {
    foreach ($pictures as $ab) {
        $href = $ab->getHref();
        echo "<div class='col-md-3'>";
        echo "<a href='pictures/full/$href' data-fancybox='mygallery'><img src='pictures/thumbnail/$href' class='imgs'></img></a>";

        $name = $ab->getName();
        $state = $ab->getState();
        echo "<p>";
        echo "$name";
        echo "</p>";

        $owner = $ab->getOwner();
        $capturedate = $ab->getCapturedate();
        $changedate = $ab->getChangedate();
        $latitude = $ab->getLatitude();
        $longitude = $ab->getLongitude();
        $newvar = '"' . $href . '"';
        $pname = '"' . $name . '"';

        echo "<button class='btn btn-outline-dark btn-sm' onclick='MoreInfo($newvar)'>more..</button>";
        echo "<div id='$href' style='display: none'>";
        echo "<p>Creator: $owner</p>";
        echo "<p>Created: $capturedate</p>";
        echo "<p>Changed: $changedate</p>";
        echo "<p>Latitude: $latitude</p>";
        echo "<p>Longitude: $longitude</p>";
        echo "<button class='btn btn-color' id='st-$name' onclick='showState($pname)'>$state</button><p></p>";
        echo "<button class='btn btn-color'><a href='./utility/modifyPictures.php?do=del&name=$name'>Delete</a></button>";
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
    function showState(pname) {
        $.post("ajax/changeFreigabe.php", {
                pname: pname,
            },
            function(data) {
                $("#st-" + pname).html(data)
            });
    }
</script>