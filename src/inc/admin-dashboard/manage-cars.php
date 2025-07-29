<?php 

    $sql = "SELECT * FROM Car";
    $car = query_database($sql);

    $sql = "SELECT * FROM Event"; 
    $events = query_database($sql);
?>


<!-- top bar -->
<div class="manage_car_search">
    <div>
        <?php
        /*
        // Check if query executed successfully
        if($car) {
            echo '<select name="car" id="car">';
            echo '<option value="All Cars">All Cars</option>';
        
            // Fetch each row and create an option for the dropdown
            while($row = mysqli_fetch_assoc($events)) {
                echo "<option value={$row['Event_Id']}>{$row['Event_Type']}</option>";
            }
        
            echo '</select>';
        } else {
            echo "Error fetching car details: " . mysqli_error($connection);
         }
        */
        ?>

    </div>
        <div class="manage_car_container">
        <!-- search box -->
            <!-- <input class="manage_car_search-box" type="text" name="query" placeholder="Search..."> -->
        </div>

        <div >
            <button class="primary-button manage_car_addbutton">
                Add Car
            </button>

        </div>
    </div>


    <!-- car info -->
	<table class="table">
		<tr>
            <th></th>
			<th>Id</th>
			<th>Car Name</th>
			<th>VIN</th>
			<th>Avaliability</th>
			<th>Price Per Day</th>
			<th>Transmission Type</th>
			<th>Fuel Type</th>
		</tr>
		<?php for($i=0;$i<mysqli_num_rows($car);$i++):?>
		<?php $row= $car->fetch_assoc();?>
		<tr>
			<td>
				<img class="table__img" src="<?php $img = $row['Car_Img'] ?? 'cars/default.jpg'; echo getImage($img); ?>" alt="user img" class="dashboard-profile__img">
			</td>
			<td><?php echo $row['Car_Id'] ?></td>
			<td><?php echo $row['Car_Name'] ?></td>
			<td><?php echo $row['VIN'] ?></td>
			<td><?php echo $row['Availability'] ?></td>
			<td><?php echo $row['Price_Per_Day'];?></td>
			<td><?php echo $row['Transmission_Type'];?></td>
			<td><?php echo $row['Fuel_Type'];?></td>

			<td><a data-id="<?= $row['Car_Id']?>" class="manage_car_edit_btn table__link">Edit</a></td>
			<td> <a class="table__link--red">Delete</a></td>
		</tr>
			<?php endfor; ?>
	</table>

 <!-- add user box -->
 <?php view('popup-box-top', ['popup_id' => 'admin-add-car']) ?>
        <form id="admin-car-add-box" class="profile-popup-form" action="" method="post">
            <input type="file" name="image" id="">
            <label for="car_name">Car Name</label>
            <input type="text" name="car_name" id="" value="" required>
            <label for="VIN">VIN</label>
            <input type="text" name="VIN" id="" value="" required>
            <label for="seat_no">Seat No</label>
            <input type="text" name="seat_no" id="" value="" required>
            <label for="year">Year</label>
            <input type="date" name="year" id="" value="" required>
            <label for="transmission">Transmission</label>
            <select name="transmission" id="" required>
              <option value="" disabled selected></option>
              <option value="automatic">Auto</option>
              <option value="manual">Manual</option>
            </select>
            <label for="fuel_type">Fuel Type</label>
            <select name="fuel_type" id="" required>
              <option value="" disabled selected></option>
              <option value="petrol">Petrol</option>
              <option value="diesel">Diesel</option>
            </select>
            <label for="price">Price Per Day</label>
            <input type="text" name="price" id="" value="" required>
            <input type="submit" value="Add User" class="primary-button">
            <input type="hidden" name="action" value="add-new-car">
        </form>
    <?php view('popup-box-bottom') ?>  

<!-- edit car box -->
 <?php view('popup-box-top', ['popup_id' => 'admin-edit-car']) ?>
        <form id="admin-car-edit-box" class="profile-popup-form" action="" method="post">
            
        </form>
    <?php view('popup-box-bottom') ?>  