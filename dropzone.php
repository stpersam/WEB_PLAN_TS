<!DOCTYPE html>
<meta charset="utf-8">

<script src="./utility/dropzone-5.7.0/dist/dropzone.js"></script>
<link rel="stylesheet" href="res/assets/css/main.css" />
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<link rel="stylesheet" href="./utility/dropzone-5.7.0/dist/dropzone.css" />

<script>
    $(document).ready(function() {
        $.getScript("./utility/dropzone-5.7.0/dist/dropzone.css");
    });
</script>
<br>
<div class="container">
    <form action="inc/pictureupload.php" class="dropzone" enctype="multipart/form-data">
        <input type="submit" class="btn btn-color btn-md" name="submitfile">
    </form>
    <a href="index.php"><button class="btn-color">Back</button></a>

</div>