<?php
include('database_connection.php');

session_start();

echo fetch_user_chat_history($_SESSION['users']['ID'], $_POST['to_user_id'], $connect);