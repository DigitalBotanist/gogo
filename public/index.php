<?php
require __DIR__ . '/../src/bootstrap.php';

// handle post requests from the client
if (is_post_request()) {
    require_once __DIR__ . '/../src/post_handler.php';
}

// getting current request path 
$path = get_request_path();

// including header and 
// make the header background dark if visiting home page
if ($path == '/home' || $path == '/' || $path == '') {
    view('header', ['dark' => true]); 
} else {
    view('header', ['dark' => false]);
}

// router
switch ($path) {
    case '':
    case '/':
    case '/home':
        require __DIR__ . '/pages/home.php';
        break;
    case '/services':
        require __DIR__ . '/pages/services.php';
        break;
    case '/contact':
        require __DIR__ . '/pages/contact.php';
        break;
    case '/about':
        require __DIR__ . '/pages/about.php';
        break;
    case '/join-us':
        require __DIR__ . '/pages/join-us.php';
        break;
    case '/login':
        require __DIR__ . '/pages/login.php';
        view('footer', ['login_page' => true]);
        exit;
        break;
    case '/signup':
        require __DIR__ . '/pages/signup.php';
        view('footer', ['signup' => true]);
        exit;
        break;
    case '/search':
        require __DIR__ . '/pages/search-page.php';
        view('footer', ['search_page' => true]);
        exit;
        break;
    case '/vehicle':
        require __DIR__ . '/pages/vehicle.php';
        view('footer', ['vehicle_page' => true]);
        exit;
        break;
    case '/about':
        require __DIR__ . '/pages/about.php';
        break;
    case '/payment':
        require __DIR__ . '/pages/payment.php';
        view('footer', ['payment' => true]);
        exit;
        break;       
    case '/rental-info':
        require __DIR__ . '/pages/rental-info.php';
        break;       
    case '/cancel-rental':
        require __DIR__ . '/pages/cancel-rental.php';
        break;       
    case '/messages':
        require __DIR__ . '/pages/messages.php';
        view('footer', ['messages' => true, 'popup_box' => true]);
        exit;
        break;       
    case '/test':
        require __DIR__ . '/pages/test.php';
        break;       
    case '/logout': 
        // logout and redirect to the homepage 
        logout();
        redirect_to('/home');
        break;
    case '/dashboard': 
        require __DIR__ . '/pages/dashboard.php';
        view('footer', ['dashboard' => true, 'popup_box' => true]);
        exit;
        break;  
    default:
        // if the url doesn't exists, redirect to the 404 page 
        http_response_code(404);
        require __DIR__ . '/404.php';
}

// including footer
view('footer');
?>