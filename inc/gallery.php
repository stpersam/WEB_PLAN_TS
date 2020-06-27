<!DOCTYPE html>
<html>

<head>
    <script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script>
</head>

<body>

    <div class="container">
        <header class="page-header">
            <h1>Gallery</h1>
        </header>
        <div class="row">
            <div class="col-md-3">
                <nav>
                    <form method="POST" action="index.php?use=gallery&search=true">
                        <p>Filter by searchtag:</p>
                        <input type="text" name="searchtag"></input>
                        <input class="btn" type="submit" name="show" value="Show">

                    </form>

                    <form method="POST" action="index.php?use=gallery&search=true">
                        <p>My pictures:</p>
                        <input type="text" name="user" value="<?php echo $currentuser; ?>" hidden>
                        <input class="btn" type="submit" name="show" value="Show">
                    </form>

                    <form method="POST" action="index.php?use=gallery&search=true">
                        <p>My published pictures:</p>
                        <input type="text" name="userstate" value="<?php echo $currentuser; ?>" hidden>
                        <input class="btn" type="submit" name="show" value="Show">
                    </form>
                    <form method="POST" action="index.php?use=gallery&search=true">
                        <p>All published pictures:</p>
                        <input type="text" name="state" value="freigegeben" hidden>
                        <input class="btn" type="submit" name="show" value="Show">
                    </form>
                    <br></br>
                </nav>
            </div>
            <div class="col-md-9">
                <main id="content">
                    <?php
                    if (!empty($_GET['search'])) {
                        include("inc/showpictures.php");
                    }
                    ?>
                </main>
            </div>
        </div>

    </div>

    <div class="container">
        <header class="page-header">
            <h1>View on Google Maps</h1>
        </header>
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