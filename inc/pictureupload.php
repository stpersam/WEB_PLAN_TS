<!DOCTYPE html>
<html>

<head>
</head>

<body>
    <!-- TBD with ajax -> do fileupload -->
    <h5>Upload new file:</h5>
    <form action="" method="POST" enctype="multipart/form-data">
        <input type="file" name="myfile" accept="image/*">
        <input type="submit" name="submitfile">
    </form>

    <?php
    if (isset($_POST["myfile"])) {
        $tmpfile = $_POST["myfile"];

        if (($tmpfile !== IMAGETYPE_GIF) && ($tmpfile !== IMAGETYPE_JPEG) && ($tmpfile !== IMAGETYPE_PNG)) {
            die("Not a gif/jpeg/png");
        } else {
            $tempDateiName = $_FILES["myfile"]["tmp_name"];
            $originalName = $_FILES["myfile"]["name"];
            $eineId = uniqid();

            $dateiPfadNeu = "../pictures/full" . $eineId . $originalName;
            move_uploaded_file($tempDateiName, $dateiPfadNeu);
        }
    }

    ?>
</body>

</html>