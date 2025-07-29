<div class="dashboard-profile">
    <div class="dashboard-profile__info-container">
        <img class="dashboard-profile__img" src="<?php $img = $User_Img ?? 'users/default.jpg'; echo getImage($img); ?>" alt="user img" class="dashboard-profile__img">
        <div class="dashboard-profile__info">
            <div class="dashboard-profile__info-row">
                <p class="dashboard-profile__info-label">Name:</p>
                <p class="dashboard-profile__info-content"><?php echo "$F_Name $L_Name" ?></p>
            </div>
            <div class="dashboard-profile__info-row">
                <p class="dashboard-profile__info-label">Email:</p>
                <p class="dashboard-profile__info-content"><?php echo "$Email" ?></p>
            </div>
            <div class="dashboard-profile__info-row">
                <p class="dashboard-profile__info-label">Date of Birth:</p>
                <p class="dashboard-profile__info-content"><?php echo "$DOB" ?></p>
            </div>
            <div class="dashboard-profile__info-row">
                <p class="dashboard-profile__info-label">Contact No: </p>
                <p class="dashboard-profile__info-content dashboard-profile__info-contacts">
                    <?php foreach($Phone_No as $phone) {
                        echo "$phone <br>";
                    }; ?>
                </p>
            </div>
            <div class="dashboard-profile__info-row">
                <p class="dashboard-profile__info-label">Address: </p>
                <p class="dashboard-profile__info-content"><?php echo "$StreetNo, $Town, $District, $Province"  ?></p>
            </div>
            <?php if (isset($role)): ?>
            <div class="dashboard-profile__info-row">
                <p class="dashboard-profile__info-label">Position: </p>
                <p class="dashboard-profile__info-content"><?php echo "$role" ?></p>
            </div>
            <?php endif; ?>
            <div class="dashboard-profile__btn-container">
                <button id="profile-edit-btn" class="primary-button dashboard-profile__btn">Edit Profile</button>
                <button id="password-change-btn" class="primary-button dashboard-profile__btn">Change Password</button>
                <a href="logout"><button class="dashboard-profile__logout red-btn">Log out</button></a>
            </div>
        </div>
    </div>

    <!-- show credit card if exist  -->
    <?php if (isset($Card_Info) && mysqli_num_rows($Card_Info) > 0): ?>
    <hr class="dashboard-profile__hr">
    <div class="dashboard-profile__credit-cards">
        <h2 class="dashboard-profile__card-title">Payment Info</h2>
        <?php for ($i = 0; $i < mysqli_num_rows($Card_Info); $i++): ?>
        <?php $row = $Card_Info->fetch_assoc(); ?>
            <div class="dashboard-profile__credit-card">
                <h5 class="dashboard-profile__card-no">Card No</h5>
                <div class="credit-card-info">
                    <p><?php echo $row['Card_No'] ?></p>
                    <a href="" class="dashboard-profile_card-delete">Delete</a>
                </div>
            </div>
        <?php endfor; ?>
    </div>
    <?php endif; ?>

    <!-- profile edit box -->
    <?php view('popup-box-top', ['popup_id' => 'dashboard-profile-edit-popup']) ?>
        <form class="profile-popup-form" id="profile-details-edit-box" action="" method="post">
            <input type="file" name="image" id="">
            <label for="email">Email</label>
            <input type="email" name="email" id="" value="<?= $Email ?>">
            <label for="dob">Date Of Birth</label> 
            <input type="date" name="dob" id="" value="<?= $DOB ?>">
            <label for="street_no">Street No</label> 
            <input type="text" name="street_no" value="<?= $StreetNo ?>">
            <label for="town">Town</label> 
            <input type="text" name="town" value="<?= $Town ?>">
            <label for="district">District</label> 
            <input type="text" name="district" value="<?= $District ?>">
            <label for="province">Province</label> 
            <input type="text" name="province" value="<?= $Province ?>">
            <input type="submit" value="Confirm" class="primary-button" id="">
            <input type="hidden" name="action" value="profile-edit">
        </form>
    <?php view('popup-box-bottom') ?>

    <!-- change password popup -->
    <?php view('popup-box-top', ['popup_id' => 'dashboard-profile-password-popup']) ?>
        <form class="profile-popup-form" id="profile-details-password-box" action="" method="post">
            <label for="old_password">Old password</label>
            <input type="password" name="old_password" id="" required>
            <label for="new_password">New password</label>
            <input type="password" name="new_password" id="" required>
            <label for="new_password2">Confirm new password</label>
            <input type="password" name="new_password2" id="" required>

            <input type="submit" value="Confirm" class="primary-button" id="">
            <input type="hidden" name="action" value="profile-change-password">
        </form>
    <?php view('popup-box-bottom') ?>

</div>
