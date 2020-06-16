<?php



//set path & scan content of path into variable
$gettable = new DB();
$gettable->connect("pictures");


$a = $gettable->getPictureArray($_POST["name"],$_POST["name"],$_POST["name"],$_POST["name"]);

//loop to show fancybox pictures with
foreach ($a as $ab) {
        $href = $ab->getHref();
        echo "<a href='pictures/full/$href' data-fancybox='mygallery'><img src='pictures/thumbnail/$href' class='img-thumbnail imgs'></img></a>";
    
}
?>