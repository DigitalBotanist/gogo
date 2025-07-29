<?php 
require_login();

// query data about the current user 
$sql = "SELECT * FROM Person where Person_Id = {$_SESSION['user_id']}";
$user = query_database($sql)->fetch_assoc();
$user_type = $user['Permission_Level'];

// getting phone numbers of the users
$sql = "SELECT Phone_No FROM Person_Phone where Person_Id = {$user['Person_Id']};";
$contact_info = query_database($sql)->fetch_all(); 
$phone_no = [];
// print_r($contact_info);
foreach ($contact_info as $contact) {
    $phone_no[] = $contact[0];
}
$user['Phone_No'] = $phone_no;

// display tabs according to the user permission level 
$tabs = [];
if ($user_type === 'CUS') {
    $tabs = [
        'profile' => ['Profile', 'user-dashboard/profile'], 
        'rental_status' => ['Rental Status', 'user-dashboard/rental-status'], 
        'history' => ['History', 'user-dashboard/history']
    ];

    $sql = "SELECT * FROM Card_Info where Customer_Id = {$user['Person_Id']}"; 
    $card_info = query_database($sql); 
    $user['Card_Info'] = $card_info;  

} elseif ($user_type === 'STF') {
    $tabs = [
        'profile' => ['Profile', 'user-dashboard/profile'], 
        'tasks' => ['Tasks', 'staff-dashboard/tasks'] 
    ];
    $user['role'] = 'Manager';
} elseif ($user_type === 'MNG') {
    $tabs = [
        'profile' => ['Profile', 'user-dashboard/profile'], 
        'employee_info' => ['Employeee Info', 'manager-dashboard/employee-info'], 
        'report' => ['Report', 'manager-dashboard/report'],
        'cars' => ['Cars Info', 'manager-dashboard/cars-info'],
        'tasks' => ['Tasks', 'staff-dashboard/tasks'] 
    ];
    $user['role'] = 'Manager';
} elseif ($user_type === 'ADM') {
    $tabs = [
        'profile' => ['Profile', 'user-dashboard/profile'], 
        'manage_user' => ['Manage Users', 'admin-dashboard/manage-users'], 
        'manage_cars' => ['Manage Cars', 'admin-dashboard/manage-cars'], 
        'report' => ['Report', 'manager-dashboard/report'],
        'tasks' => ['Tasks', 'staff-dashboard/tasks'] 
    ];
    $user['role'] = 'Adminstrator';
} elseif ($user_type === 'DRV') {
    $tabs = [
        'profile' => ['Profile', 'user-dashboard/profile'], 
        'tasks' => ['Tasks', 'driver-dashboard/tasks'] 
    ];
    $user['role'] = 'Driver';
}


?>


<div class="dashboard">
    <div class="dashboard__tabs">
    <?php foreach($tabs as $key => $value): ?>
        <div class="dashboard__tab">
            <div class="dashboard__tab-overlay"></div>
            <p><?= $value[0] ?></p>
        </div>
    <?php endforeach; ?> 
    </div>
        <?php foreach($tabs as $key => $value): ?>
            <div class="dashboard__container">
                <?php view($value[1], $user) ?>
            </div>
        <?php endforeach; ?>
        
</div>



