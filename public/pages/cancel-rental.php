<?php 


$rental_id = $_GET['id']; 

$sql = "UPDATE Rental SET Rental_Status = 'cancel' WHERE Rental_Id = $rental_id";
query_database($sql); 

echo "<script>alert('rental canceled') </script>"; 
redirect_to('/dashboard');

exit; 