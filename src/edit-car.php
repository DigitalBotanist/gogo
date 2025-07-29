<?php 

$data = $_POST; 

$sql = "UPDATE Car SET Car_Name = '{$data['car_name']}', VIN = '{$data['VIN']}', Seat_No = '{$data['seat_no']}', Man_Year = '{$data['year']}', Transmission_Type = '{$data['transmission']}', Fuel_Type = '{$data['fuel_type']}', Price_Per_Day = {$data['price']} WHERE Car_Id = {$data['car_id']}";
query_database($sql);
echo $sql;
exit; 