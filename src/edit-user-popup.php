<?php 
$person_id = $_POST['person_id']; 

$sql = "SELECT * FROM Person WHERE Person_Id = $person_id"; 
$person = query_database($sql);

$data = $person->fetch_assoc(); 

view('user-add-popup-form', $data);

exit;