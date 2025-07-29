<?php 
$data = $_POST; 

if ($data['payment_status'] == 'verified') {
    if (!(isset($data['driver']))) {
        // update verification status 
        $sql = "UPDATE Rental SET Verification_Status = 'verified' WHERE Rental_Id = {$data['rental_id']}"; 
        query_database($sql);
    }
    elseif ($data['driver'] == 'done' || $data['driver'] == 'self') {
        // update verification status 
        $sql = "UPDATE Rental SET Verification_Status = 'verified' WHERE Rental_Id = {$data['rental_id']}"; 
        query_database($sql);
    } else {
        // add to driver request table 
        $sql = "INSERT INTO Driver_Request VALUES ({$data['driver']}, {$data['rental_id']}, 'pending') "; 
        query_database($sql);
        // update verification status and driver id
        $sql = "UPDATE Rental SET Verification_Status = 'verified', Driver_Id = {$data['driver']} WHERE Rental_Id = {$data['rental_id']}"; 
        query_database($sql);
    }
} else {
    if (!($data['driver'] == 'done' || $data['driver'] == 'self')) {
        // add driver to the rental 
        $sql = "INSERT INTO Driver_Request VALUES ({$data['driver']}, {$data['rental_id']}, 'pending') "; 
        query_database($sql);
        $sql = "UPDATE Rental SET Driver_Id = {$data['driver']} WHERE Rental_Id = {$data['rental_id']}"; 
        query_database($sql);
    }
} 
exit;