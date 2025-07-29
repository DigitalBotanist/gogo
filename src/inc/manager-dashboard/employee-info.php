<?php 
$sql="SELECT * FROM Person right JOIN Staff ON Person.Person_id = Staff.Staff_Id";
$person= query_database($sql);
?>

<div class="employee-info">
    <h1 class="employee-info__title">Employee Information</h1>
    <table class="table">
        <tr>
            <th></th>
            <th>Id</th>
            <th>Name</th>
            <th>Role</th>
            <th>Age</th>
            <th>Email</th>
            <th>No of working days</th>
            <th>Salary</th>
        </tr>
        <?php for($i=0;$i<mysqli_num_rows($person);$i++):?>
        <?php $row= $person->fetch_assoc();?>
        <tr>
            <td>
                <img class="table__img" src="<?php $img = $row['User_Img'] ?? 'users/default.jpg'; echo getImage($img); ?>" alt="user img" class="dashboard-profile__img">
            </td>
            <td><?php echo $row['Person_Id'] ?></td>
    
            <td><?php echo "{$row['F_Name']} {$row['L_Name']}" ?></td>
            <td><?php echo $row['Permission_Level'] ?></td>
            <td><?php $dob=$row['DOB'];
                $year = (date('Y') - date('Y',strtotime($dob)));
                echo $year;
            ?></td>
            <td><?php echo $row['Email'];?></td>
            <td><?= $row['No_Of_Working_Days'] ? $row['No_Of_Working_Days'] : '-';?></td>
            <td><?php echo $row['Salary'];?></td>
        </tr>
        <?php endfor; ?>
    </table>
</div>
