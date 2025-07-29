<?php 
$data = [
    'pickup_location' => $_GET['pickup-location'],
    'return_location' => $_GET['return-location'],
    'pickup_date' => $_GET['pickup-date'],
    'return_date' => $_GET['return-date']
];

$pickup_date = new DateTime($data['pickup_date']);
$return_date = new DateTime($data['return_date']);
$no_of_days = ($pickup_date->diff($return_date))->days + 1;

$data['days'] = $no_of_days; 
setcookie('rental-info', serialize($data)); 
$sql = "SELECT * FROM Event";
$events = query_database($sql);

$sql = "SELECT * FROM Car where Availability = 'Available' and not Car_Id in (select Car_Id from Rental where Rental_Status = 'pending' and Rental_Date between '{$data['pickup_date']}' and '{$data['return_date']}' or Return_date between '{$data['pickup_date']}' and '{$data['return_date']}')";
$cars = query_database($sql);
?>

<div class="search-page">
    <!-- search box -->
    <div class="search-page__search-box-container"><?php view('search-box', $data);?></div>

    <div class="search-page__content">

        <!-- filter -->
        <section class="search-filter">
            <h4 class="search-filter__title">Filter</h4>
            <form action="" class="search-filter__form">
                <label for="event" class="search-filter__label">Event type:</label>
                <select name="event" class="search-filter__select" id="event-select">
                    <option value="any" selected>Any</option>
                    <?php for($i = 0; $i < mysqli_num_rows($events); $i++):?> 
                        <?php $row = $events->fetch_assoc();?> 
                            <option value="<?= $row['Event_Id'] ?>"><?= $row['Event_Type'] ?></option>
                        <?php endfor; ?>
                </select>
                <label for="transmission" class="search-filter__label">Transmission type:</label>
                <select name="transmission" class="search-filter__select" id="transmission-select">
                    <option value="any" selected>Any</option>
                    <option value="automatic">Automatic</option>
                    <option value="manual">Manual</option>
                </select>
                <label for="price" class="search-filter__label">Price range:</label>
                <select name="price" class="search-filter__select" id="price-select">
                    <option value="any" selected>Any</option>
                    <option value="asc">Ascending</option>
                    <option value="desc">Descending</option>
                </select>
            </form>
        </section>

        <hr>
        <!-- card container -->
        <div class="search-page__card-container">
            <?php for($i = 0; $i < mysqli_num_rows($cars); $i++): ?> 
                <?php $row = $cars->fetch_assoc();?> 
                <div class="search-page__card search-card">
                    <a href="vehicle?id=<?php echo $row['Car_Id'] ?>" class="search-card__link">
                    </a>
                        <img src="<?php $img = $row['Car_Img'] ?? 'cars/default.jpg';echo getImage($img); ?>" alt="">
                        <div class="search-card__info">
                            <h3 class="search-card__h3"><?= $row['Car_Name'] ?> </h3>
                            <div class="search-card__detail-box-container">
                                <div class="search-card__detail-box"><img src="public/assets/user-icon.svg" alt=""><p><?= $row['Seat_No'] ?></p></div>
                                <div class="search-card__detail-box"><p><?= $row['Transmission_Type'] ?></p></div>
                                <div class="search-card__detail-box"><p><?= $row['Fuel_Type'] ?></p></div>
                            </div>
                            <div class="search-card__price-div">
                                <p class="search-card__day-price"><span class="search-card__day-price-no">Rs.<?= $row['Price_Per_Day'] ?></span>/Day</p>
                                <p class="search-card__total-price">Total: <?php echo $no_of_days * $row['Price_Per_Day'] ?></p>
                            </div>
                        </div>
                </div>
            <?php endfor; ?> 
        </div>
    </div>
</div>