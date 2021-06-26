<?php
//POST DATA
$user = $_POST['username'];
$password = $_POST['password'];
//API Url
$url = 'https://192.168.179.1:45456/api/Plan_ts/Login';

//Initiate cURL.
$ch = curl_init($url);

//The JSON data.
$jsonData = array(
    'user' =>  $user,
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

//Execute the request
$result = curl_exec($ch);

if($result != "0"){
    header("Location:../home.php");
}else{
    header("Location:../index.php");
            die();
}

?>