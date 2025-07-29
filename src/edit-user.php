<?php 

$sql = "SELECT Permission_Level FROM Person WHERE Person_Id = {$_SESSION['user_id']}"; 
$user_permission = (query_database($sql)->fetch_assoc())['Permission_Level'];

if ($user_permission !== 'ADM') {
    redirect_to('/home');
}

$user_info = $_POST; 
$district = $user_info['district'] ?? NULL;
$town = $user_info['town'] ?? NULL;
$street_no = $user_info['street_no'] ?? NULL;
$province = $user_info['province'] ?? NULL;
if (isset($user_info['password'])) {
    $passwordHash = password_hash($user_info['password'], PASSWORD_BCRYPT);
}
$sql = "UPDATE Person SET F_Name = '{$user_info['f_name']}', L_Name = '{$user_info['l_name']}', Email = '{$user_info['email']}', DOB = '{$user_info['dob']}', StreetNo = '{$user_info['street_no']}', Town = '{$user_info['town']}', District = '{$user_info['district']}', Province = '{$user_info['province']}' WHERE Person_Id = {$user_info['person_id']}";
echo $sql;
$result = query_database($sql);


exit; 