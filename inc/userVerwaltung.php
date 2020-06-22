<script>
    function showStatus(id) {
        $.post("/WEB_SS2020/WebProjekt2020/inc/changeStatus.php",
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
        <th>Anrede</th>
        <th>Vorname</th>
        <th>Nachname</th>
        <th>Adresse</th>
        <th>PLZ</th>
        <th>Ort</th>
        <th>Username</th>
        <th>Passwort</th>
        <th>E-Mail</th>
        <th>Status</th>
        <th>Löschen</th>
        <th>Bearbeiten</th>
    </tr>
    </thead>
    <tbody>
    <?php
    $bd = new DB();
    $users = $bd->getUserList();

    foreach($users as $z) {
        echo "<tr>";
        echo "<td>$z->ID</td>";
        echo "<td>$z->Anrede</td>";
        echo "<td>$z->Vorname</td>";
        echo "<td>$z->Nachname</td>";
        echo "<td>$z->Adresse</td>";
        echo "<td>$z->PLZ</td>";
        echo "<td>$z->Ort</td>";
        echo "<td>$z->Username</td>";
        echo "<td>$z->Password</td>";
        echo "<td>$z->Email</td>";
        echo "<td><button class='btn btn-light' id='st-$z->ID' onclick='showStatus($z->ID)'>$z->Status</button></td>";
        echo "<td><button class='btn btn-light'><a href='../utility/userAdministration.php?do=del'>Löschen</a></button></td>";
        echo "<td><button class='btn btn-light'><a href='../utility/userAdministration.php?do=bea'>Bearbeiten</a></button></td>";
        echo "</tr>";
    }
    ?>
    </tbody>
</table>
