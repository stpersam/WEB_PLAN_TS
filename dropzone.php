<!DOCTYPE html>
<meta charset="utf-8">
<!-- load JS -->
<script src="./utility/dropzone-5.7.0/dist/dropzone.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<!-- load CSS -->
<link rel="stylesheet" href="res/assets/css/main.css" />
<link rel="stylesheet" href="./utility/dropzone-5.7.0/dist/dropzone.css" />

<!-- Script to reload JS -->
<script>
    $(document).ready(function() {
        $.getScript("./utility/dropzone-5.7.0/dist/dropzone.css");
    });
</script>
<br>
<!-- Content -->
<div class="container">
    <form action="inc/pictureupload.php" class="dropzone" enctype="multipart/form-data">
        <input type="submit" class="btn btn-color btn-md" name="submitfile">
    </form>
    <a href="index.php"><button class="btn-color">Back</button></a>

</div>