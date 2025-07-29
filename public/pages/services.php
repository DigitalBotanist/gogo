<?php 
    $sql = "SELECT * FROM Event";
    $events = query_database($sql);
?>

<div class="service_page_all">
    <h1 class="service_heading">Services</h1>
    
            <?php for($i = 0; $i < mysqli_num_rows($events); $i++):?> 
            <?php $row = $events->fetch_assoc();?> 
            <div class="service_types">
                <img class="service_img" src="<?= $row['Event_Img'] ?>">
                <div>
                <h3 ><?php echo $row['Event_Type']?></h3>
                <p ><?php echo $row['Event_Description'] ?> </p>
            </div>
        </div>
        <?php endfor; ?>
</div>


