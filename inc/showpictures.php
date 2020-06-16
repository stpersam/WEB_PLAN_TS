<?php



//connect to db/pictures
$gettable = new DB();
$gettable->connect("pictures");

//initate searchtag and get array of fitting SELECT
$searchtag = "XXXXXXXXXXXXXXXXXXXXXXXXXXXXXX";
$state = "XXXXXXXXXXXXXXXXXXXXXXXXXXXXXX";
$userfilter = "XXXXXXXXXXXXXXXXXXXXXXXXXXXXXX";


if (isset($_POST["searchtag"]) && !empty($_POST["searchtag"])) {
    $searchtag = $_POST["searchtag"];
} 
if (isset($_POST["user"])&& !empty($_POST["user"])) {
    $userfilter = $_POST["user"];
}
if (isset($_POST["state"]) && !empty($_POST["state"])) {
    $state = "freigegeben";
} 
if (isset($_POST["userstate"]) && !empty($_POST["userstate"])) {
    $userfilter = $_POST["userstate"];
    $state = "freigegeben";
} 


if ($searchtag != null || $userfilter != null || $state != null) {
    $a = $gettable->getPictureArray($searchtag, $searchtag, $searchtag, $state, $userfilter);

    //loop to show fancybox pictures with
    foreach ($a as $ab) {
        $href = $ab->getHref();
        echo "<div>";
        echo "<a href='pictures/full/$href' data-fancybox='mygallery'><img src='pictures/thumbnail/$href' class='img-thumbnail imgs'></img></a>";
        $name = $ab->getName();
        echo "<p>$name</p>";
        echo "</div>";
    }
}
