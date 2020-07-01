<!DOCTYPE html>
<meta charset="utf-8">
<html>

<head>
    <link rel="stylesheet" href="res/assets/css/main.css" />

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
        <a href="testdropzone.html"><button class="btn-color">to drag and drop area</button></a>
    </div>


    <?php
    if (isset($_FILES['myfile']['type'])) {
        $tmpfile = $_FILES['myfile']['type'];

        if ($tmpfile != "image/png" && $tmpfile != "image/jpg" && $tmpfile != "image/gif") {
            die("Not a gif/jpeg/png");
        } else {

            $tempDateiName = $_FILES["myfile"]["tmp_name"];
            $originalName = $_FILES["myfile"]["name"];
            $eineId = uniqid();

            $dateiPfadNeu = "../pictures/full/" . $eineId . $originalName;
            move_uploaded_file($tempDateiName, $dateiPfadNeu);
            header("Location: ../index.php");
        }
    }

    ?>
</body>

</html>