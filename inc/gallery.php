<!DOCTYPE html>
<html>

<head>
    <script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script>
</head>

<body>

    <div class="">
        <header class="page-header">
            <h1>Gallery</h1>
        </header>
        <!-- TBD with ajax -> do fileupload -->
        <div class="row justify-content-between">
            <h5>Upload new file:</h5>
            <form action="index.php?use=gallery" method="POST" enctype="multipart/form-data">
                <input type="file" name="myfile">
                <input type="submit" name="submitfile">
            </form>
        </div>

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

                    <!-- TBD with ajax -> use usort() in showpictures with picsort POST value determening which sort -->
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



        <br></br>

        <div class="col-md-12">
            <main id="content">
                <div class="row">
                    <?php
                    include("inc/showpictures.php");
                    ?>
                </div>
            </main>
        </div>
    </div>

    <br></br>

    <div>
        <header class="page-header">    
            <div class="row justify-content-between">
            <h1>View on Google Maps</h1>
            <a onclick="CollapseMaps()"><button>toggle</button></a>
            </div>
        </header>
        <br>
        <div id="googlemaps" style="block">
        <div class="cold-md-12" id="map" style="width: 100%; height: 450px">
        </div>
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
            if (x.style.display === "none") {
                x.style.display = "block";
            } else {
                x.style.display = "none";
            }
        }
    </script>


</body>

</html>