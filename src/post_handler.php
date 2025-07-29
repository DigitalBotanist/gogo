<?php 
// handle most of the post requests :)


if (isset($_POST['action'])) {
    $action = $_POST['action']; 
    switch ($action) {
        case 'login':
            require __DIR__ . '/user_auth.php';
            if ($errors) {
                errorResponse($errors);
            }
            break;
        case 'signup':
            require __DIR__ . '/signup.php';
            if ($errors) {
                errorResponse($errors);
            }
            break;
        case 'payment-verify':
            require __DIR__ . '/payment.php';
            if ($errors) {
                errorResponse($errors);
            }
            break;
        case 'profile-edit':
            require __DIR__ . '/profile-edit.php';
            if ($errors) {
                errorResponse($errors);
            }
            break;
        case 'add-new-user':
            require __DIR__ . '/add-user.php';
            if ($errors) {
                errorResponse($errors);
            }
            break;
        case 'search-filter':
            require __DIR__ . '/search-filter.php';
            if ($errors) {
                errorResponse($errors);
            }
            break;
        case 'profile-change-password':
            require __DIR__ . '/change-password.php';
            if ($errors) {
                errorResponse($errors);
            }
            break;
        case 'new-message':
            require __DIR__ . '/new-message.php';
            if ($errors) {
                errorResponse($errors);
            }
            break;
        case 'delete-message':
            require __DIR__ . '/delete-message.php';
            if ($errors) {
                errorResponse($errors);
            }
            break;
        case 'delete-user':
            require __DIR__ . '/delete-user.php';
            if ($errors) {
                errorResponse($errors);
            }
            break;
        case 'edit-user-popup':
            require __DIR__ . '/edit-user-popup.php';
            if ($errors) {
                errorResponse($errors);
            }
            break;
        case 'edit-user':
            require __DIR__ . '/edit-user.php';
            if ($errors) {
                errorResponse($errors);
            }
            break;
        case 'drive-accept':
            require __DIR__ . '/drive-accept.php';
            if ($errors) {
                errorResponse($errors);
            }
            break;
        case 'drive-reject':
            require __DIR__ . '/drive-reject.php';
            if ($errors) {
                errorResponse($errors);
            }
            break;
        case 'add-new-car':
            require __DIR__ . '/add-car.php';
            if ($errors) {
                errorResponse($errors);
            }
            break;
        case 'edit-car-popup':
            require __DIR__ . '/edit-car-popup.php';
            if ($errors) {
                errorResponse($errors);
            }
            break;
        case 'edit-car':
            require __DIR__ . '/edit-car.php';
            if ($errors) {
                errorResponse($errors);
            }
            break;
        case 'verify-rental':
            require __DIR__ . '/verify-rental.php';
            if ($errors) {
                errorResponse($errors);
            }
            break;
        default: 
            break;
    }
} 