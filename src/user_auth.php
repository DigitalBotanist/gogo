<?php 

require_once __DIR__ . '/bootstrap.php';

$inputs = [
    'email' => $_POST['email'],
    'password' => $_POST['password']
];

$fields = [
    'email' => 'email | required | email ',
    'password' => 'string | required | secure' 
]; 

// check input data is valid or not 
[$data, $errors] = filter($inputs, $fields); 

// if there is errors send a response
if ($errors) {
    errorResponse($errors);
}

// check if the user exist or not 
[$is_verified, $errors] = verify_user($data);

if (!$is_verified) {
    // if there is errors send a response
    errorResponse($errors);
} else {
    $msg = ['status' => 'successfull'];
    echo json_encode($msg); 
}


