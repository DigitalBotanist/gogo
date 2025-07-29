
<input type="file" name="image" id="">
<label for="role">Role</label>
<select name="role" id="" required>
    <option value="" disabled selected></option>
    <option value="ADM" <?= $Permission_Level == 'ADM' ? 'selected' : null ?> >Admin</option>
    <option value="MNG" <?= $Permission_Level == 'MNG' ? 'selected' : null ?>>Manager</option>
    <option value="CUS" <?= $Permission_Level == 'CUS' ? 'selected' : null ?>>Customer</option>
    <option value="STF" <?= $Permission_Level == 'STF' ? 'selected' : null ?>>Staff</option>
    <option value="DRV" <?= $Permission_Level == 'DRV' ? 'selected' : null ?>>Driver</option>
    <option value="DEL" <?= $Permission_Level == 'DEL' ? 'selected' : null ?>>Deleted</option>
</select>
<label for="f_name">First name</label>
<input type="text" name="f_name" id="" value="<?= $F_Name ?>" required>
<label for="l_name">Last name</label>
<input type="text" name="l_name" id="" value="<?= $L_Name ?>" required>
<label for="email">Email</label>
<input type="email" name="email" id="" value="<?= $Email ?>" required>
<label for="dob">Date Of Birth</label> 
<input type="date" name="dob" id="" value="<?= $DOB ?>" required>
<label for="street_no">Street No</label> 
<input type="text" name="street_no" value="<?= $StreetNo ?>">
<label for="town">Town</label> 
<input type="text" name="town" value="<?= $Town ?>">
<label for="district">District</label> 
<input type="text" name="district" value="<?= $District ?>">
<label for="province">Province</label> 
<input type="text" name="province" value="<?= $Province ?>">
<label for="password">Password</label> 
<input type="password" name="password" id="" placeholder="keep empty if using old one">
<label for="password2">Confirm Password</label> 
<input type="password" name="password2" id="" placeholder="keep empty if using old one">
<input type="submit" value="Edit User" class="primary-button">
<input type="hidden" name="action" value="edit-user">
<input type="hidden" name="person_id" value="<?= $Person_Id ?>">