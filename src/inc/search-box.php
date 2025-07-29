<?php

if (isset($data)) {
    foreach($data as $key => $value) {
        $$key = $value;
    }
} 


?>

<div class="search-box">
    <form action="search" class="search-box__form">
        <div class="search-box__input-container">
            <label class="search-box__label" for="pickup-location"
                >Pick-up Location</label
            >
            <select 
                name="pickup-location" 
                id="" 
                required
                class="search-box__input"
            >
                <option value="" disabled selected></option>
                <option value="colombo"<?php if ($pickup_location == 'colombo') echo 'selected' ?>>Colombo</option>
                <option value="kandy" <?php if ($pickup_location == 'kandy') echo 'selected' ?>>Kandy</option>
                <option value="galle"<?php if ($pickup_location == 'galle') echo 'selected' ?>>Galle</option>
                <option value="mathale"<?php if ($pickup_location == 'mathale') echo 'selected' ?>>Mathale</option>
            </select>


        </div>
        <div class="search-box__input-container">
            <label class="search-box__label" for="return-location"
                >Return Location</label
            >

            <select 
                name="return-location" 
                id="" 
                required
                class="search-box__input"
            >
                <option value="" disabled selected></option>
                <option value="colombo"<?php if ($return_location == 'colombo') echo 'selected' ?>>Colombo</option>
                <option value="kandy" <?php if ($return_location == 'kandy') echo 'selected' ?>>Kandy</option>
                <option value="galle"<?php if ($return_location == 'galle') echo 'selected' ?>>Galle</option>
                <option value="mathale"<?php if ($return_location == 'mathale') echo 'selected' ?>>Mathale</option>
            </select>

        </div>
        <div class="search-box__input-container">
            <label class="search-box__label" for="pickup-date"
                >Pick-up Date</label
            >
            <input
                class="search-box__input"
                type="date"
                name="pickup-date"
                id="pickup-date"
                value="<?php echo $pickup_date ?? ''?>"
                required
            />
        </div>
        <div class="search-box__input-container">
            <label class="search-box__label" for="return-date"
                >Return Date</label
            >
            <input
                class="search-box__input"
                type="date"
                name="return-date"
                id="return-date"
                value="<?php echo $return_date ?? ''?>"
                required
            />
        </div>
        <div class="search-box__input-container">
            <label class="search-box__label">&nbsp;</label>
            <input class="search-box__btn" type="submit" value="Search" />
        </div>
    </form>
</div>
