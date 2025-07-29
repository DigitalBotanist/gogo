<?php 
      $sql="select * from Person";
      $person= query_database($sql);
?>


<div class="admin_manageuser">
	<!-- top bar -->
    <h1 class="admin_manageuser_h1">Manage Users</h1>
    <div class="admin_manageuser_container">
		<!-- filter  -->
        <!-- <select class="admin_manageuser_container_select" >
            <option>All Users</option>
            <option>Manager</option>
            <option>Admin</option>
            <option>Driver</option>
            <option>Staff Member</option>
            <option>Customer</option>
        </select> -->
		<!-- search -->
        <!-- <input type="text" class="admin_manageuser_container_text"> -->
		<!-- add user button -->
        <button class="admin_manageuser_container_btn primary-button" id="admin-dashboard-add-user">ADD USER</button>
    </div>
  
	<table class="table">
		<tr>
			<th></th>
			<th>Id</th>
			<th>Name</th>
			<th>Role</th>
			<th>Age</th>
			<th>Email</th>
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

			<td><p data-id="<?= $row['Person_Id'] ?>" class="admin_manage_user_edit table__link">Edit</p></td>
			<td> <p data-id="<?= $row['Person_Id'] ?>" class="admin_manage_user_delete table__link--red">Delete</p></td>
		</tr>
			<?php endfor; ?>
	</table>


 <!-- add user box -->
    <?php view('popup-box-top', ['popup_id' => 'admin-add-user']) ?>
        <form id="admin-user-add-box" class="profile-popup-form" action="" method="post">
            <input type="file" name="image" id="">
            <label for="role">Role</label>
            <select name="role" id="" required>
              <option value="" disabled selected></option>
              <option value="ADM">Admin</option>
              <option value="MNG">Manager</option>
              <option value="CUS">Customer</option>
              <option value="STF">Staff</option>
              <option value="DRV">Driver</option>
            </select>
            <label for="f_name">First name</label>
            <input type="text" name="f_name" id="" value="" required>
            <label for="l_name">Last name</label>
            <input type="text" name="l_name" id="" value="" required>
            <label for="email">Email</label>
            <input type="email" name="email" id="" value="" required>
            <label for="dob">Date Of Birth</label> 
            <input type="date" name="dob" id="" value="" required>
            <label for="street_no">Street No</label> 
            <input type="text" name="street_no" value="">
            <label for="town">Town</label> 
            <input type="text" name="town" value="">
            <label for="district">District</label> 
            <input type="text" name="district" value="">
            <label for="province">Province</label> 
            <input type="text" name="province" value="">
            <label for="password">Password</label> 
            <input type="password" name="password" id="" required>
            <label for="password2">Confirm Password</label> 
            <input type="password" name="password2" id="" required>
            <input type="submit" value="Add User" class="primary-button">
            <input type="hidden" name="action" value="add-new-user">
        </form>
    <?php view('popup-box-bottom') ?>   

  <!-- edit user box -->
    <?php view('popup-box-top', ['popup_id' => 'admin-edit-user']) ?>
        <form id="admin-user-edit-box" class="profile-popup-form" action="" method="post">
            
        </form>
    <?php view('popup-box-bottom') ?>    
  </div>
   
