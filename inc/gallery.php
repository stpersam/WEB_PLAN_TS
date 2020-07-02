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

global $a;
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

        function sortarray(state) {
            if(state == "create") {
                <?php $a = "createdate"?>
            }else if(state == "change"){
                <?php $a = "changedate"?>
            }
        }
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
                                <a class="dropdown-item" onclick="showgallerycontent('showmypictures', '<?php echo $currentuser; ?>','<?php echo $a;?>')" href="#">My Pictures</a>
                                <a class="dropdown-item" onclick="showgallerycontent('showmypublishedpictures', '<?php echo $currentuser; ?>','<?php echo $a;?>')" href="#">My published Pictures</a>
                                <a class="dropdown-item" onclick="showgallerycontent('showallpublishedpictures', '<?php echo $currentuser; ?>','<?php echo $a;?>')" href="#">All published pictures</a>
                            </div>
                        </li>
                        <li class="nav-item dropdown"><a class="nav-link dropdown-toggle" data-toggle="dropdown" href="" onclick="sort()">Sort</a>
                            <div class="dropdown-menu">
                                <a class="dropdown-item" onclick="sortarray('create')" href="#">by Create Date</a>
                                <a class="dropdown-item" onclick="sortarray('change')" href="#">by Change Date</a>
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
                    <br><br>
                    <form action="">
                        <label id="txt2">Search Name:</label> <input type="text" id="txt1" onkeyup="showHint(this.value)">
                    </form>
                    <br>
                    <div id="includegallerycontent"></div>
                </body>
            </section>
            <br>
        </div>
    </div>
</body>

</html>