<div class="signup_page_container">
    <div class="signup_page_continue">
        <h1>Sign Up</h1>
        <p>Please Signup to continue</p>
    </div>
    <hr class="signup_page_hr">
    <form method="post" id="signup-page-form">
        <div class="signup_page_name">
            <input class="signup_page_input"type="text" placeholder="First Name" name="Fname" required>
            <input class="signup_page_input"type="text" placeholder="Last Name" name="Lname" required>
        </div>
        <div class="signup_page_dob">
            <h4 class="signup_page_filter">Date of Birth</h4>
            <select name="day" id="day" class="signup-filter__select" required>
                <option value="" disabled selected>Day</option>
                <?php for($i = 1; $i < 31; $i++)
                echo "<option value='$i'>$i</option>";
                ?>
            </select>
            <select name="month" id="month" class="signup-filter__select" required>
                <option value="" disabled selected>Month</option>
                <option value="01">January</option>
                <option value="02">February</option>
                <option value="03">March</option>
                <option value="04">April</option>
                <option value="05">May</option>
                <option value="06">June</option>
                <option value="07">July</option>
                <option value="08">August</option>
                <option value="09">September</option>
                <option value="10">Octomber</option>
                <option value="11">November</option>
                <option value="12">December</option>

            </select>
            <select name="year" id="year" class="signup-filter__select">
                <option value="" disabled selected>Year</option>
                <?php for($i = date("Y"); $i > 1950 ; $i--)
                    echo "<option value='$i'>$i</option>";
                ?>
            </select>
        </div>
        <input class="signup_page_input" type="email" placeholder="Enter Email" name="email" required>
        <input class="signup_page_input" type="password" placeholder="Enter Password" name="password" required>
        <input class="signup_page_input" type="password" placeholder="Confirm Password" name="password2" required>
        <label class="signup_page_remember">
            <input type="checkbox" checked="checked" name="remember">
            Remember me
        </label>
        <p class="signup_page_para">By Signing Up, you agree to our User Agreement and acknowledge reading our User Privacy Notice .</p>
        <div class="clearfix">
            <button class="signup_page_button" type="submit" class="signupbtn">Sign Up</button>
        </div>
        <input type="hidden" name="action" value="signup">
    </form>
    <hr class="signup_page_hr">
    <p class="signup_page_login">Have an account?<a class="signup_page_linklogin"href="login">Log in</a></p>
</div>