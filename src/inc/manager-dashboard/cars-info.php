<?php 
    $sql = "SELECT * FROM Car";
    $car = query_database($sql);
?> 

<div class="manager-cars-info">
    <h1 class="manager-cars-info__title">Cars Information</h1>
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
                    <img class="table__img" src="<?php $img = $row['Car_Img'] ?? 'users/default.jpg'; echo getImage($img); ?>" alt="user img" class="dashboard-profile__img">
                </td>
                <td><?php echo $row['Car_Id'] ?></td>
                <td><?php echo $row['Car_Name'] ?></td>
                <td><?php echo $row['VIN'] ?></td>
                <td><?php echo $row['Availability'] ?></td>
                <td><?php echo $row['Price_Per_Day'];?></td>
                <td><?php echo $row['Transmission_Type'];?></td>
                <td><?php echo $row['Fuel_Type'];?></td>
    
            </tr>
                <?php endfor; ?>
        </table>
</div>