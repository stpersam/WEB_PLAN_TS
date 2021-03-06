<!DOCTYPE html>
<link rel="stylesheet" href="res/assets/css/main.css" />
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSS -->
    <style>
        .collapsible {
            background-color: #05595F;
            color: white;
            cursor: pointer;
            padding: 18px;
            width: 100%;
            border: none;
            text-align: left;
            outline: none;
            font-size: 18px;
        }

        .active,
        .collapsible:hover {
            background-color: #176C5F;
        }

        .collapsible:after {
            content: '\002B';
            color: white;
            font-weight: bold;
            float: right;
            margin-left: 5px;
        }

        .active:after {
            content: "\2212";
        }

        .content {
            padding: 0 18px;
            max-height: 0;
            overflow: hidden;
            transition: max-height 0.2s ease-out;
            background-color: #f1f1f1;
        }

        h2 {
            text-align: center;
        }
    </style>
</head>
<!-- CONTENT -->
<body>
    <div class="container">
    <br>
        <h2>FAQ</h2>
        <br>
        <h3>Allgemein:</h3>
        <button class="collapsible">Wie kann ich Plan-ts nutzen?</button>
        <div class="content">
            <p>Registriere dich auf der Website und lade die App herunter.
            </p>
        </div>
        <button class="collapsible">Wie lade ich Plan-ts herunter?</button>
        <div class="content">
            <p>Download Page
            </p>
        </div>
        <button class="collapsible">Wie gelange ich zum Impressum?</button>
        <div class="content">
            <p>
                The Impressum can be reached by clicking Impressum in the upper part of the page.
                It contains all relevant information about us as a manufacturer.
            </p>
        </div>
        <br>
        <h3>User:</h3>
        <button class="collapsible">Wie erstelle ich einen Account?</button>
        <div class="content">
            <p>To register as a user you have to navigate to the home and click
                the Register button in the lower part of the page.
                This means that the data can be entered in order to register successfully
            </p>
        </div>
        <button class="collapsible">Wie ??ndere ich mein Passwort?</button>
        <div class="content">
            <p>
                To change your password you have to be logged in as a user.
                Then go to profile in the upper part of the page and press the Edit Profile button.
                This creates the possibility to edit the Profile data and the password.
            </p>
        </div>
       
        <br>
        <h3>Plan-ts:</h3>
        <button class="collapsible">Wie f??ge ich neue Pflanzen hinzu?</button>
        <div class="content">
            <p>
                As soon as you are logged in as Admin, the Admin tab appears
                in the upper part of the page where you can manage users
            </p>
        </div>
        <button class="collapsible">Wie f??ge ich neue Gruppen hinzu?</button>
        <div class="content">
            <p>
                As soon as you are logged in as Admin, the Admin tab appears
                in the upper part of the page where you can manage users
            </p>
        </div><button class="collapsible">Wie suche ich Pflanzen?</button>
        <div class="content">
            <p>
                As soon as you are logged in as Admin, the Admin tab appears
                in the upper part of the page where you can manage users
            </p>
        </div>
    </div>
    <!-- Function that makes them collapsible -->
    <script>
        var coll = document.getElementsByClassName("collapsible");
        var i;

        for (i = 0; i < coll.length; i++) {
            coll[i].addEventListener("click", function() {
                this.classList.toggle("active");
                var content = this.nextElementSibling;
                if (content.style.maxHeight) {
                    content.style.maxHeight = null;
                } else {
                    content.style.maxHeight = content.scrollHeight + "px";
                }
            });
        }
    </script>

</body>

</html>