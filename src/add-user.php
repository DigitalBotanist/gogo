<?php 

$sql = "SELECT Permission_Level FROM Person WHERE Person_Id = {$_SESSION['user_id']}"; 
$user_permission = (query_database($sql)->fetch_assoc())['Permission_Level'];

if ($user_permission !== 'ADM') {
    redirect_to('/home');
}

$new_user = $_POST; 
$district = $new_user['district'] ?? NULL;
$town = $new_user['town'] ?? NULL;
$street_no = $new_user['street_no'] ?? NULL;
$province = $new_user['province'] ?? NULL;
$passwordHash = password_hash($new_user['password'], PASSWORD_BCRYPT);

$sql = "INSERT INTO Person(F_Name, L_Name, DOB, Permission_Level, District, Province, Town, StreetNo, Email, Password) VALUES ('{$new_user['f_name']}', '{$new_user['l_name']}','{$new_user['dob']}', '{$new_user['role']}', '$district', '$province', '$town', '$street_no', '{$new_user['email']}', '$passwordHash');";
$result = query_database($sql); 

$sql = "SELECT MAX(Person_Id) as person_id from Person";
$user_id = (query_database($sql)->fetch_assoc())['person_id'];


switch ($new_user['role']) {
    case 'ADM': 
        $sql = "INSERT INTO Staff VALUES ($user_id, 20, 100000)"; 
        echo $sql;
        query_database($sql);
        echo 'this';
        break;
    case 'STF': 
        $sql = "INSERT INTO Staff VALUES ($user_id, 20, 100000)"; 
        query_database($sql);
        echo 'stf';
        break;
    case 'MNG': 
        $sql = "INSERT INTO Staff VALUES ($user_id, 20, 100000)"; 
        query_database($sql);
        echo 'mn';
        break;
    case 'DRV': 
        $sql = "INSERT INTO Driver VALUES ($user_id, '1234567890', 100000)"; 
        query_database($sql);
        echo 'dr';
        break;
    case 'CUS': 
        $sql = "INSERT INTO Customer(Customer_Id) VALUES ($user_id)"; 
        query_database($sql);
        echo 'cus';
        break;
}
echo $sql; 

exit; 