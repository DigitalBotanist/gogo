<?php 
// query all the rental without verification or if the rental request driver and not assigned yet
$sql = "SELECT * FROM Rental WHERE (NOT Verification_Status = 'verified') OR (With_Driver = true AND Driver_Id is NULL)";
$result = query_database($sql);
?>

<!-- show rental information -->
<?php for($i = 0; $i < mysqli_num_rows($result); $i++): ?>
    <?php $row = $result->fetch_assoc() ?>

    <?php 
    $sql = "SELECT Car_Name, VIN, Transmission_Type, Seat_No FROM Car WHERE Car_Id = {$row['Car_Id']}";
    $car_info = query_database($sql)->fetch_assoc(); 
    ?> 

	<!-- rental card -->
    <div class="staff_task_container">
		<div class="booking_header">
			<h2>New Booking</h2>
			<p>Booking ID: <?= $row['Rental_Id'] ?></p>
			<div class="staff_date">
			<span>Rental Date: <?= $row['Rental_Date'] ?></span><br>
			<span>Return Date: <?= $row['Return_Date'] ?><span>
			</div>
		</div>
        <hr>
        <div class="staff_content">
            <div class="staff_car">
              <span><?= $car_info['Car_Name'] ?></span><br>
              <span><?= $car_info['VIN'] ?></span>
            </div>
            <div class="staff_car_transmission">
              <span><?= $car_info['Transmission_Type'] ?></span><br>
              <span><?= $car_info['Seat_No'] ?> Seater</span>
            </div>
            <div class="staff_car_pickup">
              <span>Pick Up: <?= $row['Pickup_Location'] ?></span><br>
              <span>Drop: <?= $row['Return_Location'] ?></span><br>
            </div>
            <div class="staff_select">

			<!-- verification form -->
            <form action="" class="verify-rental-form">
				<label class="staff_driver_label"for="driver">Driver:</label>
				
				<!-- select driver -->
				<select name="driver" class="staff_driver_container_select" >
                  	<option value='' disabled selected ></option>
					<?php if (isset($row['Driver_Id'])): ?>
						<?php
						// display if the driver already exist
						$sql = "SELECT F_Name, L_Name, Person_Id FROM Person WHERE Person_Id = {$row['Driver_Id']}";
						$driver = query_database($sql)->fetch_assoc();
						?>
						<option value="done" selected><?= $driver['F_Name'] . ' ' . $driver['L_Name'] ?></option>
					<?php elseif($row['With_Driver']): ?>
						<?php
						// display all the drivers 
						$sql = "SELECT F_Name, L_Name, Person_Id FROM Person WHERE Permission_Level = 'DRV'";
						$driver = query_database($sql);
						for($j = 0; $j < mysqli_num_rows($driver); $j++):
						$driver_info = $driver->fetch_assoc();
						?>
						<option value="<?= $driver_info['Person_Id'] ?>"><?= $driver_info['F_Name'] . ' ' . $driver_info['L_Name'] ?></option>
						<?php endfor; ?>
					<?php else: ?>
						<!-- self drive -->
						<option value="self" selected>Self Drive</option>
					<?php endif; ?> 
				</select>
				<br>
				<label class="staff_verify_label"for="payment_status">Payment Status:</label>
				<select class="staff_verify_container_select" name="payment_status">
					<option value="verified" <?= $row['Verification_Status'] == 'verified' ? 'selected' : null ?>>Verified</option>
					<option value="not_verified" <?= $row['Verification_Status'] != 'verified' ? 'selected' : null ?>>Not Verified</option>
				</select>
				<button class="staff_task_button" type="submit">Confirm</button>
				<input type="hidden" name="rental_id" value="<?= $row['Rental_Id'] ?>">
				<input type="hidden" name="action" value="verify-rental">
            </form>
            </div>
    </div>
    </div>
    <?php endfor; ?> 