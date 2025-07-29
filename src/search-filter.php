<?php 
$filter_type = $_POST['type'];
$filter_value = $_POST['value'];

$rental_info = unserialize($_COOKIE['rental-info']);

switch ($filter_type) {
    case 'event': 
        eventFilter($rental_info, $filter_value);
        break; 
    case 'transmission':
        transmissionFilter($rental_info, $filter_value);
        break;
    case 'price':
        priceFilter($rental_info, $filter_value);
        break;
}

function priceFilter($rental_info, $order) {
    if ($order == 'any') {
        $sql = "SELECT * FROM Car where Availability = 'Available' and not Car_Id in (select Car_Id from Rental where Rental_Status = 'pending' and Rental_Date between '{$rental_info['pickup_date']}' and '{$rental_info['return_date']}' or Return_date between '{$rental_info['pickup_date']}' and '{$rental_info['return_date']}')";
    } else {
        $sql = "SELECT * FROM Car where Availability = 'Available' and not Car_Id in (select Car_Id from Rental where Rental_Status = 'pending' and Rental_Date between '{$rental_info['pickup_date']}' and '{$rental_info['return_date']}' or Return_date between '{$rental_info['pickup_date']}' and '{$rental_info['return_date']}') order by Price_Per_Day $order" ;
    }
    $cars = query_database($sql);

    view('search-cards', ['cars' => $cars]);

}

function transmissionFilter($rental_info, $type) {
    if ($type == 'any') {
        $sql = "SELECT * FROM Car where Availability = 'Available' and not Car_Id in (select Car_Id from Rental where Rental_Status = 'pending' and Rental_Date between '{$rental_info['pickup_date']}' and '{$rental_info['return_date']}' or Return_date between '{$rental_info['pickup_date']}' and '{$rental_info['return_date']}')";
    } else {
        $sql = "SELECT * FROM Car where Availability = 'Available' and Transmission_Type = '$type' and not Car_Id in (select Car_Id from Rental where Rental_Status = 'pending' and Rental_Date between '{$rental_info['pickup_date']}' and '{$rental_info['return_date']}' or Return_date between '{$rental_info['pickup_date']}' and '{$rental_info['return_date']}')" ;
    }

    $cars = query_database($sql);

    view('search-cards', ['cars' => $cars]);
}

function eventFilter($rental_info, $event_id) {
    if ($event_id == 'any') {
        $sql = "SELECT * FROM Car where Availability = 'Available' and not Car_Id in (select Car_Id from Rental where Rental_Status = 'pending' and Rental_Date between '{$rental_info['pickup_date']}' and '{$rental_info['return_date']}' or Return_date between '{$rental_info['pickup_date']}' and '{$rental_info['return_date']}')";
    } else {
        $sql = "SELECT * FROM Car where Availability = 'Available' and not Car_Id in (select Car_Id from Rental where Rental_Status = 'pending' and Rental_Date between '{$rental_info['pickup_date']}' and '{$rental_info['return_date']}' or Return_date between '{$rental_info['pickup_date']}' and '{$rental_info['return_date']}') AND Car_ID IN (SELECT Car_Id from Car_Event where Event_Id = '$event_id')" ;
    }
    $cars = query_database($sql);

    view('search-cards', ['cars' => $cars]);
}


?>

<?php 
exit
?>