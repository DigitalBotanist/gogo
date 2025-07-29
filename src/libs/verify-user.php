<?php 

// verify if the user exist in the database 
function verify_user(array $data): array {
    $errors = [];

    $sql = "SELECT Person_Id, Permission_Level, Password from Person where email = '{$data['email']}'"; 
    $result = query_database($sql); 

    if ($result->num_rows <= 0) {
        $errors = ["email" => "Email does not exist."];
        return [false, $errors]; 
    }
    $row = $result->fetch_assoc(); 
    if ($row['Permission_Level'] == 'DEL') {
        $errors = ['email' => 'User account is Deleted'];
        return [false, $errors];
    }
    if (password_verify($data['password'], $row['Password'])) {
        session_regenerate_id();

        // set username in the session
        $_SESSION['user_id']  = $row['Person_Id'];
        $_SESSION['permission'] = $row['Permission_Level'];

        return [true, $errors];

    } else { 
        $errors = ['password' => 'Incorrect password'];
        return [false, $errors];
    }

}