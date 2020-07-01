<!DOCTYPE html>
<link rel="stylesheet" href="res/assets/css/main.css" />
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
                                <a class="dropdown-item" onclick="showgallerycontent('showmypictures', '<?php echo $currentuser; ?>')" href="#">My Pictures</a>
                                <a class="dropdown-item" onclick="showgallerycontent('showmypublishedpictures', '<?php echo $currentuser; ?>')" href="#">My published Pictures</a>
                                <a class="dropdown-item" onclick="showgallerycontent('showallpublishedpictures', '<?php echo $currentuser; ?>')" href="#">All published pictures</a>
                            </div>
                        </li>
                        <li class="nav-item dropdown"><a class="nav-link dropdown-toggle" data-toggle="dropdown" href="" onclick="sort()">Sort</a>
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
            <script>
                function showHint(str) {
                    var xhttp;
                    if (str.length == 0) {
                        document.getElementById("includegallerycontent").innerHTML = "";
                        return;
                    }
                    xhttp = new XMLHttpRequest();
                    xhttp.onreadystatechange = function() {
                        if (this.readyState == 4 && this.status == 200) {
                            var path = "./pictures/full/" + this.responseText;
                            var text = "<img src='"+path+"'>";
                            document.getElementById("includegallerycontent").innerHTML = text;
                        }
                    };
                    xhttp.open("GET", "./utility/gethint.php?q="+str, true);
                    xhttp.send();
                }
            </script>

            <form action="">
                Search Name: <input type="text" id="txt1" onkeyup="showHint(this.value)">
            </form>
            <!-- Content -->
            <section id="gallerycontent">
                <body>
                    <div id="includegallerycontent">

                    </div>
                </body>
            </section>
            <br>
        </div>
    </div>
</body>

</html>