<!DOCTYPE html>
<meta charset="utf-8">
<link rel="stylesheet" href="res/assets/css/main.css" />
<link rel="stylesheet" href="./utility/dropzone-5.7.0/dist/dropzone.css" />



<html>

<head>
    <script type="text/javascript" src="./utility/showcontents.js"></script>
    <script type="text/javascript" src="./utility/showgallerycontent.js"></script>
    <script src="./utility/dropzone-5.7.0/dist/dropzone.js"></script>

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
    <form action="/upload-target" class="dropzone"></form>
    <div class="container alignit dropzone">
        <h5>Upload new file:</h5>
        <form action="inc/pictureupload.php" method="POST" enctype="multipart/form-data">
            <input type="file" name="myfile" id="myfile" accept="image/*">
            <input type="submit" class="btn btn-color" name="submitfile">
        </form>
        <form action="inc/pictureupload.php" class="dropzone dz-clickable">
            <div class="dz-default dz-message">
                <button class="dz-button" type="button">Upload</button>
            </div>
        </form>
        <input type="file" multiple="multiple" class="dz-hidden-input" style="visibility: hidden; position: absolute; top: 0px; left: 0px; height: 0px; width: 0px;">
    </div>
    <div>
        <form action="/upload-target" class="dropzone dz-clickable">
            <div class="dz-default dz-message"><button class="dz-button" type="button">Drop files here to upload</button></div>
        </form>
        <input type="file" multiple="multiple" class="dz-hidden-input" style="visibility: hidden; position: absolute; top: 0px; left: 0px; height: 0px; width: 0px;">
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