//function that gets called from, including content based on given variable, loaded with .load()
function showgallerycontent($id, $currentuser, $sort) {
    var user = $currentuser;
    var sort = $sort;

    switch ($id) {
        case "showmypictures":
            $("#includegallerycontent").load("inc/showpictures.php?user=" + user + "&sort=" + sort);
            break;
        case "showmypublishedpictures":
            $("#includegallerycontent").load("inc/showpictures.php?state=freigegeben&user=" + user + "&sort=" + sort);
            break;
        case "showallpublishedpictures":
            $("#includegallerycontent").load("inc/showpictures.php?state=freigegeben" + "&sort=" + sort);
            break;
        case "pictureupload":
            $("#includegallerycontent").load("inc/pictureupload.php");
            break;
        default:
            break;
    }
}
