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
        <h2>Downloads</h2>
        <br>
        <h3>Android:</h3>
        <button class="collapsible">Google Play</button>
        <div class="content">
            <a href="https://play.google.com/store?hl=de_AT&gl=US" target="_blank"> <img src="./pictures/full/googleplay.png" width="225"></a>
        </div>
        <button class="collapsible">Microsoft Store</button>
        <div class="content">
            <a href="https://www.microsoft.com/de-at/store/apps/windows-phone" target="_blank"><img src="./pictures/full/windowsphone.png" height="125"></a>
        </div>
        <br>
        <h3>iOS:</h3>
        <button class="collapsible">App Store</button>
        <div class="content">
            <a href="https://www.apple.com/at/ios/app-store/" target="_blank"> <img src="./pictures/full/appstore.jpg" height="125"></a>
        </div>
        <br>
        <h3>Direkter Download:</h3>
        <button class="collapsible">Link</button>
        <div class="content">
            <div class="">
                <a href="https://github.com/stpersam/PLAN_TS" class="link" target="_blank">
                    <img src="./pictures/full/github.png" height="150">
                    
                </a>
                <p>Download from Github</p>
            </div>
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