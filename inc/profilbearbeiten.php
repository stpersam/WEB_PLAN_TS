<link rel="stylesheet" href="res/assets/css/main.css" />
<?php
include "../utility/DB.php";
include "../model/User.php";
session_start();
$dbobjekt = new DB();
$dbobjekt->connect("users");

// gets one specific user from the database
$z = $dbobjekt->getUser($_SESSION["users"]["Username"]);


// updates user details
if(isset($_GET["bearbeitet"])) {
    if ($_GET["bearbeitet"] == "T") {
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            if(!empty(filter_input(INPUT_POST,"passwordO"))){
                $pw = $dbobjekt->getPassword(filter_input(INPUT_POST,"username"));
                if($pw == hash("sha256",filter_input(INPUT_POST,"passwordO"))){
                    if(!empty(filter_input(INPUT_POST,"passwordN"))){
                        if(filter_input(INPUT_POST,"passwordN") == filter_input(INPUT_POST,"passwordBest")){
                            $anrede = (filter_input(INPUT_POST, "anrede"));
                            $vorname = (filter_input(INPUT_POST, "vorname"));
                            $nachname = (filter_input(INPUT_POST, "nachname"));
                            $adresse = (filter_input(INPUT_POST, "adresse"));
                            $plz = (filter_input(INPUT_POST, "plz"));
                            $ort = (filter_input(INPUT_POST, "ort"));
                            $username = (filter_input(INPUT_POST, "username"));
                            $password = (filter_input(INPUT_POST, "passwordN"));
                            $email = (filter_input(INPUT_POST, "email"));

                            // hasches the password
                            $password = hash('sha256',$password);
                            $user = new User($anrede,$vorname,$nachname,$adresse,$plz,$ort,$username,$password,$email);

                            $bd = new DB();
                            $bd->updateUser($user);
                            header("Location: ../index.php");
                        }else{
                            header("Location: ../index.php");
                            die();
                        }
                    }

                }else{
                    header("Location: ../index.php");
                    die();
                }
            }

        }

    }

}
?>
<div class="container">
    <div class="form_überschrift">
        <h2>Edit Profile</h2>
    </div>
    <!--Form to display and edit the Profil details -->
    <div class="formular">
        <form name = "myForm" action="profilbearbeiten.php?bearbeitet=T&id=<?php echo $z["ID"] ?>" method="post">
            <div class="Formularfenster" Id="eltern">
                <div class="form-group">
                    <label for="anrede">Salutation:</label>
                    <select name="anrede" class="custom-select mb-3">
                        <option selected value="<?php echo $z["Anrede"]?>"><?php echo $z["Anrede"]?></option>
                        <option value="Mr" >Mr</option>
                        <option value="Mrs">Mrs</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="vorname">First Name:</label>
                    <input type="text" name="vorname" class="form-control" value="<?php echo $z["Vorname"]?>">
                </div>
                <div class="form-group">
                    <label for="nachname">Second Name:</label>
                    <input type="text" name="nachname" class="form-control" value="<?php echo $z["Nachname"]?>">
                </div>
                <div class="form-group">
                    <label for="adresse">Adress:</label>
                    <input type="text" name="adresse" class="form-control" value="<?php echo $z["Adresse"]?>">
                </div>
                <div class="form-group">
                    <label for="plz">PLZ:</label>
                    <input type="number" name="plz" class="form-control" value="<?php echo $z["PLZ"]?>" max="9999" minlength="4">
                </div>
                <div class="form-group">
                    <label for="ort">Place:</label>
                    <input type="text" name="ort" class="form-control" value="<?php echo $z["Ort"]?>">
                </div>
                <div class="form-group">
                    <label for="username">Username:</label>
                    <input type="text" name="username" class="form-control" value="<?php echo $z["Username"]?>" required>
                </div>
                <div class="form-group">
                    <label for="passwordO">Old Password:</label>
                    <input type="password" name="passwordO" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="passwordN">New Password:</label>
                    <input type="password" name="passwordN" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="passwordBest">Confirm Password:</label>
                    <input type="password" name="passwordBest" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="email">E-Mail:</label>
                    <input type="email" name="email" class="form-control" value="<?php echo $z["Email"]?>">
                </div>
                <button type="submit" name="bearbeiten" id="bearbeiten" class="btn btn-color">Edit</button>
        </form>
    </div>
    </div>
</div>
</body>

</html>