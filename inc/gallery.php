<!DOCTYPE html>
<html>

<head>
</head>

<body>

    <div class="container">
        <header class="page-header">
            <h1>Auswahl Bilder</h1>
        </header>
        <div class="row">
            <div class="col-md-3">
                <nav>
                    <form method="POST" action="index.php?search=true">

                        <input type="text" name="name">
                        <input type="submit">
                    </form>
                </nav>
            </div>
            <div class="col-md-6">
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