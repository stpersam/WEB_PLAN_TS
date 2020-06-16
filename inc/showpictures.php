<?php



//connect to db/pictures
$gettable = new DB();
$gettable->connect("pictures");

//initate searchtag and get array of fitting SELECT
$searchtag = $_POST["searchtag"];
$a = $gettable->getPictureArray($searchtag, $searchtag, $searchtag,$searchtag,$searchtag);

//loop to show fancybox pictures with
foreach ($a as $ab) {
        $href = $ab->getHref();
        echo "<div>";
        echo "<a href='pictures/full/$href' data-fancybox='mygallery'><img src='pictures/thumbnail/$href' class='img-thumbnail imgs'></img></a>";
        $name = $ab->getName();
        echo "<p>$name</p>";
        echo "</div>";
}
