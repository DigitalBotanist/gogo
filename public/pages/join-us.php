<?php 
if (is_post_request()) {
  $data = $_POST; 
  $sql = "INSERT INTO Join_Us_Info(Name, Email, Position, Description, Phone_no) VALUES ('{$data['fullname']}', '{$data['email']}', '{$data['position']}', '{$data['description']}', '{$data['contactnumber']}')";
  query_database($sql);
  echo '<script>alert("successful")</script>';
}
?>

<div class="joinus_page_container">

<div class="joinus_page_content">
    <img class="joinus_page_image" src="public/assets/joinus.jpg" alt="this">
    <form class="joinus_page_form" action="join-us" method="post">
        <h2 class="joinus_page_top">JOIN US!</h2>

      <label class="joinus_page_label" for="fullname">Full Name</label>
      <input class="joinus_page_input"type="text" id="fullname" name="fullname">
      <br><br>
      <label class="joinus_page_label"for="email">Email</label>
      <input class="joinus_page_input"type="email" id="email" name="email">
      <br><br>
      <label class="joinus_page_label"for="contactnumber">Contact Number</label>
      <input class="joinus_page_input"type="tel" id="contactnumber" name="contactnumber">
      <br><br>
      <label class="joinus_page_label"for="position">Position</label>
        <select name="position" id="position" class="joinus-filter__select">
            <option value="" disabled selected></option>
            <option value="manager">Manager</option>
            <option value="administrator">Admin</option>
            <option value="driver">Driver</option>
            <option value="staff">Driver</option>
        </select>
      <br><br>
      <label class="joinus_page_label"for="description">Description</label>
      <textarea id="description" name="description"></textarea>
      <br>
      <button class="joinus_page_button" type="submit">Submit</button>
    
    </div>
    </form>
</div>