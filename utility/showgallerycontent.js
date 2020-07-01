function showgallerycontent($id, $currentuser, $sort) {
    var user = $currentuser;
    var sort = $sort;

    switch ($id) {
        case "showmypicture":
            $("#includegallerycontent").load("inc/showpictures.php?user="+user);
            break;
        case "showpictures":
            $("#includegallerycontent").load("inc/showpictures.php?picsort="+sort);
            break;
        case "pictureupload":
            $("#includegallerycontent").load("inc/pictureupload.php");
            break;
        default:
            break;
    }
}