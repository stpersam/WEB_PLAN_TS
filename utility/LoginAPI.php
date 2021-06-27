<?php
session_start();
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    if (filter_has_var(INPUT_POST, "logout")) {
        $_SESSION["user"] = null;
        header("Location: ../index.php");
        die();
    } else {

        $_SESSION["user"] = $_POST['username'];
        $password = $_POST['password'];


        //API Url
        $url = 'https://192.168.179.1:45455/api/Plan_ts/Login';
        //Initiate cURL.
        $ch = curl_init($url);
        //The JSON data.
        $jsonData = array(
            'user' =>  $_SESSION["user"],
            'password' =>  $password
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

        // Close cURL resource
        curl_close($ch);

        if ($result == false) {
            printf(
                "cUrl error (#%d): %s<br>\n",
                curl_errno($ch),
                htmlspecialchars(curl_error($ch))
            );
            $_SESSION["ID"] = "0";


            rewind($verbose);
            $verboseLog = stream_get_contents($verbose);

            echo "Verbose information:\n<pre>", htmlspecialchars($verboseLog), "</pre>\n";
        } else {
            $_SESSION["ID"] = $result;
            if ($_SESSION["ID"] > 0) {
                $_SESSION["isadmin"] = true;
            }
            header("Location:../index.php");
        }
    }
}
