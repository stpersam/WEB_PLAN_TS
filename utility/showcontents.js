
function showcontents($id, $currentuser) {
    var user = $currentuser;

    switch ($id) {
        case "gallery":
            $("#includecontent").load("inc/gallery.php");
            break;
        case "impressum":
            $("#includecontent").load("inc/impressum.php");
            break;
        case "help":
            $("#includecontent").load("inc/hilfe.php");
            break;
        case "chat":
            if (user != "")
                $("#includecontent").load("inc/chat.php");
            else {
                $("#includecontent").load("inc/loginForm.php");
            }
            break;
        case "registrieren":
            $("#includecontent").load("inc/registerForm.php");
            break;
        case "admin":
            $("#includecontent").load("inc/userVerwaltung.php");
            break;
        default:
            $("#includecontent").load("inc/home.php");
            break;
    }

}
