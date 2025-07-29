<input type="file" name="image" id="">
            <label for="car_name">Car Name</label>
            <input type="text" name="car_name" id="" value="<?= $Car_Name ?>" required>
            <label for="VIN">VIN</label>
            <input type="text" name="VIN" id="" value="<?= $VIN ?>" required>
            <label for="seat_no">Seat No</label>
            <input type="text" name="seat_no" id="" value="<?= $Seat_No ?>" required>
            <label for="year">Year</label>
            <input type="date" name="year" id="" value="<?= $Man_Year ?>" required>
            <label for="transmission">Transmission</label>
            <select name="transmission" id="" required>
              <option value="" disabled selected></option>
              <option value="automatic" <?= $Transmission_Type == 'automatic' ? 'selected' : null ?>>Auto</option>
              <option value="manual" <?= $Transmission_Type == 'manual' ? 'selected' : null ?>>Manual</option>
            </select>
            <label for="fuel_type">Fuel Type</label>
            <select name="fuel_type" id="" required>
              <option value="" disabled selected></option>
              <option value="petrol" <?= $Fuel_Type == 'petrol' ? 'selected' : null ?> >Petrol</option>
              <option value="diesel" <?= $Fuel_Type == 'diesel' ? 'selected' : null ?>>Diesel</option>
            </select>
            <label for="price">Price Per Day</label>
            <input type="text" name="price" id="" value="<?= $Price_Per_Day ?>" required>
            <input type="submit" value="Edit Car" class="primary-button">
            <input type="hidden" name="action" value="edit-car">
            <input type="hidden" name="car_id" value="<?= $Car_Id ?>">