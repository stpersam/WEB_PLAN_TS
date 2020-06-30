<!DOCTYPE HTML>
<?php session_start(); ?>
<!--
	Helios by HTML5 UP
	html5up.net | @ajlkn
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html>

<head>
    <title>Picture Cloud</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
    <link rel="stylesheet" href="res/assets/css/main.css" />
    <noscript>
        <link rel="stylesheet" href="res/assets/css/noscript.css" /></noscript>


    <!-- Fancybox/Fancyapps-->
    <!-- 1. Add latest jQuery and fancybox files -->
    <script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.css" />
    <script src="https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.js"></script>

    <!-- Bootstrap 4-->
    <!-- CSS only -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <!-- JS, Popper.js, and jQuery -->
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>

    <script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script>

</head>

<body class="homepage is-preload">
    <?php
    include "model/picture.php";
    include "utility/DB.php";
    include "model/User.php";

    if (isset($_SESSION['users']['Username'])) {
        $currentuser = $_SESSION['users']['Username'];
    } ?>

    <script type="text/javascript">
        $(document).ready(function() {
            $("#includecontent").load("inc/loginForm.php");
        });

        function showcontent($id) {
            switch ($id) {
                case "gallery":
                    $("#includecontent").load("inc/gallery.php");
                    break;
                case "impressum":
                    $("#includecontent").load("inc/impressum.php");
                    break;
                case "help":
                    $("#includecontent").load("inc/hilfe.php");
                    break;
                case "chat":
                    $("#includecontent").load("inc/chat.php");
                    break;
                default:
                    break;
            }
        }
    </script>

    <div id="page-wrapper">
        <!-- Header -->
        <div id="header">
            <!-- Inner -->
            <div class="inner">
                <header>
                    <h1><a href="index_2.php" id="logo">Picture Cload</a></h1>
                    <hr />
                    <p>The world greatest Picture Gallery Manager</p>
                </header>
            </div>

            <!-- Nav -->
            <nav id="nav">
                <ul>
                    <li><a href="index_2.php">Home</a></li>
                    <li><a href="" onclick="showcontent('gallery')">Gallery</a></li>
                    <li><a href="" onclick="showcontent('chat')">Chat</a></li>
                    <li><a href="" onclick="showcontent('help')">Help</a></li>
                    <li><a href="" onclick="showcontent('impressum')">Impressum</a></li>
                </ul>
            </nav>
        </div>

        <!-- Content -->
        <section id="content">
            <body>
                <div id="includecontent" class="wrapper style2">
                </div>
            </body>
        </section>

        <footer class="text-center ">
            <a href="#header" class=""><i class="fa fa-arrow-up"></i>To the top</a>
        </footer>
        <!-- Carousel 
        <section class="carousel">
            <div class="reel">

                <article>
                    <a href="#" class="image featured"><img src="res/images/pic01.jpg" alt="" /></a>
                    <header>
                        <h3><a href="#">Pulvinar sagittis congue</a></h3>
                    </header>
                    <p>Commodo id natoque malesuada sollicitudin elit suscipit magna.</p>
                </article>

                <article>
                    <a href="#" class="image featured"><img src="res/images/pic02.jpg" alt="" /></a>
                    <header>
                        <h3><a href="#">Fermentum sagittis proin</a></h3>
                    </header>
                    <p>Commodo id natoque malesuada sollicitudin elit suscipit magna.</p>
                </article>

                <article>
                    <a href="#" class="image featured"><img src="res/images/pic03.jpg" alt="" /></a>
                    <header>
                        <h3><a href="#">Sed quis rhoncus placerat</a></h3>
                    </header>
                    <p>Commodo id natoque malesuada sollicitudin elit suscipit magna.</p>
                </article>

                <article>
                    <a href="#" class="image featured"><img src="res/images/pic04.jpg" alt="" /></a>
                    <header>
                        <h3><a href="#">Ultrices urna sit lobortis</a></h3>
                    </header>
                    <p>Commodo id natoque malesuada sollicitudin elit suscipit magna.</p>
                </article>

                <article>
                    <a href="#" class="image featured"><img src="res/images/pic05.jpg" alt="" /></a>
                    <header>
                        <h3><a href="#">Varius magnis sollicitudin</a></h3>
                    </header>
                    <p>Commodo id natoque malesuada sollicitudin elit suscipit magna.</p>
                </article>

                <article>
                    <a href="#" class="image featured"><img src="res/images/pic01.jpg" alt="" /></a>
                    <header>
                        <h3><a href="#">Pulvinar sagittis congue</a></h3>
                    </header>
                    <p>Commodo id natoque malesuada sollicitudin elit suscipit magna.</p>
                </article>

                <article>
                    <a href="#" class="image featured"><img src="res/mages/pic02.jpg" alt="" /></a>
                    <header>
                        <h3><a href="#">Fermentum sagittis proin</a></h3>
                    </header>
                    <p>Commodo id natoque malesuada sollicitudin elit suscipit magna.</p>
                </article>

                <article>
                    <a href="#" class="image featured"><img src="res/images/pic03.jpg" alt="" /></a>
                    <header>
                        <h3><a href="#">Sed quis rhoncus placerat</a></h3>
                    </header>
                    <p>Commodo id natoque malesuada sollicitudin elit suscipit magna.</p>
                </article>

                <article>
                    <a href="#" class="image featured"><img src="res/images/pic04.jpg" alt="" /></a>
                    <header>
                        <h3><a href="#">Ultrices urna sit lobortis</a></h3>
                    </header>
                    <p>Commodo id natoque malesuada sollicitudin elit suscipit magna.</p>
                </article>

                <article>
                    <a href="#" class="image featured"><img src="res/images/pic05.jpg" alt="" /></a>
                    <header>
                        <h3><a href="#">Varius magnis sollicitudin</a></h3>
                    </header>
                    <p>Commodo id natoque malesuada sollicitudin elit suscipit magna.</p>
                </article>

            </div>
        </section>
        -->
        <!-- Main 
        <div class="wrapper style2">

            <article id="main" class="container special">
                <a href="#" class="image featured"><img src="res/images/pic06.jpg" alt="" /></a>
                <header>
                    <h2><a href="#">Sed massa imperdiet magnis</a></h2>
                    <p>
                        Sociis aenean eu aenean mollis mollis facilisis primis ornare penatibus aenean. Cursus ac enim
                        pulvinar curabitur morbi convallis. Lectus malesuada sed fermentum dolore amet.
                    </p>
                </header>
                <p>
                    Commodo id natoque malesuada sollicitudin elit suscipit. Curae suspendisse mauris posuere accumsan massa
                    posuere lacus convallis tellus interdum. Amet nullam fringilla nibh nulla convallis ut venenatis purus
                    sit arcu sociis. Nunc fermentum adipiscing tempor cursus nascetur adipiscing adipiscing. Primis aliquam
                    mus lacinia lobortis phasellus suscipit. Fermentum lobortis non tristique ante proin sociis accumsan
                    lobortis. Auctor etiam porttitor phasellus tempus cubilia ultrices tempor sagittis. Nisl fermentum
                    consequat integer interdum integer purus sapien. Nibh eleifend nulla nascetur pharetra commodo mi augue
                    interdum tellus. Ornare cursus augue feugiat sodales velit lorem. Semper elementum ullamcorper lacinia
                    natoque aenean scelerisque.
                </p>
                <footer>
                    <a href="#" class="button">Continue Reading</a>
                </footer>
            </article>

        </div>
        -->
        <!-- Features 
        <div class="wrapper style1">

            <section id="features" class="container special">
                <header>
                    <h2>Morbi ullamcorper et varius leo lacus</h2>
                    <p>Ipsum volutpat consectetur orci metus consequat imperdiet duis integer semper magna.</p>
                </header>
                <div class="row">
                    <article class="col-4 col-12-mobile special">
                        <a href="#" class="image featured"><img src="res/images/pic07.jpg" alt="" /></a>
                        <header>
                            <h3><a href="#">Gravida aliquam penatibus</a></h3>
                        </header>
                        <p>
                            Amet nullam fringilla nibh nulla convallis tique ante proin sociis accumsan lobortis. Auctor etiam
                            porttitor phasellus tempus cubilia ultrices tempor sagittis. Nisl fermentum consequat integer interdum.
                        </p>
                    </article>
                    <article class="col-4 col-12-mobile special">
                        <a href="#" class="image featured"><img src="res/images/pic08.jpg" alt="" /></a>
                        <header>
                            <h3><a href="#">Sed quis rhoncus placerat</a></h3>
                        </header>
                        <p>
                            Amet nullam fringilla nibh nulla convallis tique ante proin sociis accumsan lobortis. Auctor etiam
                            porttitor phasellus tempus cubilia ultrices tempor sagittis. Nisl fermentum consequat integer interdum.
                        </p>
                    </article>
                    <article class="col-4 col-12-mobile special">
                        <a href="#" class="image featured"><img src="res/images/pic09.jpg" alt="" /></a>
                        <header>
                            <h3><a href="#">Magna laoreet et aliquam</a></h3>
                        </header>
                        <p>
                            Amet nullam fringilla nibh nulla convallis tique ante proin sociis accumsan lobortis. Auctor etiam
                            porttitor phasellus tempus cubilia ultrices tempor sagittis. Nisl fermentum consequat integer interdum.
                        </p>
                    </article>
                </div>
            </section>

        </div>
        -->
        <!-- Footer 

        <div id="footer">
            <div class="container">
                <div class="row">

                   
                    <section class="col-4 col-12-mobile">
                        <header>
                            <h2 class="icon brands fa-twitter circled"><span class="label">Tweets</span></h2>
                        </header>
                        <ul class="divided">
                            <li>
                                <article class="tweet">
                                    Amet nullam fringilla nibh nulla convallis tique ante sociis accumsan.
                                    <span class="timestamp">5 minutes ago</span>
                                </article>
                            </li>
                            <li>
                                <article class="tweet">
                                    Hendrerit rutrum quisque.
                                    <span class="timestamp">30 minutes ago</span>
                                </article>
                            </li>
                            <li>
                                <article class="tweet">
                                    Curabitur donec nulla massa laoreet nibh. Lorem praesent montes.
                                    <span class="timestamp">3 hours ago</span>
                                </article>
                            </li>
                            <li>
                                <article class="tweet">
                                    Lacus natoque cras rhoncus curae dignissim ultricies. Convallis orci aliquet.
                                    <span class="timestamp">5 hours ago</span>
                                </article>
                            </li>
                        </ul>
                    </section>

                    
                    <section class="col-4 col-12-mobile">
                        <header>
                            <h2 class="icon solid fa-file circled"><span class="label">Posts</span></h2>
                        </header>
                        <ul class="divided">
                            <li>
                                <article class="post stub">
                                    <header>
                                        <h3><a href="#">Nisl fermentum integer</a></h3>
                                    </header>
                                    <span class="timestamp">3 hours ago</span>
                                </article>
                            </li>
                            <li>
                                <article class="post stub">
                                    <header>
                                        <h3><a href="#">Phasellus portitor lorem</a></h3>
                                    </header>
                                    <span class="timestamp">6 hours ago</span>
                                </article>
                            </li>
                            <li>
                                <article class="post stub">
                                    <header>
                                        <h3><a href="#">Magna tempus consequat</a></h3>
                                    </header>
                                    <span class="timestamp">Yesterday</span>
                                </article>
                            </li>
                            <li>
                                <article class="post stub">
                                    <header>
                                        <h3><a href="#">Feugiat lorem ipsum</a></h3>
                                    </header>
                                    <span class="timestamp">2 days ago</span>
                                </article>
                            </li>
                        </ul>
                    </section>

                    
                    <section class="col-4 col-12-mobile">
                        <header>
                            <h2 class="icon solid fa-camera circled"><span class="label">Photos</span></h2>
                        </header>
                        <div class="row gtr-25">
                            <div class="col-6">
                                <a href="#" class="image fit"><img src="res/images/pic10.jpg" alt="" /></a>
                            </div>
                            <div class="col-6">
                                <a href="#" class="image fit"><img src="res/images/pic11.jpg" alt="" /></a>
                            </div>
                            <div class="col-6">
                                <a href="#" class="image fit"><img src="res/images/pic12.jpg" alt="" /></a>
                            </div>
                            <div class="col-6">
                                <a href="#" class="image fit"><img src="res/images/pic13.jpg" alt="" /></a>
                            </div>
                            <div class="col-6">
                                <a href="#" class="image fit"><img src="res/images/pic14.jpg" alt="" /></a>
                            </div>
                            <div class="col-6">
                                <a href="#" class="image fit"><img src="res/images/pic15.jpg" alt="" /></a>
                            </div>
                        </div>
                    </section>

                </div>
                <hr />
                <div class="row">
                    <div class="col-12">

                        
                        <section class="contact">
                            <header>
                                <h3>Nisl turpis nascetur interdum?</h3>
                            </header>
                            <p>Urna nisl non quis interdum mus ornare ridiculus egestas ridiculus lobortis vivamus tempor aliquet.</p>
                            <ul class="icons">
                                <li><a href="#" class="icon brands fa-twitter"><span class="label">Twitter</span></a></li>
                                <li><a href="#" class="icon brands fa-facebook-f"><span class="label">Facebook</span></a></li>
                                <li><a href="#" class="icon brands fa-instagram"><span class="label">Instagram</span></a></li>
                                <li><a href="#" class="icon brands fa-pinterest"><span class="label">Pinterest</span></a></li>
                                <li><a href="#" class="icon brands fa-dribbble"><span class="label">Dribbble</span></a></li>
                                <li><a href="#" class="icon brands fa-linkedin-in"><span class="label">Linkedin</span></a></li>
                            </ul>
                        </section>

                       
                        <div class="copyright">
                            <ul class="menu">
                                <li>&copy; Untitled. All rights reserved.</li>
                                <li>Design: <a href="http://html5up.net">HTML5 UP</a></li>
                            </ul>
                        </div>

                    </div>

                </div>
            </div>
        </div>
        
    </div>
    -->
        <!-- Scripts -->
        <script src="res/assets/js/jquery.min.js"></script>
        <script src="res/assets/js/jquery.dropotron.min.js"></script>
        <script src="res/assets/js/jquery.scrolly.min.js"></script>
        <script src="res/assets/js/jquery.scrollex.min.js"></script>
        <script src="res/assets/js/browser.min.js"></script>
        <script src="res/assets/js/breakpoints.min.js"></script>
        <script src="res/assets/js/util.js"></script>
        <script src="res/assets/js/main.js"></script>

</body>

</html>