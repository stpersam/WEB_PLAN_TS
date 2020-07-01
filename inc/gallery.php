<!DOCTYPE html>
<?php session_start();

include "../model/picture.php";
include "../utility/DB.php";

if (isset($_SESSION['users']['Username'])) {
    $currentuser = $_SESSION['users']['Username'];
} else {
    $currentuser = "";
}
?>
<html>

<head>
    <script type="text/javascript" src="./utility/showcontents.js"></script>
    <script type="text/javascript" src="./utility/showgallerycontent.js"></script>
    <script type="text/javascript">
        window.x = null;
        $(document).ready(function() {
            $("#includegallerycontent").load("inc/showpictures.php");
        });

        function showarray($user,$sort){
            var user = $user;
            var sort = $sort;
            $("#includegallerycontent").load("inc/showpictures.php?user=" + user + "&sort=" + sort);
            <?php getarrayofpictures($currentuser,'', '%','', '');?>
        }
    </script>


    <?php
    global $array;
    $array = array();
    function getarrayofpictures($user, $state, $searchtag, $sort)
    {
        //connect to db/pictures
        $gettable = new DB();
        $gettable->connect("pictures");

        if (isset($searchtag) && !empty($searchtag)) {
            $searchtag = $searchtag;
            $a = $gettable->getPictureArray($searchtag, $searchtag, $searchtag, $state, $searchtag);
        } else if (isset($user) && !empty($user)) {
            $userfilter = $user;
            $a = $gettable->getrestrictedPictureArray($state, $userfilter);
        } else {
            $a = $gettable->getPictureArrayAll($state);
        }
        foreach ($a as $ab){
            array_push($GLOBALS['array'],$ab);
        }
        return $a;
    }
    ?>
</head>
<body>
    <div>
        <header class="page-header">
            <nav class="navbar navbar-expand-lg navbar-dark bg-dark justify-content-center sticky-top">
                <a class="navbar-brand" href="" onclick="showcontents('gallery')">Gallery</a>
                <div class="">
                    <ul class="navbar-nav">
                        <li class="nav-item dropdown"><a class="nav-link dropdown-toggle" data-toggle="dropdown" href="">Show Pictures</a>
                            <div class="dropdown-menu">
                                <a class="dropdown-item" onclick="showarray('<?php echo $currentuser; ?>')" href="#">My Pictures</a>
                                <a class="dropdown-item" onclick="showgallerycontent('showmypictures', '<?php echo $currentuser; ?>')" href="#">My Pictures</a>
                                <a class="dropdown-item" onclick="showgallerycontent('showmypublishedpictures', '<?php echo $currentuser; ?>')" href="#">My published Pictures</a>
                                <a class="dropdown-item" onclick="showgallerycontent('showallpublishedpictures', '<?php echo $currentuser; ?>')" href="#">All published pictures</a>
                            </div>
                        </li>
                        <li class="nav-item dropdown"><a class="nav-link dropdown-toggle" data-toggle="dropdown" onclick="sort()">Sort</a>
                            <div class="dropdown-menu">
                                <a class="dropdown-item" onclick="show()" href="#">by Create Date</a>
                                <a class="dropdown-item" href="#">by Change Date</a>
                                <a class="dropdown-item" href="#">by else</a>
                            </div>
                        </li>
                        <li class="nav-item"><a class="nav-link" onclick="showgallerycontent('pictureupload')">Upload</a></li>
                    </ul>
                </div>
            </nav>
        </header>

        <div class="container">

            <!-- Content -->
            <section id="gallerycontent">

                <body>
                    <div id="includegallerycontent">
    

                    </div>
                </body>
            </section>

            <br></br>

            <!-- Google Maps -->
            <div>
                <header class="page-header">
                    <div class="row justify-content-between">
                        <h1>View on Google Maps</h1>
                        <a onclick="CollapseMaps()"><button class="btn-outline-dark">toggle</button></a>
                    </div>
                </header>
                <br>
                <div id="googlemaps" style="display: block">
                    <div class="cold-md-12" id="map" style="width: 100%; height: 450px"></div>
                </div>
            </div>



            <script type="text/javascript">
                var myOptions = {
                    zoom: 8,
                    center: new google.maps.LatLng(48.20, 16.36),
                    mapTypeId: google.maps.MapTypeId.ROADMAP
                };

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

                var passedArray = <?php echo json_encode($array); ?>;
                if(passedArray !== null)
                    arrayMarker(passedArray);

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
               // initMarkers(48.20,16.36,"Marker",'./pictures/thumbnail/test.png')

                // Marker erstellen mit position, Text und Bild;
                function initMarkers(latitude,longitude,text,href) {
                    var myLatLng = {lat:latitude, lng:longitude};
                    setMarkers(myLatLng,text,href)
                }

                // set marker
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
    </div>
</body>

</html>