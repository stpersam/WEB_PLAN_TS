<?php



//set path & scan content of path into variable
$dir = ;
$a = scandir($dir);

//loop to show fancybox pictures with
foreach ($a as $ab) {
    if (is_file($dir . "/" . $ab)) {
        echo "<a href='pics/$ab' data-fancybox='mygallery'><img src='pics/$ab' class='img-thumbnail imgs'></img></a>";
    }
}
?>