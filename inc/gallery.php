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

    </script>


    <?php
    function getarrayofpictures($user, $state, $searchtag, $sort)
    {
        //connect to db/pictures
        $gettable = new DB();
        $gettable->connect("pictures");

        if (isset($searchtag) && !empty($searchtag)) {
            $searchtag = $searchtag;
            $a = $gettable->getPictureArray($searchtag, $searchtag, $searchtag, $state, $searchtag);
        } else if (isset($user)) {
            $userfilter = $user;
            $a = $gettable->getrestrictedPictureArray($state, $userfilter);
        } else {
            $a = $gettable->getPictureArrayAll($state);
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
                                <a class="dropdown-item" onclick="arraygetset('<?php echo $currentuser; ?>', '%', '', '')" href="#">My Pictures</a>
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
                    <div><?php var_dump(getarrayofpictures($currentuser, '%', '', '')); ?></div>
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

                var contentString = '<div id="content">'+
                    '<div id="siteNotice">'+
                    '</div>'+
                    '<h1 id="firstHeading" class="firstHeading">Uluru</h1>'+
                    '<div id="bodyContent">'+
                    '<p><b>Uluru</b>, also referred to as <b>Ayers Rock</b>, is a large ' +
                    'sandstone rock formation in the southern part of the '+
                    'Northern Territory, central Australia. It lies 335&#160;km (208&#160;mi) '+
                    'south west of the nearest large town, Alice Springs; 450&#160;km '+
                    '(280&#160;mi) by road. Kata Tjuta and Uluru are the two major '+
                    'features of the Uluru - Kata Tjuta National Park. Uluru is '+
                    'sacred to the Pitjantjatjara and Yankunytjatjara, the '+
                    'Aboriginal people of the area. It has many springs, waterholes, '+
                    'rock caves and ancient paintings. Uluru is listed as a World '+
                    'Heritage Site.</p>'+
                    '<p>Attribution: Uluru, <a href="https://en.wikipedia.org/w/index.php?title=Uluru&oldid=297882194">'+
                    'https://en.wikipedia.org/w/index.php?title=Uluru</a> '+
                    '(last visited June 22, 2009).</p>'+
                    '</div>'+
                    '</div>';

                var infowindow = new google.maps.InfoWindow({
                    content: contentString
                });

                // Marker erstellen mit position un Text
                var myLatLng = {lat: 48.20, lng: 16.36};
                var myLatLng2 = {lat: 48.50, lng: 16.50};
                setMarkers(myLatLng,"Marker",'https://developers.google.com/maps/documentation/javascript/examples/full/images/beachflag.png');
                setMarkers(myLatLng2,"Marker2",'https://developers.google.com/maps/documentation/javascript/examples/full/images/beachflag.png');

                // set marker
                function setMarkers(myLatLng,text,url) {

                    var image = {
                        url: url,
                        size: new google.maps.Size(20, 32),
                        origin: new google.maps.Point(0, 0),
                        anchor: new google.maps.Point(0, 32)
                    };

                    var shape = {
                        coords: [1, 1, 1, 20, 18, 20, 18, 1],
                        type: 'poly'
                    };

                    var marker = new google.maps.Marker({
                        position: myLatLng,
                        map: map,
                        icon: image,
                        shape: shape,
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