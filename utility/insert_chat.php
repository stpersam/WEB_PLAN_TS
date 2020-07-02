<?php
include "database_connection.php";
session_start();

// insert chat messages into the database and calls the fetch_user_chat_history method

$data = array(
    ':to_user_id'  => $_POST['to_user_id'],
    ':from_user_id'  => $_SESSION['users']['ID'],
    ':chat_message'  => $_POST['chat_message'],
    ':status'   => '1'
);
$query = "INSERT INTO chat_message (to_user_id, from_user_id, chat_message, status) VALUES (?,?,?,?)";
$statement = $connect->prepare($query);
$statement->bind_param('iisi', $data[":to_user_id"],$data[":from_user_id"],$data[":chat_message"],$data[":status"]);
$temp = $statement->execute();

if($temp)
{
    echo fetch_user_chat_history($_SESSION['users']["ID"], $_POST['to_user_id'],$connect);
}

?>
