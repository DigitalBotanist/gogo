<?php 
require_login(); 

$user_id = $_SESSION['user_id'];
$permission = $_SESSION['permission'];
$sql = "SELECT * FROM Message WHERE Receiver_Id = $user_id";
$result = query_database($sql);
?> 


<div class="messages-page">
    <div class="messages-page__top">
        <h1 class="messages-page__heading">Messages</h1>
        <?php if ($permission !== 'CUS'): ?> 
            <img title="send new message" src="public/assets/send-message-icon.svg" alt="" class="messages-page__send-message">
        <?php endif ?>
    </div>
    <div class="messages">
        <?php if(mysqli_num_rows($result) == 0): ?> 
            <h2 class="messages__empty">There are no new messages</h2>
        <?php endif?>
        <?php for($i = 0; $i < mysqli_num_rows($result); $i++):?> 
            <?php 
                $row = $result->fetch_assoc();
                $sql = "SELECT F_Name, L_Name, Permission_Level FROM Person WHERE Person_Id = {$row['Sender_Id']}";
                $sender = query_database($sql)->fetch_assoc(); 
                $sender_name = $sender['F_Name'] . ' ' . $sender['L_Name'];

                switch($sender['Permission_Level']) {
                    case 'ADM': 
                        $position = 'Administrator'; 
                        break;
                    case 'MNG': 
                        $position = 'Manager'; 
                        break;
                    case 'STF': 
                        $position = 'Staff Member'; 
                        break;
                    case 'DRV': 
                        $position = 'Driver'; 
                        break;
                }
            ?> 
            <div class="messages__card">
                <div class="messages__card-top">
                    <h3 class="messages__sender-name"><?= $sender_name?> (<?= $position ?> )</h3>
                    <img class="messages__card-delete" src="public/assets/trash-bin-icon.svg" data-id="<?= $row['Message_Id'] ?>" alt="trash bin">
                </div>
                <p class="messages__p"><?= $row['Message'] ?></p>
            </div>
        <?php endfor; ?> 

    </div>
</div>

<!-- new message popup -->
<?php view('popup-box-top', ['popup_id' => 'send-new-message-popup']) ?>
    <form class="profile-popup-form" id="new-message-box" action="" method="post">
        <label for="receiver">Receiver</label>
        <select name="receiver" id="receiver" class="" required>
            <option value="" disabled selected></option>
            <?php 
                $sql = "SELECT F_Name, L_Name, Person_Id FROM Person"; 
                $persons = query_database($sql); 
                for ($i = 0; $i < $persons->num_rows; $i++): 
                $person = $persons->fetch_assoc(); 
            ?>
            <option value="<?= $person['Person_Id']?>"><?= $person['F_Name'] . ' ' . $person['L_Name'] ?> </option>
            <?php endfor; ?>
        </select>
        <label for="message">Message</label>
        <textarea name="message" id="" cols="30" rows="10" maxlength="1024"></textarea>

        <input type="submit" value="Confirm" class="primary-button" id="">
        <input type="hidden" name="action" value="new-message">
    </form>
<?php view('popup-box-bottom') ?>