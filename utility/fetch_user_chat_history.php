<?php
include('database_connection.php');
session_start();
// fetches the chat history of a specific user
echo fetch_user_chat_history($_SESSION['users']['ID'], $_POST['to_user_id'],$connect);