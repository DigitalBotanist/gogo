<?php 
// query current customers current rentals
$sql = "SELECT * FROM Rental where Customer_Id = {$_SESSION['user_id']} and Rental_Status = 'pending'";
$result = query_database($sql);
?>
<?php for($i = 0; $i < mysqli_num_rows($result); $i++): ?>
    <?php $row = $result->fetch_assoc() ?>
    <div class="user-rental-status-box">
        <div class="user-rental-status-item">
            <div class="user-rental-status-info">Pending</div>
            <div class="user-rental-status-info">Booking ID: <?= $row['Rental_Id'] ?></div>
            <div class="user-rental-status-info">
                <ul class="user-rental-status-list">
                    <li class="user-rental-status-point"><?= $row['Rental_Date'] ?></li>
                    <li class="user-rental-status-point"><?= $row['Return_Date'] ?></li>
                </ul>
            </div>
        </div>
        <div class="user-rental-status-item">
            <div class="user-rental-status-info">
                Driver: 
                <?php 
                if ($row['With_Driver']) {
                    echo $row['Driver_Id'] ? 'driver id' : 'Pending';
                } else {
                    echo 'Self Drive';
                } 
                ?>    
            <br />
            <?php 
            $sql = "SELECT Car_Name, VIN FROM Car where Car_Id = {$row['Car_Id']}"; 
            $car = query_database($sql)->fetch_assoc(); 
            echo $car['Car_Name'] . ' : ' . $car['VIN'];
            ?>
        </div>
            <div class="user-rental-status-info"><a href="rental-info?rental_id=<?= $row['Rental_Id'] ?>">Show details</a></div>
        </div>
    </div>
    <?php endfor; ?> 
