<?php
include "DB.php";
include '../model/User.php';
$db = new DB();

if($_GET["do"] == "del"){
    if(isset($_GET["id"])) {
        $db->connect("users");
        $db->deleteUser($_GET["id"]);
    }
    header("Location: ../index.php");
}else if($_GET["do"] == "bea"){
    if (isset($_GET["username"])) {
        $db->connect("users");
        $z = $db->getUser($_GET["username"]);
        ?>
        <div class="form_überschrift">
            <h2>Edit Profile</h2>
        </div>

        <div class="formular">
            <form name = "myForm" action="userAdministration.php?bearbeitet=T&id=<?php echo $z["ID"] ?>" method="post">
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
                    <button type="submit" name="bearbeiten" id="bearbeiten" class="btn btn-outline-secondary btn-secondary">Edit</button>
            </form>
        </div>
        </div>
        <?php

        if (isset($_GET["bearbeitet"])) {
            if ($_GET["bearbeitet"] == "T") {
                if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                    if (!empty(filter_input(INPUT_POST, "password"))) {
                        $anrede = (filter_input(INPUT_POST, "anrede"));
                        $vorname = (filter_input(INPUT_POST, "vorname"));
                        $nachname = (filter_input(INPUT_POST, "nachname"));
                        $adresse = (filter_input(INPUT_POST, "adresse"));
                        $plz = (filter_input(INPUT_POST, "plz"));
                        $ort = (filter_input(INPUT_POST, "ort"));
                        $username = (filter_input(INPUT_POST, "username"));
                        $password = (filter_input(INPUT_POST, "password"));
                        $email = (filter_input(INPUT_POST, "email"));

                        $user = new User($anrede, $vorname, $nachname, $adresse, $plz, $ort, $username, $password, $email);
                    }
                }
                $db->updateUser($user);
                header("Location: ../index.php");
            }
        }
    }
}



