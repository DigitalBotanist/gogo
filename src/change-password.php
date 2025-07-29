<?php 

require_login();
$user_id = $_SESSION['user_id'];

$fields = [
    'old_password' => 'string | secure | required', 
    'new_password' => 'string | secure | required', 
    'new_password2' => 'string | secure | required | same: new_password'
];

[$data, $errors] = filter($_POST, $fields);
print_r($data);
if ($errors) {
    errorResponse($errors);
}

$sql = "SELECT Password FROM Person WHERE Person_Id = $user_id";
$old_hash = (query_database($sql)->fetch_assoc())['Password'];

if (!(password_verify($data['old_password'], $old_hash))) {
    $errors = ['old_password' => "password doesn't match"];
    errorResponse($errors);
}


$newPasswordHash = password_hash($data['new_password'], PASSWORD_BCRYPT);
$sql = "UPDATE Person SET Password = '$newPasswordHash' WHERE Person_Id = $user_id";
query_database($sql);


exit;