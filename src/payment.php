<?php

require_login();
if ($_SESSION['permission'] !== 'CUS') {
    echo 'not an customer';
}

if (!(isset($_SESSION['current_car']) && isset($_SESSION['current_rental']))) {
    redirect_to('/home');
}

$current_car = $_SESSION['current_car'];
$current_rental = $_SESSION['current_rental'];

$user_id = $_SESSION['user_id'];
$inputs = $_POST; 

//filter

$fields = [
    'card_number' => 'int | required', 
    'month' => 'int | required',
    'year' => 'int | required',
    'cvv' => 'int | required', 
    'card_name' => 'string | required'
];

[$payment_details, $errors] = filter($inputs, $fields); 

if ($errors) {
    errorResponse($errors);
}


// calculate total amount 
$pickup_date = new DateTime($current_rental['pickup_date']);
$return_date = new DateTime($current_rental['return_date']);
$no_of_days = ($pickup_date->diff($return_date))->days + 1;
$amount = $no_of_days * $current_car['Price_Per_Day']; 

// insert to payment table 
$sql = "INSERT INTO Payment(Date_Time, Amount, Card_No) VALUES (NOW(), {$amount}, '{$payment_details['card_number']}')";
$result = query_database($sql); 

// get payment id 
$sql = "SELECT MAX(Payment_Id) as payment_id from Payment";
$payment_id = (query_database($sql)->fetch_assoc())['payment_id'];

$sql = "INSERT INTO Rental(Customer_Id, Car_Id, Rental_Status, Rental_Date, Return_Date, Verification_Status, Pickup_Location, Return_Location, Payment_Id, With_Driver) VALUES ($user_id, {$current_car['Car_Id']}, 'pending', '{$current_rental['pickup_date']}', '{$current_rental['return_date']}', 'pending', '{$current_rental['pickup_location']}', '{$current_rental['return_location']}', $payment_id, {$current_rental['is_driver']})";
$result = query_database($sql); 

session_flash('current_car', 'current_rental');
exit;