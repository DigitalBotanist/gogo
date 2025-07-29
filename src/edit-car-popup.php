<?php 

$car_id = $_POST['car_id']; 

$sql = "SELECT * FROM Car WHERE Car_Id = $car_id";
$car_info = query_database($sql)->fetch_assoc();
view('edit-car-popup-form', $car_info);

exit;