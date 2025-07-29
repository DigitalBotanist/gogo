<?php 

if (is_post_request()) {
    $contact_info = $_POST; 
    echo $contact_info; 
    $sql = "INSERT INTO Contact_Info(Name, Email, Description) VALUES ('{$contact_info['name']}', '{$contact_info['email']}', '{$contact_info['message']}') ";
    query_database($sql); 
    redirect_to('/contact');
}
?>

<div class="contact-page__container">
    <div class="contact-page__left">
        <p>Telephone</p>
        <p>0123456789<br>0123456789</p>
        <p>Email</p>
        <p>Example@example.com<br>Example@example.com</p>
        <p>Locarion</p>
        <pre>Lorem ipsum ,<br>dolor sit amet, <br>consectetur adipiscing </pre>
        <div class="contact-page__icon">
        <a href="https://www.facebook.com" class="contact-page__link">
            <img src="public/assets/facebook.svg" alt="this" class="contact-page__img">
        </a>
        <a href="https://www.instagram.com" class="contact-page__link">
            <img src="public/assets/instagram.svg" alt="this" class="contact-page__img">
        </a>
        <a href="https://www.youtube.com" class="contact-page__link">
            <img src="public/assets/youtube.svg" alt="this" class="contact-page__img">
        </a>
        <a href="https://www.twitter.com" class="contact-page__link">
            <img src="public/assets/twitter.svg" alt="this" class="contact-page__img">
        </a>
        <a href="https://www.linkedin.com" class="contact-page__link">
            <img src="public/assets/linkedin.svg" alt="this" class="contact-page__img">
        </a>
    </div>
    </div>


    <div class="contact-page__rigth">
        <h1>Contact us</h1>
        <form action="contact" method="POST">
            <input type="text" placeholder="Name" name='name' required>
            <input type="email" placeholder="Email" name="email" required>
            <textarea rows="9" cols="20" name="message"></textarea>
            <button type="submit" class="contact-page__btn">Submit</button>
        </form>

    </div>
</div>