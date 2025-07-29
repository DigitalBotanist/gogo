<?php 

// return mysql result after querying 
function query_database($sql) {
    $conn = new mysqli (DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

    if ($conn->connect_error) {
        return null;
    }


    $result = $conn->query($sql); 

    $conn->close();
    return $result;

}