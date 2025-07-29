<?php 

$inputs = $_POST; 

$fields = [
    'Fname' => 'string | required',
    'Lname' => 'string | required', 
    'day' => 'int | required',
    'month' => 'int | required',
    'year' => 'int | required',
    'password' => 'string | secure | required',
    'password2' => 'string | same: password',
    'email' => 'string | email | required | unique: Person, email'
];

// sanitize and validate inputs
[$data, $errors] = filter($inputs, $fields);

if ($errors) {
    errorResponse($errors);
}

$passwordHash = password_hash($data['password'], PASSWORD_BCRYPT);
$sql = "INSERT INTO Person(F_Name, L_Name, DOB, Permission_Level, Email, Password) VALUES ('{$data['Fname']}','{$data['Lname']}','{$data['year']}-{$data['month']}-{$data['day']}','CUS','{$data['email']}','$passwordHash');"; 
$result = query_database($sql); 

$sql = "SELECT Person_Id from Person where Email = '{$data['email']}'"; 
$user_id = query_database($sql)->fetch_assoc()['Person_Id']; 

$sql = "INSERT INTO Customer(Customer_Id) VALUES ($user_id)"; 
echo $sql;
$result = query_database($sql); 

[$is_verified, $errors] = verify_user(['email' => $data['email'], 'password' => $data['password']]);
if (!$is_verified) {
    errorResponse($errors);
} else {
    successfulResponse(); 
}