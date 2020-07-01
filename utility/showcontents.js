
$(document).ready(function () {
    $("#includecontent").load("inc/home.php");
});

function showcontents($id, $currentuser) {
    var user = $currentuser;
    alert(user);

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

        case "registrieren":
            $("#includecontent").load("inc/registerForm.php");
            break;
        case "chat":
            if ($currentuser != null)
                $("#includecontent").load("inc/chat.php");
            else {
                $("#includecontent").load("inc/loginForm.php");
            }
            break;
        default:
            $("#includecontent").load("inc/home.php");
            break;
    }
}
