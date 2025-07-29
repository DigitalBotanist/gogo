<?php 

// make variables and include files in src/inc specified by the parameters
function view(string $filename, array $data = []): void {
    foreach ($data as $key => $value) {
        $$key = $value; 
    }
    require __DIR__ . '/../inc/' . $filename . '.php';
}

// return current url
function get_request_path() {
    $url = parse_url($_SERVER['REQUEST_URI']);

    $path_parts = explode('/', $url['path']);
    $path_parts = array_filter($path_parts);
    array_shift($path_parts);

    $new_path = '/' . implode('/', $path_parts);
    return $new_path;
}   

// return true if current request is a post request 
function is_post_request() {
    return strtoupper($_SERVER['REQUEST_METHOD'] === 'POST');
}

// redirect
function redirect_to(string $url): void {
    header('Location: ' . BASE_URL .  $url);
    exit; 
}

// redirect with data in the session array
function redirect_with(string $url, array $items): void
{
    foreach ($items as $key => $value) {
        $_SESSION[$key] = $value;
    }

    redirect_to($url);
}

// remove session data specified by the arguments
function session_flash(...$keys): array
{
    $data = [];
    foreach ($keys as $key) {
        if (isset($_SESSION[$key])) {
            $data[] = $_SESSION[$key];
            unset($_SESSION[$key]);
        } else {
            $data[] = [];
        }
    }
    return $data;
}

// if not logged in redirect to the login page 
function require_login(): void
{
    if (!is_user_logged_in()) {
        redirect_to('/login');
    }
}

// return true if user_id sets in current session 
function is_user_logged_in(): bool
{
    return isset($_SESSION['user_id']);
}

function logout(): void {
    if(is_user_logged_in()) {
        unset($_SESSION['user_id']);
        session_destroy();
    }
}

// return images in the src/assets which is specified in the $url parameter.
// or return the default image 
function getImage(string $url) {
    $img_path = $_SERVER['DOCUMENT_ROOT'] . BASE_URL . "/src/assets/$url";
    if (!file_exists($img_path)) {
        $img_path = $_SERVER['DOCUMENT_ROOT'] . BASE_URL . "/src/assets/users/default.png";
    }
    
        // Read the image file
        $image_data = file_get_contents($img_path);

        // Encode the image data as base64
        $encoded_data = base64_encode($image_data);

        // Generate the data URI
        return 'data:image/jpeg;base64,' . $encoded_data;
}

// send response with errors
function errorResponse(array $errors) {
    http_response_code(400); 
    echo json_encode($errors);
    exit;
}

function successfulResponse() {
    $msg = ['status' => 'successfull'];
    echo json_encode($msg); 
    exit;
}