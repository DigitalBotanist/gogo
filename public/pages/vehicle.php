<?php 

$car_id = $_GET['id'];
$sql = "Select * from Car where Car_Id = $car_id";
$result = query_database($sql); 

if ($result->num_rows > 0) {
    $car_info = $result->fetch_assoc();
}
$current_rental = unserialize($_COOKIE['rental-info']);
$pickup_location = $current_rental['pickup_location'];
$return_location = $current_rental['return_location'];

$_SESSION['current_car'] = $car_info; 
?>


<div class="vehicle-page">
    <div class="vehicle">
        <img class="vehicle__img" src="<?php $img = $car_info['Car_Img'] ?? 'cars/default.jpg';echo getImage($img); ?>" alt="">
        <div class="vehicle__info">
            <h1 class="vehicle__name"><?= $car_info['Car_Name'] ?></h1>
            <div class="vehicle__detail-box-container">
                <div class="vehicle__detail-box"><p><?= $car_info['Transmission_Type'] ?></p></div>
                <div class="vehicle__detail-box"><img src="public/assets/user-icon.svg" alt=""><p><?= $car_info['Seat_No'] ?> Seats</p></div>
                <div class="vehicle__detail-box"><p><?= $car_info['Transmission_Type'] ?></p></div>
                <div class="vehicle__detail-box"><p><?= $car_info['Fuel_Type'] ?></p></div>
                <div class="vehicle__detail-box"><p><?= date('Y', strtotime($car_info['Man_Year'])) ?></p></div>
            </div>
            <p class="vehicle__day-price"><span class="vehicle__day-price-no">Rs.<span id="vehicle__price-per-day"><?= $car_info['Price_Per_Day'] ?></span></span>/Day</p>    
            <form action="payment" class="vehicle__rental-form" method="post">
                <div class="vehicle__dates-container">
                    <div>
                        <label class="vehicle__input-label" for="pickup_date">Pickup Date</label>
                        <input id="vehicle__pickup-date" class="vehicle__input" type="date" name="pickup_date" required value="<?= $current_rental['pickup_date'] ?>">
                    </div>
                    <div>
                        <label class="vehicle__input-label" for="return_date">Return Date</label>
                        <input id="vehicle__return-date" class="vehicle__input" type="date" name="return_date" required value="<?= $current_rental['return_date'] ?>">
                    </div>

                </div>

                <div>
                    <label for="" class="vehicle__input-label">Driver options: </label>
                    <div class="vehicle__driver-div">
                        <input class="vehicle__radio-input" type="radio" id="withDriver" name="is_driver" value="true" checked>
                        <label for="withDriver">With Driver</label>
                        <input class="vehicle__radio-input" type="radio" id="withoutDriver" name="is_driver" value="false">
                        <label for="withoutDriver">Self Drive</label>
                    </div>
                </div>

                <div>
                    <label for="" class="vehicle__input-label">Pickup location:</label>
                    <select
                        name="pickup_location"
                        id=""
                        required
                        class="vehicle__input"
                    >
                        <option value="" disabled selected></option>
                        <option value="colombo"<?php if ($pickup_location == 'colombo') echo 'selected' ?>>Colombo</option>
                        <option value="kandy" <?php if ($pickup_location == 'kandy') echo 'selected' ?>>Kandy</option>
                        <option value="galle"<?php if ($pickup_location == 'galle') echo 'selected' ?>>Galle</option>
                        <option value="mathale"<?php if ($pickup_location == 'mathale') echo 'selected' ?>>Mathale</option>
                    </select>
                </div>
                <div>
                    <label for="" class="vehicle__input-label">Return location:</label>
                    <select
                        name="return_location"
                        id=""
                        required
                        class="vehicle__input"
                    >
                        <option value="" disabled selected></option>
                        <option value="colombo"<?php if ($pickup_location == 'colombo') echo 'selected' ?>>Colombo</option>
                        <option value="kandy" <?php if ($pickup_location == 'kandy') echo 'selected' ?>>Kandy</option>
                        <option value="galle"<?php if ($pickup_location == 'galle') echo 'selected' ?>>Galle</option>
                        <option value="mathale"<?php if ($pickup_location == 'mathale') echo 'selected' ?>>Mathale</option>
                    </select>
                </div>

                <p class="vehicle__day-price"><span class="vehicle__day-price-no">Total: Rs.<span id="vehicle__total-price"><?= $current_rental['days'] * $car_info['Price_Per_Day'] ?></span></span></p>    
                <button type="submit" class="primary-button vehicle__book-btn">Book Now</button>
            </form>
        </div>
    </div>
</div>