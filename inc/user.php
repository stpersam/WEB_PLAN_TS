<script type="text/javascript" src="utility/showcontents.js"></script>
<link rel="stylesheet" href="res/assets/css/main.css" />
<div class="container">
    <br>

    <?php session_start();
    // User individual content and button to logout and edit profile
    echo '<form method="post" action="utility/login.php">';
    echo '<button type="submit" name="logout" id="logout" class="btn btn-color" style="float: right">Logout</button>';
    echo '</form>';
    echo "<h1>Welcome " . $_SESSION["users"]["Username"] . "</h1><br><br>";
    $tmp = '"profilbearbeiten"';
    echo "<button type='submit' name='ep' id='ep' class='btn btn-color' onclick='showcontents($tmp)' style='float: right'>Edit Profile</button>"
    ?>
    <br>
    <br>
    <p>
        Sed ut perspiciatis unde omnis iste
        natus error sit voluptatem accusantium doloremque
        laudantium, totam rem aperiam, eaque ipsa quae ab illo
        inventore veritatis et quasi architecto beatae vitae dicta
        sunt explicabo. Nemo enim ipsam voluptatem quia voluptas
        sit aspernatur aut odit aut fugit, sed quia consequuntur
        magni dolores eos qui ratione voluptatem sequi nesciunt.
        Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet,
        consectetur, adipisci velit, sed quia non numquam eius modi tempora
        incidunt ut labore et dolore magnam aliquam quaerat voluptatem.
        Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis
        suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur?
        Quis autem vel eum iure reprehenderit qui in ea voluptate
        velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur?"
    </p>
</div>