<?php session_start(); ?>
<link rel="stylesheet" href="res/assets/css/main.css" />
<div class="container">
    <br>
    <!--Creates a Table to display the user administration for the admins -->
    <form method="post" action="utility/LoginAPI.php">
        <button type="submit" name="logout" id="logout" class="btn btn-color" style="float: right">Logout</button>
    </form>
    <h2 style="text-align: center">User Administration</h2>
    <br>
    <table class="table">
        <thead>
            <tr>
                <th>Username</th>
                <th>E-Mail</th>
                <th>Session ID</th>
                <th>Role</th>
            </tr>
        </thead>
        <tbody>

            <?php

            //API Url
            $url = 'https://192.168.179.1:45455/api/Plan_ts/GetUsers';
            //Initiate cURL.
            $ch = curl_init($url);
            //The JSON data.
            $jsonData = array(
                'user' =>  $_SESSION["user"],
                'sessionid' =>  $_SESSION["ID"]
            );        
            
            //Encode the array into JSON.
            $jsonDataEncoded = json_encode($jsonData);
            //Tell cURL that we want to send a POST request.
            curl_setopt($ch, CURLOPT_POST, 1);

            //Attach our encoded JSON string to the POST fields.
            curl_setopt($ch, CURLOPT_POSTFIELDS, $jsonDataEncoded);

            //Set the content type to application/json
            curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));

            //SSL certificate options
            $certificate_location = "./res/cert/conveyor_root.crt";
            curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, $certificate_location);
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, $certificate_location);

            //debug info
            curl_setopt($ch, CURLOPT_VERBOSE, true);
            $verbose = fopen('php://temp', 'w+');
            curl_setopt($ch, CURLOPT_STDERR, $verbose);


            //set return value
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

            // Execute the POST request
            $result = curl_exec($ch);   
           
            $exploded = explode("|", $result); 
            $users = array();
            foreach ($exploded as $u){
                 array_push($users, json_decode($u));
            }
            
        

            foreach ($users as $z) {
               
                    echo "<tr>";
                    echo "<td>$z->Username</td>";
                    echo "<td>$z->EMail</td>";
                    echo "<td>$z->SessionId</td>";
                    echo "<td>$z->Privileges</td>";                  
                    echo "</tr>";
                }
            
            ?>
        </tbody>
    </table>
</div>