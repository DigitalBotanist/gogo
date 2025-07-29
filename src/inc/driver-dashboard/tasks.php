<?php 
$user_id = $_SESSION['user_id'];
$sql = "SELECT Rental_Id FROM Driver_Request WHERE Status = 'pending' AND Driver_Id = $user_id";
$result = query_database($sql); 

?>

<div class="driver-tasks">
    <h1 class="driver-tasks__title">New job requests</h1>
    <?php if($result->num_rows): ?>
        <div class="driver-tasks__container">
        <?php for($i=0;$i < $result-> num_rows;$i++):?>
            <?php 
                $rental_id = ($result->fetch_assoc())['Rental_Id'];
                $sql = "SELECT * FROM Rental where Rental_Id = $rental_id";  
                $rental_info = query_database($sql)->fetch_assoc();
                $sql = "SELECT * FROM Car WHERE Car_Id = {$rental_info['Car_Id']}";
                $car_info = query_database($sql)->fetch_assoc();
                $sql = "SELECT * FROM Person  where Person_Id = {$rental_info['Customer_Id']}";
                $customer_info = query_database($sql)->fetch_assoc(); 

            ?>
            <div class="driver-tasks__card">
                <img class="driver-tasks__img" src="<?php $img = $car_info['Car_Img'] ?? 'cars/default.jpg';echo getImage($img); ?>" alt="">
                <div class="driver-tasks__info">
                    <div class="driver-tasks__info-row">
                        <p class="driver-tasks__info-name">Customer Name: </p>
                        <p class="driver-tasks__info-details"><?= $customer_info['F_Name'] . " " . $customer_info['L_Name'] ?> </p>
                    </div>
                    <div class="driver-tasks__info-row">
                        <p class="driver-tasks__info-name">Car Type: </p>
                        <p class="driver-tasks__info-details"><?= $car_info['Car_Name'] ?> </p>
                    </div>
                    <div class="driver-tasks__info-row">
                        <p class="driver-tasks__info-name">Vehicle number plate: </p>
                        <p class="driver-tasks__info-details"><?= $car_info['VIN'] ?> </p>
                    </div>
                    <div class="driver-tasks__info-row">
                        <p class="driver-tasks__info-name">Pickup Location: </p>
                        <p class="driver-tasks__info-details"><?= $rental_info['Pickup_Location'] ?> </p>
                    </div>
                    <div class="driver-tasks__info-row">
                        <p class="driver-tasks__info-name">Return Location: </p>
                        <p class="driver-tasks__info-details"><?= $rental_info['Return_Location'] ?> </p>
                    </div>
                    <div class="driver-tasks__info-row">
                        <p class="driver-tasks__info-name">Day of departure: </p>
                        <p class="driver-tasks__info-details"><?= $rental_info['Rental_Date'] ?> </p>
                    </div>
                    <div class="driver-tasks__info-row">
                        <p class="driver-tasks__info-name">Day of returning: </p>
                        <p class="driver-tasks__info-details"><?= $rental_info['Return_Date'] ?> </p>
                    </div>
                </div>
                <div class="driver-tasks__btns">
                    <button data-id="<?= $rental_id ?>" class="driver-tasks__accept primary-button">Accept</button>
                    <button data-id="<?= $rental_id ?>" class="driver-tasks__reject red-btn">Reject</button>
                </div>
            </div>

        <?php endfor; ?>
        </div>
    <?php else: ?>
        <h1 class="driver-tasks__reject">There are no new requests</h1>
    <?php endif; ?>
</div>