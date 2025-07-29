
<?php for($i = 0; $i < mysqli_num_rows($cars); $i++): ?> 
    <?php $row = $cars->fetch_assoc(); ?> 
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
                    <p class="search-card__total-price">Total: <?php echo $rental_info['days'] * $row['Price_Per_Day'] ?></p>
                </div>
            </div>
    </div>
<?php endfor; ?> 