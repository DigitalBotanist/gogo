<?php 
require_login();

$data = $_POST;
$user_id = $_SESSION['user_id']; 

$sql = "INSERT INTO Message (Sender_Id, Receiver_Id, Message) VALUES ($user_id, {$data['receiver']}, '{$data['message']}');";
query_database($sql);


exit;