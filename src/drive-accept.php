<?php 

$rental_id = $_POST['rental_id'];
$sql = "UPDATE Driver_Request SET Status = 'accepted' WHERE Rental_Id = $rental_id";
echo $sql;
query_database($sql);


exit; 