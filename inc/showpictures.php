<link rel="stylesheet" href="res/assets/css/main.css" />
<?php
session_start();
include "../model/picture.php";
include "../utility/DB.php";

//connect to db/pictures
$gettable = new DB();
$gettable->connect("pictures");

//initiate state locally
if (isset($_GET["state"]))
    $state = $_GET["state"];
else {
    $state = "%";
}
if (isset($_GET["sort"])) {
    $picsort = $_GET["sort"];
} else {
    $picsort = "createdate";
}


global $array;
$array = array();

if (isset($_GET["searchtag"]) && !empty($_GET["searchtag"])) {
    $searchtag = $_GET["searchtag"];
    $a = $gettable->getPictureArray($searchtag, $searchtag, $searchtag, $state, $searchtag);
} else if (isset($_GET["user"])) {
    $userfilter = $_GET["user"];
    $a = $gettable->getrestrictedPictureArray($state, $userfilter);
} else {
    $a = $gettable->getPictureArrayAll($state);
}

foreach ($a as $ab){
    array_push($GLOBALS['array'],$ab);
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

function picsorter($picsort) {
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
    //header("Refresh:0");
}
?>

<!--
<header class="page-header">
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark justify-content-center sticky-top">
        <div class="">
            <ul class="navbar-nav">
                <li class="nav-item dropdown"><a class="nav-link dropdown-toggle" data-toggle="dropdown" onclick="sort()">Sort</a>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" onclick="picsorter('createdate')">by Create Date</a>
                        <a class="dropdown-item" onclick="picsorter('changedate')" href="">by Change Date</a>
                        <a class="dropdown-item" onclick="picsorter('createdate')" href="">by else</a>
                    </div>
                </li>
            </ul>
        </div>
    </nav>
</header>
-->
<?php
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
    echo "</p>";

    $owner = $ab->getOwner();
    $capturedate = $ab->getCapturedate();
    $changedate = $ab->getChangedate();
    $latitude = $ab->getLatitude();
    $longitude = $ab->getLongitude();
    $newvar = '"' . $href . '"';
    $pname = '"' . $name . '"';
    $db = new DB();
    $db->connect("pictures");
    $id = $db->getPictureID($name);

    echo "<button class='btn btn-outline-dark btn-sm' onclick='MoreInfo($newvar)'>more..</button>";
    echo "<div id='$href' style='display: none'>";
    echo "<p>Creator: $owner</p>";
    echo "<p>Created: $capturedate</p>";
    echo "<p>Changed: $changedate</p>";
    echo "<p>Latitude: $latitude</p>";
    echo "<p>Longitude: $longitude</p>";
    echo "<button class='btn btn-color' id='ab-$id' onclick='showState($id)'>$state</button><p></p>";
    echo "<button class='btn btn-color'><a href='./utility/modifyPictures.php?do=del&name=$name'>Delete</a></button>";
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

    function showState(id) {
        $.post("./ajax/changeFreigabe.php", {
                id: id,
            },
            function(data) {
                $('#ab-'+id).html(data)
            });
    }
</script>

<!-- Google Maps -->
<div>
    <header class="page-header">
        <br>
        <br>
        <div class="row justify-content-between">
            <h1>View on Google Maps</h1>
            <a onclick="CollapseMaps()"><button class="btn-color btn-sm">toggle</button></a>
        </div>
    </header>
    <br>
    <div id="googlemaps" style="display: block">
        <div class="cold-md-12" id="map" style="width: 100%; height: 450px"></div>
    </div>
</div>

<script type="text/javascript">
    // sets the attributes for th map like where and how much it will be zoomed in
    var myOptions = {
        zoom: 8,
        center: new google.maps.LatLng(48.20, 16.36),
        mapTypeId: google.maps.MapTypeId.ROADMAP
    };

    //crates the map with the obptions set and displays it at the div with the id map
    var map = new google.maps.Map(document.getElementById("map"), myOptions);

    // Toggle Map
    function CollapseMaps() {
        var x = document.getElementById("googlemaps");
        if (x.style.display === "none" || x.style.display === "") {
            x.style.display = "block";
        } else {
            x.style.display = "none";
        }
    }

    // fetches the array of pictures the user displays at the moment
    var passedArray = <?php echo json_encode($array); ?>;
    if(passedArray !== null)
        arrayMarker(passedArray);

    //fetches all individual items aut of the array and calls the initMarker() functione
    function arrayMarker(array){
        for(var i = 0; i < array.length; i++){
            lat = parseFloat(array[i]['latitude']);
            lng = parseFloat(array[i]['longitude']);
            text = array[i]['name'];
            href = "./pictures/thumbnail/"
            href += array[i]['href'];

            initMarkers(lat,lng,text,href);
        }
    }
    // initialise Markers with position name and picture
    function initMarkers(latitude,longitude,text,href) {
        var myLatLng = {lat:latitude, lng:longitude};
        setMarkers(myLatLng,text,href)
    }

    // set marker and displays it on the map
    function setMarkers(myLatLng,text,url) {
        var contentString = '<img src="'+url+'">';

        var infowindow = new google.maps.InfoWindow({
            content: contentString
        });

        var marker = new google.maps.Marker({
            position: myLatLng,
            map: map,
            title: text
        });

        marker.addListener('click', function () {
            infowindow.open(map, marker);
        });
    }
</script>
</div>