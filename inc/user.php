<script type="text/javascript" src="utility/showcontents.js"></script>
<div class="container">
    <br>
    <?php session_start();
    echo '<form method="post" action="utility/login.php">';
    echo '<button type="submit" name="logout" id="logout" class="btn btn-primary" style="float: right">Logout</button>';
    echo '</form>';
    echo "<h1>Welcome " . $_SESSION["users"]["Username"] . "</h1><br><br>";
    $tmp = '"profilbearbeiten"';
    echo "<button type='submit' name='ep' id='ep' class='btn btn-primary' onclick='showcontents($tmp)' style='float: right'>Edit Profile</button>"
    ?>
</div>