<?php include "../utility/DB.php"?>
<link rel="stylesheet" href="res/assets/css/main.css" />
<script>
    function showStatus(id) {
        $.post("./ajax/changeStatus.php", {
            id: id,
        },
        function(data) {
            $("#st-" + id).html(data)
        });
    }

    function showPictures(id) {
        $.post("./ajax/showUserpictures.php", {
            id: id,
        },
        function(data) {
          $('#divPictures').html(data)
        });
    }
</script>
<div class="container">
    <br>
    <!--Creates a Table to display the user administration for the admins -->
    <form method="post" action="utility/login.php">
        <button type="submit" name="logout" id="logout" class="btn btn-color" style="float: right">Logout</button>
    </form>
    <br>
    <h2>User Administration</h2>
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Salutation</th>
                <th>First Name</th>
                <th>Second Name</th>
                <th>Adress</th>
                <th>PLZ</th>
                <th>Place</th>
                <th>Username</th>
                <th>E-Mail</th>
                <th>Status</th>
                <th>Pictures</th>
                <th>Delete</th>
            </tr>
        </thead>
        <tbody>

            <?php
            // fetsch all Users from the database and display it with a Status, Pictures and Delete button.
            $bd = new DB();
            $users = $bd->getUserList();

            foreach ($users as $z) {
                if ($z->Username != "admin") {
                    echo "<tr>";
                    echo "<td>$z->ID</td>";
                    echo "<td>$z->Anrede</td>";
                    echo "<td>$z->Vorname</td>";
                    echo "<td>$z->Nachname</td>";
                    echo "<td>$z->Adresse</td>";
                    echo "<td>$z->PLZ</td>";
                    echo "<td>$z->Ort</td>";
                    echo "<td>$z->Username</td>";
                    echo "<td>$z->Email</td>";
                    echo "<td><button class='btn btn-color' id='st-$z->ID' onclick='showStatus($z->ID)'>$z->Status</button></td>";
                    echo "<td><button class='btn btn-color' onclick='showPictures($z->ID)'>Pictures</button></td>";
                    echo "<td><button class='btn btn-color'><a href='./utility/userAdministration.php?do=del&id=$z->ID'>Delete</a></button></td>";
                    echo "</tr>";
                }
            }
            ?>
        </tbody>
    </table>
    <!--Displays the pictures when clicked on the Picture button of a specific user -->
    <div id="divPictures"></div>
</div>