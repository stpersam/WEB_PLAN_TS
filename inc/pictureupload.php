<!DOCTYPE html>
<html>

<head>
</head>

<body>
     <!-- TBD with ajax -> do fileupload -->
    <h5>Upload new file:</h5>
    <form action="index.php?use=gallery" method="POST" enctype="multipart/form-data">
        <input type="file" name="myfile">
        <input type="submit" name="submitfile">
    </form>
</body>

</html>