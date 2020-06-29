<!DOCTYPE HTML>
<?php session_start(); ?>
<html>
<html>
<head>
    <title>Chat</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
    <link rel="stylesheet" href="res/assets/css/main.css" />
    <noscript><link rel="stylesheet" href="res/assets/css/noscript.css" /></noscript>
</head>
<body class="left-sidebar is-preload">
<div id="page-wrapper">

    <!-- Header -->
    <div id="header">

        <!-- Inner -->
        <div class="inner">
            <header>
                <h1><a href="index_2.php" id="logo">Helios</a></h1>
            </header>
        </div>

        <!-- Nav -->
        <nav id="nav">
            <ul>
                <li><a href="index_2.php">Home</a></li>
                <li><a href="chat_front.php">Chat</a></li>
                <li><a href="left-sidebar.html">Left Sidebar</a></li>
                <li><a href="right-sidebar.html">Right Sidebar</a></li>
                <li><a href="no-sidebar.html">No Sidebar</a></li>
            </ul>
        </nav>

    </div>

<?php
include "model/picture.php";
include "utility/DB.php";
include "model/User.php";
if (isset($_SESSION['users']['Username'])) {
    $currentuser = $_SESSION['users']['Username'];
}

include "inc/chat.php";
