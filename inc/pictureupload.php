<!DOCTYPE html>
<meta charset="utf-8">
<html>

<head>
    <link rel="stylesheet" href="../res/assets/css/main.css" />
    <style>
        .alignit {
            text-align: center;
        }
    </style>
</head>

<body>
    <div class="container alignit dropzone">
        <h5>Upload new file:</h5>
        <form action="inc/pictureupload.php" method="POST" enctype="multipart/form-data">
            <input type="file" name="myfile" id="myfile" accept="image/*">
            <br>
            <input type="submit" class="btn btn-color" name="submitfile">
        </form>
        <a href="./dropzone.php"><button class="btn-color">to drag and drop area</button></a>
    </div>

    <?php
    if (isset($_FILES['myfile']['type']) || !empty($_FILES)) {
        session_start();
        include "../model/picture.php";
        include "../utility/DB.php";

        //connect to db/pictures
        $gettable = new DB();
        $gettable->connect("pictures");

        ////fileupload
        if (isset($_FILES['myfile']['type'])) {
            $tmpfile = $_FILES['myfile']['type'];
            echo "normal";
        } elseif (!empty($_FILES)) {

            $tmpfile = $_FILES['file']['tmp_name'];
            echo "dropzone";
        }

        if ($tmpfile != "image/png" && $tmpfile != "image/jpeg" && $tmpfile != "image/gif") {
            die("Not a gif/jpeg/png");
        } else {
            $tempDateiName = $_FILES["myfile"]["tmp_name"];
            $originalName = $_FILES["myfile"]["name"];
            $eineId = substr(uniqid(), 0, 4);


            $dateiPfad = substr($originalName, 0, -4) . "_" . $eineId . substr($originalName, -4);
            $dateiPfadFull = "../pictures/full/" . $dateiPfad;
            $dateiPfadthumbnail = "../pictures/thumbnail/" . $dateiPfad;

            ///Thumbnail
            // Get new sizes 
            list($width, $height) = getimagesize($tempDateiName);
            $newwidth = 200;
            $newheight = $height /  ($width / 200);
            // Load
            $thumb = imagecreatetruecolor($newwidth, $newheight);
            $source = imagecreatefromjpeg($tempDateiName);

            // Resize
            imagecopyresized($thumb, $source, 0, 0, 0, 0, $newwidth, $newheight, $width, $height);
            ///

            //save both files to fileserver/locally
            if (move_uploaded_file($tempDateiName, $dateiPfadFull)) {
                imagejpeg($thumb, $dateiPfadthumbnail);
                ////create DB object
                $gettable->createpicture($originalName, 48, 16, "-", date("Y-m-d"), "gesperrt", $dateiPfad, $eineId . "," . $originalName, $_SESSION['users']['Username']);
            }
        }
        header("Location: ../index.php");
    }

    ?>
</body>

</html>