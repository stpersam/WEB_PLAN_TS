<?php
$db = new DB();
$db->connect("users");
$result = $db->getUserList();
?>
<table class="table table-bordered table-striped">
    <thead>
        <tr>
            <th>Username</th>
            <th>Status</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        <?php
        foreach ($result as $row) {
            if($row->Username != $_SESSION['users']['Username']){
                echo "<tr>";
                echo "<td>$row->Username</td>";
                echo "<td><p id='user-details'>$row->State</p></td>";
                echo "<td><button type='button' class='btn btn-info btn-xs start_chat' data-touserid = '$row->ID' data-tousername='$row->Username'>Start Chat</button></td>";
                echo "</tr>";
            }
        }
        ?>
    </tbody>
</table>


