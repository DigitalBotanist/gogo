<?php 
require_login();
$message_id = $_POST['message_id'];

$sql = "DELETE FROM Message WHERE Message_Id = $message_id"; 
query_database($sql);
exit; 