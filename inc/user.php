<script type="text/javascript" src="utility/showcontents.js"></script>
<style>
    .btn-color {
        background-color: #734F6F;
        color: #FFFFFF;
    }

    .btn-color:hover {
        background-color: #56435B;
        /* Green */
        color: white;
    }

    p {
        text-align: center;
    }

    h2 {
        text-align: center;
    }

    .alignit {
        text-align: center;
    }
</style>
<link rel="stylesheet" href="res/assets/css/main.css" />
<div class="container">
    <?php session_start();
    // User individual content and button to logout and edit profile
    echo "<h2>Welcome " . $_SESSION["user"] . "</h2>";
    ?>
    <p class="alignit">
        Here you can edit your profile.
    </p>
    <?php
    $tmp = '"profilbearbeiten"';
    echo "<div class='container alignit'><button type='submit' name='ep' id='ep' class='btn btn-color' onclick='showcontents($tmp)' >Edit Profile</button>";
    echo '<form method="post" action="./utility/LoginAPI.php">';
    echo '<button type="submit" name="logout" id="logout" class="btn btn-color">Logout</button><br>';
    echo '</form></div>';

    ?>


</div>