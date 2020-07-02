<!DOCTYPE html>
<link rel="stylesheet" href="res/assets/css/main.css" />
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>
        .collapsible {
            background-color: #56435B;
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
            background-color: #634D69;
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

<body>
    <div class="container">
        <h2>Help Page</h2>
        <h5>General:</h5>
        <button class="collapsible">How do I use the Gallery?</button>
        <div class="content">
            <p>The gallery can be found in the upper part of the page.
                It can be used to view all images that have been made public.
                You can also manage your own pictures when you are logged in.
                The images with GEO-data are displayed on a map with clickable markers that show the image as a thumbnail.
            </p>
        </div>
        <button class="collapsible">How do I use the Chat?</button>
        <div class="content">
            <p>The chat is located in the upper part of the page and can
                only be used by logged in users. With the chat you have the possibility
                to send messages to all existing users live to ensure a lavish conversation.
                To chat with a user, simply click on Start Chat and you can send the user messages directly.
            </p>
        </div>
        <button class="collapsible">How do I get to the Impressum?</button>
        <div class="content">
            <p>
                The Impressum can be reached by clicking Impressum in the upper part of the page.
                It contains all relevant information about us as a manufacturer.
            </p>
        </div>

        <h5>User:</h5>
        <button class="collapsible">How do I create an account?</button>
        <div class="content">
            <p>To register as a user you have to navigate to the home and click
                the Register button in the lower part of the page.
                This means that the data can be entered in order to register successfully
            </p>
        </div>
        <button class="collapsible">How can I change my password?</button>
        <div class="content">
            <p>
                To change your password you have to be logged in as a user.
                Then go to profile in the upper part of the page and press the Edit Profile button.
                This creates the possibility to edit the Profile data and the password.
            </p>
        </div>
        <button class="collapsible">How can I edit my profile?</button>
        <div class="content">
            <p>
                To edit your profile you have to be logged in as a user.
                Then go to profile in the upper part of the page and press the Edit Profile button.
                This creates the possibility to edit the Profile data and the password.
            </p>
        </div>
        <h5>Admin:</h5>
        <button class="collapsible">How can I manage users?</button>
        <div class="content">
            <p>
                As soon as you are logged in as Admin, the Admin tab appears
                in the upper part of the page where you can manage users
            </p>
        </div>
    </div>
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