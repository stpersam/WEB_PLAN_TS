
//function that gets called from index, including content based on given variable, loaded with .load()
function showcontents($id, $currentuser) {
    var user = $currentuser;
    switch ($id) {
       
        case "impressum":
            $("#includecontent").load("inc/impressum.php");
            break;
        case "help":
            $("#includecontent").load("inc/hilfe.php");
            break;
            case "download":
                $("#includecontent").load("inc/download.php");
                break;
        case "registrieren":
            $("#includecontent").load("inc/registerForm.php");
            break;
        case "admin":
            $("#includecontent").load("inc/userVerwaltung.php");
            break;
        case "user":
            $("#includecontent").load("inc/user.php");
            break;
        case "changepassword":
            $("#includecontent").load("inc/changepassword.php");
            break;
        default:
            $("#includecontent").load("inc/home.php");
            break;
    }

}
