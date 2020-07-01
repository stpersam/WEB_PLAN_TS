<!DOCTYPE html>
<?php session_start();
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
        $(document).ready(function() {
            $("#includegallerycontent").load("inc/showpictures.php");
        });
    </script>

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
                                <a class="dropdown-item" onclick="showgallerycontent('showmypicture', '<?php echo $currentuser; ?>')" href="#">My Pictures</a>
                                <a class="dropdown-item" href="#">My published Pictures</a>
                                <a class="dropdown-item" href="#">All published pictures</a>
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


            <!--
            <div class="row justify-content-between">
                <div class="col-md-6">
                    <div class="row">
                        <div class="dropdown">
                            <button class="btn btn-light dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Show Pictures:
                            </button>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">

                                <form method="POST" action="index.php?use=gallery">
                                    <input type="text" name="user" value="<?php echo $currentuser; ?>" hidden>
                                    <input class="btn btn-link " type="submit" name="show" value="My pictures">
                                </form>

                                <form method="POST" action="index.php?use=gallery">
                                    <input type="text" name="userstate" value="<?php echo $currentuser; ?>" hidden>
                                    <input class="btn btn-link" type="submit" name="show" value="My published pictures">
                                </form>

                                <form method="POST" action="index.php?use=gallery">
                                    <input type="text" name="state" value="freigegeben" hidden>
                                    <input class="btn btn-link" type="submit" name="show" value="All published pictures">
                                </form>

                            </div>
                        </div>
 -->


            <!-- TBD with ajax -> use usort() in showpictures with picsort POST value determening which sort -->

            <!--
                        <div class="dropdown">
                            <button class="btn btn-light dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Sort by:
                            </button>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                <form method="POST" action="index.php?use=gallery">
                                    <input type="text" name="picsort" value="createdate" hidden>
                                    <input class="btn btn-link" type="submit" name="sort" value="Date: created">
                                </form>

                                <form method="POST" action="index.php?use=gallery">
                                    <input type="text" name="picsort" value="changedate" hidden>
                                    <input class="btn btn-link" type="submit" name="sort" value="Date: changed">
                                </form>
                                Default: (date created)
                            </div>
                        </div>
                    </div>
                </div>
                <div class="d-flex flex-row-reverse  col-md-6">
                    <form method="POST" action="index.php?use=gallery">
                        <input type="text" name="searchtag" placeholder="Searchterm.."></input>
                        <input class="btn btn-secondary" type="submit" name="show" value="Search">

                    </form>
                </div>
            </div>
-->


            <br></br>

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


                function CollapseMaps() {
                    var x = document.getElementById("googlemaps");
                    if (x.style.display === "none" || x.style.display === "") {
                        x.style.display = "block";
                    } else {
                        x.style.display = "none";
                    }
                }
            </script>
        </div>
    </div>
</body>

</html>