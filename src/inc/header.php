<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <base href="/gogo/">
    <title>Gogo</title>
    <link rel="stylesheet" href="public/css/styles.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Anonymous+Pro:ital,wght@0,400;0,700;1,400;1,700&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
</head>
<body>
    <header class="header <?php echo $dark ? 'header--dark' : '' ?>">
        <div class="header__content">
            <a href="home" class="header__link">
                <h1 class="header__logo">GOGO</h1>
            </a>
            <nav class="header__nav">
                <a class="header__link nav__link"href="home">Home</a>
                <a class="header__link nav__link"href="services">Services</a>
                <a class="header__link nav__link"href="contact">Contact Us</a>
                <a class="header__link nav__link"href="about">About Us</a>
                <a class="header__link nav__link"href="join-us">Join Us</a>
                <img class="header__profile-logo" id="header__profile-logo" src="public/assets/profile-logo.png" alt="profile logo">
            </nav>
        </div>
        <div class="header-login">
            <div class="header-login__overlay">
            </div>
            <div class="header-login__container">
                <?php if (is_user_logged_in()): ?>
                    <div class="header__profile">
                        <a class="header__link header__profile-link" href="dashboard">Dashboard</a>
                        <a class="header__link header__profile-link" href="messages">Messages</a>
                        <a class="header__link header__profile-link" href="logout">Logout</a>
                    </div>
                <?php else: ?>
                    <form class="header-login__form" action="login" method="POST" autocomplete="off">
                        <h2 class="header-login__title">Login</h2>
                        <label for="email" class="header-login__label">Email</label>
                        <input type="email" class="header-login__input" name="email">
                        <label for="password" class="header-login__label">Password</label>
                        <input type="password" class="header-login__input" name="password">
                        <a href="login" class="header-login__link link" >Forgot password?</a>
                        <div >
                            <input class="header-login__btn" type="submit" value="Login">
                        </div>
                        <p class="header-login__p">Don't have an account? <a href="signup" class="header-login__register header-login__link link">Register now</a></p>
                        <input type="hidden" name="action" value="login">
                    </form>
                    <div class="header__profile" style="display: none;">
                        <a class="header__link header__profile-link" href="dashboard">Dashboard</a>
                        <a class="header__link header__profile-link" href="messages">Messages</a>
                        <a class="header__link header__profile-link" href="logout">Logout</a>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </header>

<main>