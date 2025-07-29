<?php 
if (is_user_logged_in()) {
    $user_permission = $_SESSION['permission'];
}
?>
        </main>
        <footer class="footer">
            <div class="footer_socials">
                <a href="https://www.facebook.com" class="footer__link">
                    <img src="public/assets/facebook.svg" alt="this" class="footer__img">
                </a>
                <a href="https://www.instagram.com" class="footer__link">
                    <img src="public/assets/instagram.svg" alt="this" class="footer__img">
                </a>
                <a href="https://www.youtube.com" class="footer__link">
                    <img src="public/assets/youtube.svg" alt="this" class="footer__img">
                </a>
                <a href="https://www.twitter.com" class="footer__link">
                    <img src="public/assets/twitter.svg" alt="this" class="footer__img">
                </a>
                <a href="https://www.linkedin.com" class="footer__link">
                    <img src="public/assets/linkedin.svg" alt="this" class="footer__img">
                </a>
            </div>
            <div class="footer__nav">
                <a href="home" class="footer__link">Home</a>
                <a href="services" class="footer__link">Services</a>
                <a href="contact" class="footer__link">Contact Us</a>
                <a href="about" class="footer__link">About Us</a>
                <a href="Join Us" class="footer__link">Join Us</a>
            </div>
            <p class="footer__copyright">GOGO @ 2024. All rights reserved.</p>
        </footer>
        <script src="public/js/header.js"></script>
        <?= isset($popup_box) ? '<script src="public/js/popup.js"></script>' : null ?>
        <?= isset($messages) ? '<script src="public/js/messages.js"></script>' : null ?>
        <?= isset($search_page) ? '<script src="public/js/search-page.js"></script>' : null ?>
        <?= isset($dashboard) ? '<script src="public/js/dashboard.js"></script>' : null ?>
        <?= isset($dashboard) ? '<script src="public/js/dashboard-profile.js"></script>' : null ?>
        <?= (isset($dashboard) && isset($user_permission) && ($user_permission == 'ADM'))? '<script src="public/js/admin-manage-user.js"></script>' : null ?>
        <?= (isset($dashboard) && isset($user_permission) && ($user_permission == 'ADM'))? '<script src="public/js/admin-manage-car.js"></script>' : null ?>
        <?= (isset($dashboard) && isset($user_permission) && ($user_permission == 'ADM' || $user_permission == 'MNG'|| $user_permission == 'STF'))? '<script src="public/js/staff-tasks.js"></script>' : null ?>
        <?= (isset($dashboard) && isset($user_permission) && ($user_permission == 'DRV'))? '<script src="public/js/driver-task.js"></script>' : null ?>
        <?= isset($signup) ? '<script src="public/js/signup.js"></script>' : null ?>
        <?= isset($login_page) ? '<script src="public/js/login-page.js"></script>' : null ?>
        <?= isset($payment) ? '<script src="public/js/payment.js"></script>' : null ?>
        <?= isset($vehicle_page) ? '<script src="public/js/vehicle-page.js"></script>' : null ?>
    </body>
</html>