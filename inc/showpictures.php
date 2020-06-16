<?php



//set path & scan content of path into variable
$gettable = new DB();
$gettable->connect("pictures");


$a = $gettable->getPictureArray($_POST["name"],$_POST["name"],$_POST["name"],$_POST["name"]);

//loop to show fancybox pictures with
foreach ($a as $ab) {
        $href = $ab->getHref();
        echo "<a href='pics/$href' data-fancybox='mygallery'><img src='pics/$ab' class='img-thumbnail imgs'></img></a>";
    
}
?>