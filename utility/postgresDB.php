<?php

class postgresDB
{
    
    function connect()
    {
        return pg_connect("host=localhost dbname=PlantsDB user=postgres password=");        
    }
}

?>
