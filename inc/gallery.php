<!DOCTYPE html>
<html>

<head>
</head>

<body>

    <div class="container">
        <header class="page-header">
            <h1>Gallery</h1>
        </header>
        <div class="row">
            <div class="col-md-3">
                <nav>
                    <form method="POST" action="index.php?use=gallery&search=true">
                        <p>Filter by searchtag:</p>
                        <input type="text" name="searchtag"></input>
                        <input class="btn" type="submit" name="show" value="Show">

                    </form>

                    <form method="POST" action="index.php?search=true">
                        <p>My pictures:</p>
                        <input type="text" name="user" value="Franz" hidden>
                        <input class="btn" type="submit" name="show" value="Show">
                    </form>

                    <form method="POST" action="index.php?search=true">
                        <p>My published pictures:</p>
                        <input type="text" name="userstate" value="Franz" hidden>
                        <input class="btn" type="submit" name="show" value="Show">
                    </form>
                    <form method="POST" action="index.php?search=true">
                        <p>All published pictures:</p>
                        <input type="text" name="state" value="freigegeben" hidden>
                        <input class="btn" type="submit" name="show" value="Show">
                        </form>
                        <br></br>
                </nav>
            </div>
            <div class="col-md-9">
                <main id="content">
                    <?php
                    if (!empty($_GET['search'])) {
                        include("inc/showpictures.php");
                    }
                    ?>
                </main>
            </div>
        </div>

    </div>



</body>

</html>