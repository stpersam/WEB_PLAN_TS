<!DOCTYPE html>
<link rel="stylesheet" href="res/assets/css/main.css" />
<html>

<head>
    <script type="text/javascript" src="./utility/showcontents.js"></script>
    <script type="text/javascript" src="./utility/showgallerycontent.js"></script>


    <script type="text/javascript">
        function refreshi() {
            showcontent("gallery");
            showgallerycontent("fileupload");
        }
    </script>

    <style>
        .alignit {
            text-align: center;
        }
    </style>
</head>


<body>
    <!-- TBD with ajax -> do fileupload -->
    <div class="container alignit">
        <h5>Upload new file:</h5>
        <form action="inc/pictureupload.php" method="POST" enctype="multipart/form-data">
            <input type="file" name="myfile" id="myfile" accept="image/*">
            <input type="submit" class="btn btn-color" name="submitfile">
        </form>
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