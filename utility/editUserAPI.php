<?php
session_start();

// validates the data what came from the registerForm.php

// checks if the passwords are the same
if ($_POST["password"] == $_POST["passwordBest"]) {
    $password = $_POST['password'];
} else {
    header("Location: ../index.php");
    die();
}

//The JSON data.
$jsonData1 = array(
    'user' =>  $_POST["username"],
    'password' =>  $password
);

//API Url
if ($_POST["submit"] == "loeschen") {
    $url = 'https://192.168.179.1:45455/api/Plan_ts/DeleteUser';    
    $jsonData = array(
        'actionstring' =>  "loeschen",
        'loginData' =>  $jsonData1
    );
} else if ($_POST["submit"] == "speichern") {
    $url = 'https://192.168.179.1:45455/api/Plan_ts/AdminEditUser';
    $jsonData2 = array(
        'user' =>  $_SESSION["user"],
        'sessionid' =>  $_SESSION["ID"]
    );
    $jsonData3 = array(
        'loginData' =>  $jsonData1,
        'email' =>  $_POST["email"]
    );
    $jsonData = array(
        'USDAdmin' =>  $jsonData2,
        'userData' =>  $jsonData3,
        'action' => $password
    );
} else {
    header("Location: ../index.php");
    die();
}

//Initiate cURL.
$ch = curl_init($url);

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


    rewind($verbose);
    $verboseLog = stream_get_contents($verbose);

    echo "Verbose information:\n<pre>", htmlspecialchars($verboseLog), "</pre>\n";
} else {
    header("Location:../index.php");
}
