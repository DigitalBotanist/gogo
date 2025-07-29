<?php 

require_login(); 

$person_id = $_POST['user_id'];

$sql = "UPDATE Person SET Permission_Level = 'DEL' WHERE Person_Id = $person_id"; 
query_database($sql);

exit;