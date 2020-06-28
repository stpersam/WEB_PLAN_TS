<script>
    function showStatus(id) {
        $.post("./utility/changeStatus.php",
        {
            id: id,
        },
        function(data){
           $("#st-"+id).html(data)
        });
    }
</script>
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
    $bd = new DB();
    $users = $bd->getUserList();

    foreach($users as $z) {
        if($z->Username != "admin") {
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
            echo "<td><button class='btn btn-light' id='st-$z->ID' onclick='showStatus($z->ID)'>$z->Status</button></td>";
            echo "<td><button class='btn btn-light'>Pictures</button></td>";
            echo "<td><button class='btn btn-light'><a href='./utility/userAdministration.php?do=del&id=$z->ID'>Delete</a></button></td>";
            echo "</tr>";
        }
    }
    ?>
    </tbody>
</table>
