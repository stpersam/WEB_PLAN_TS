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
        echo "<td><a href='utility/loeschenDB.php?id=$z->ID'>Löschen</a></td>";
        echo "<td><a href='utility/bearbeitenDB.php?id=$z->ID'>Bearbeiten</a></td>";
        echo "</tr>";
    }
    ?>
    </tbody>
</table>
