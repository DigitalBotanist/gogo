<?php
$user_id = $_SESSION['user_id'];
if ($_GET['rental_id']) {
    $rental_id = $_GET['rental_id'];
} else {
    redirect_to('/home');
}

$sql = "SELECT Customer_Id FROM Rental WHERE Rental_Id = $rental_id";
$cid = (query_database($sql)->fetch_assoc())['Customer_Id']; 

if ($cid != $user_id) {
    redirect_to('/home');
}

$sql = "SELECT * FROM Rental WHERE Rental_Id = $rental_id";
$rental_info = query_database($sql)->fetch_assoc(); 

$sql = "SELECT * FROM Car WHERE Car_Id = {$rental_info['Car_Id']}";
$car_info = query_database($sql)->fetch_assoc(); 

$pickup_date = new DateTime($rental_info['Pickup_Date']);
$return_date = new DateTime($rental_info['Return_Date']);
$no_of_days = ($pickup_date->diff($return_date))->days + 1;

?>

<div class="rental-info">
    <h1 class="rental-info__title">Rental Id - <?= $rental_info['Rental_Id'] ?> </h1>
    <div class="rental-info__car">
        <img class="rental-info__img" src="<?php $img = $car_info['Car_Img'] ?? 'cars/default.jpg';echo getImage($img); ?>" alt="">
        <div>
            <h2 class="rental-info__car-title"><?= $car_info['Car_Name'] ?> </h2>
            <div class="vehicle__detail-box-container">
                <div class="vehicle__detail-box"><p><?= $car_info['Transmission_Type'] ?></p></div>
                <div class="vehicle__detail-box"><img src="public/assets/user-icon.svg" alt=""><p><?= $car_info['Seat_No'] ?> Seats</p></div>
                <div class="vehicle__detail-box"><p><?= $car_info['Transmission_Type'] ?></p></div>
                <div class="vehicle__detail-box"><p><?= $car_info['Fuel_Type'] ?></p></div>
                <div class="vehicle__detail-box"><p><?= date('Y', strtotime($car_info['Man_Year'])) ?></p></div>
            </div>
        </div>
    </div>
    <div class="rental-info__bottom">
        <div class="rental-info__rental">
            <div class="payment_dates">
                <div class="payment_dates_row">
                    <p class="payment__dates-label">Pickup Date</p>
                    <p class="payment__details-div"><?php echo $rental_info['Rental_Date'] ?> </p>
                </div>
                <div class="payment_dates_row">
                    <p class="payment__dates-label">Return Date</p>
                    <p class="payment__details-div"><?php echo $rental_info['Return_Date'] ?> </p>
                </div>
            </div>
            <div>
                <?php if ($current_rental['is_driver'] == true): ?>
                    <p class="payment__details-div">With Driver</p>
                <?php else: ?>
                    <p class="payment__details-div">Self Driver</p>
                <?php endif ?>
            </div>
            <div>
                <p class="payment__dates-label">Pickup Location</p>
                <p class="payment__details-div"><?php echo $rental_info['Pickup_Location'] ?></p>
            </div>
            <div>
                <p class="payment__dates-label">Return Location</p>
                <p class="payment__details-div"><?php echo $rental_info['Return_Location'] ?></p>
            </div>
            <div>
                <h1>Total: $<?= $no_of_days * $car_info['Price_Per_Day'] ?> </h1>
            </div>
        </div>
        <div class="rental-info__bottom-right">
            <div class="rental-info__verify">
                <div class="rental-info__verify-status"><?= $rental_info['Verification_Status'] == 'verified' ? 'Approved' : 'Pending' ?></div>
                <div class="rental-info__verify-row">
                    <p class="rental-info__verify-name">Payment Status:</p>
                    <p class="rental-info__verify-value"><?= $rental_info['Verification_Status'] ?></p>
                </div>
                <div class="rental-info__verify-row">
                    <p class="rental-info__verify-name">Driver Status:</p>
                    <?php 
                    if ($rental_info['With_Driver']) {
                        if ($rental_info['Driver_Id']) {
                            $sql = "SELECT Status FROM Driver_Request WHERE Driver_Id = {$rental_info['Driver_Id']} AND Rental_Id = {$rental_info['Rental_Id']}";
                            $driver_status = (query_database($sql)->fetch_assoc())['Status']; 
                        } else {
                            $driver_status = 'Pending';
                        }
                    } else {
                        $driver_status = 'Self Drive';
                    } ?>
                    <p class="rental-info__verify-value"><?= $driver_status ?></p>
                </div>
            </div>
            <a href="cancel-rental?id=<?= $rental_info['Rental_Id'] ?>"><button class="rental-info__cancel red-btn" name="btn" >Cancel Request</button></a>        
        </div>
    </div>
    </div>
</div>