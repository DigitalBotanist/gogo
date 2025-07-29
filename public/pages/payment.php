<?php 
require_login();
if (isset($_POST['pickup_date']) && isset($_SESSION['current_car'])) {
    $_SESSION['current_rental'] = $_POST;
} else {
    redirect_to('/home');
}

$permission = $_SESSION['permission'];

if ($permission != 'CUS') {
    echo "<script>alert('need to have a customer account'); window.location.replace('home');</script>"; 
    exit; 
}

$car_info = $_SESSION['current_car'];
$current_rental = $_POST; 

?>

<h1 class="payment_h">Payment Method</h1>

<div class="payment_page_all">

    <div class="payment_page">

        <form action="payment" method="post">

            <div class="payment_detail">

                <div class="payment_dates">

                    <div class="payment_dates_row">
                        <p class="payment__dates-label">Pickup Date</p>
                        <p class="payment__details-div"><?php echo $current_rental['pickup_date'] ?> </p>
                    </div>

                    <div class="payment_dates_row">
                        <p class="payment__dates-label">Return Date</p>
                        <p class="payment__details-div"><?php echo $current_rental['return_date'] ?> </p>
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
                    <p class="payment__details-div"><?php echo $current_rental['pickup_location'] ?></p>
                </div>
 
                <div>
                    <p class="payment__dates-label">Return Location</p>
                    <p class="payment__details-div"><?php echo $current_rental['return_location'] ?></p>
                </div>
            </div>
        </form>
    </div>

    <!-- card details form -->
        <div class="payment_Card_details">
            <h2 class="payment_heading">Payment Details</h2>
            <form id="payment-card-details" action="payment-verify" method="post">
                <div class="payment_row">
                    <label for="">Card Type</label>
                    <div class="payment_img-container">
                        <div class="payment__card-icon">
                            <input type="radio" name="card_type" id="visa-card" checked>
                            <label for="visa-card"><img class="paymnet_img1" src="public\assets\visa card.jpg"></label>
                        </div>
                        <div class="payment__card-icon">
                            <input type="radio" name="card_type" id="master-card">
                            <label for="master-card"><img class="paymnet_img1" src="public\assets\master card.jpg"></label>
                        </div>
                        <div class="payment__card-icon">
                            <input type="radio" name="card_type" id="american-card">
                            <label for="american-card"><img class="paymnet_img1" src="public\assets\american express.jpg"></label>
                        </div>
                    </div>
                </div><br>
                <!-- card no -->
                <div class="payment_row">
                    <label for="card_number">Card number</label>
                    <input type="text" name="card_number" required>
                </div><br>

                <div class="payment_row">
                    <label for="">Card expiration date</label>
                    <div class="payment_expire">
                        <select name="month" id="month" class="payment__select" required>
                            <option value="" disabled selected>Month</option>
                            <option value="01">January</option>
                            <option value="02">February</option>
                            <option value="03">March</option>
                            <option value="04">April</option>
                            <option value="05">May</option>
                            <option value="06">June</option>
                            <option value="07">July</option>
                            <option value="08">August</option>
                            <option value="09">September</option>
                            <option value="10">Octomber</option>
                            <option value="11">November</option>
                            <option value="12">December</option>
                        </select>
                        <select name="year" id="year" class="payment__select">
                            <option value="" disabled selected>Year</option>
                            <?php for($i = date("Y"); $i < date("Y") + 20 ; $i++)
                                echo "<option value='$i'>$i</option>";
                            ?>
                        </select>
                    </div>
                </div><br>

                <!-- cvv -->
                <div class="payment_row">
                    <label for="cvv" class="payment_row">CVV</label>
                    <input type="text" maxlength="3" name="cvv" required>
                </div><br>

                <div class="payment_row">
                    <label for="card_name">Card holder name</label>
                    <input type="text" name="card_name" required>
                </div><br>

                <div class="payment_password">
                    <input type="checkbox">
                    <label for="remember_pw">Remember card details</label>
                </div><br>

                <button class="payment_booking" type="submit">Book Now</button>
                <input type="hidden" name="action" value="payment-verify">
            </form>
        </div>
    </div>
</div>
