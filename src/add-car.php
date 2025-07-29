<?php

$data = $_POST; 

$sql = "INSERT INTO Car(Car_Name, VIN, Availability, Seat_No, Price_Per_Day, Man_Year, Transmission_Type, Fuel_Type)  VALUES ('{$data['car_name']}', '{$data['VIN']}', 'Available', {$data['seat_no']}, {$data['price']}, '{$data['year']}', '{$data['transmission']}', '{$data['fuel_type']}')";
query_database($sql);
exit; 