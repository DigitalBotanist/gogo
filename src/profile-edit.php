<?php 
$user_info = $_POST;
$user_id = $_SESSION['user_id'];

$sql = "UPDATE Person SET Email = '{$user_info['email']}', DOB = '{$user_info['dob']}', StreetNo = '{$user_info['street_no']}', Town = '{$user_info['town']}', District = '{$user_info['district']}', Province = '{$user_info['province']}' WHERE Person_Id = $user_id";
$result = query_database($sql);

exit;