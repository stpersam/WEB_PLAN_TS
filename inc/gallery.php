<!DOCTYPE html>
<html>

<head>
    <script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script>
</head>

<body>

    <div class="">
        <header class="page-header">
            <h1>Gallery</h1>
            <div class="d-flex flex-row-reverse">
                <form method="POST" action="index.php?use=gallery">
                    <input type="text" name="searchtag" placeholder="Searchterm.."></input>
                    <input class="btn btn-secondary" type="submit" name="show" value="Search">

                </form>
            </div>
        </header>
        <div class="row">

            <div class="col-md-3">
                <h4>Show pictures:</h4>
                <br>
                <form method="POST" action="index.php?use=gallery">
                    <input type="text" name="user" value="<?php echo $currentuser; ?>" hidden>
                    <input class="btn btn-light" type="submit" name="show" value="My pictures">
                </form>
                <br>
                <form method="POST" action="index.php?use=gallery">
                    <input type="text" name="userstate" value="<?php echo $currentuser; ?>" hidden>
                    <input class="btn btn-light" type="submit" name="show" value="My published pictures">
                </form>
                <br>
                <form method="POST" action="index.php?use=gallery">
                    <input type="text" name="state" value="freigegeben" hidden>
                    <input class="btn btn-light" type="submit" name="show" value="All published pictures">
                </form>
                <br></br>

                <h4>Sort by:</h4>
                (date created)
                <!-- TBD with ajax -> use usort() in showpictures with picsort POST value determening which sort -->               
                <form method="POST" action="index.php?use=gallery">
                    <input type="text" name="picsort" value="createdate" hidden>
                    <input class="btn btn-light" type="submit" name="sort" value="Date: created">
                </form>
                <br>
                <form method="POST" action="index.php?use=gallery">
                    <input type="text" name="picsort" value="changedate" hidden>
                    <input class="btn btn-light" type="submit" name="sort" value="Date: changed">
                </form>
            </div>

            <div class="col-md-9">
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

        <div class="">
            <header class="page-header">
                <h1>View on Google Maps</h1>
            </header>
            <br>
            <div class="cold-md-12" id="map" style="width: 100%; height: 450px">

            </div>
        </div>
        <script type="text/javascript">
            var myOptions = {
                zoom: 8,
                center: new google.maps.LatLng(48.20, 16.36),
                mapTypeId: google.maps.MapTypeId.ROADMAP
            };

            var map = new google.maps.Map(document.getElementById("map"), myOptions);
        </script>


</body>

</html>