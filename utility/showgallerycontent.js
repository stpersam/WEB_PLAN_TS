function showgallerycontent($id, $currentuser) {
    var user = $currentuser;

    
    switch ($id) {
        case "showmypicture":
            $("#includegallerycontent").load("inc/showpictures.php?user=#currentuser");
            break;
        case "showpictures":
            $("#includegallerycontent").load("inc/showpictures.php?picsort=changedate");
            break;
        case "pictureupload":
            $("#includegallerycontent").load("inc/pictureupload.php");
            break;
        default:
            break;
    }
}