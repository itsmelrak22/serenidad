<?php
spl_autoload_register(function ($class) {
    include '../../models/' . $class . '.php';
});

function uuid4() {
    /* 32 random HEX + space for 4 hyphens */
    $out = bin2hex(random_bytes(18));

    $out[8]  = "-";
    $out[13] = "-";
    $out[18] = "-";
    $out[23] = "-";

    /* UUID v4 */
    $out[14] = "4";
    
    /* variant 1 - 10xx */
    $out[19] = ["8", "9", "a", "b"][random_int(0, 3)];

    return $out;
}
try {
        
    $uuid = uuid4();
    $today = date('Y-m-d H:i:s');;
    $room_id = $_POST['room_id'];
    $check_in = $_POST['check_in'];
    $check_out = $_POST['check_out'];
    $firstname = $_POST['firstname'];
    $middlename = $_POST['middlename'];
    $lastname = $_POST['lastname'];
    $contact = $_POST['contact'];
    header('Content-Type: application/json; charset=utf-8');
    

    // > Insert Guest data with additional unique id
    $guest = new Guest();
    $guest->setQuery("INSERT INTO `guest` (`uuid`, `firstname`, `middlename`, `lastname`, `contactno`, `created_at`, `updated_at`) 
                        VALUES ('$uuid', '$firstname', '$middlename', '$lastname', '$contact', '$today', '$today' )");
    $currentGuest = $guest->setQuery(" SELECT * FROM `guest` 
                        WHERE `uuid` = '$uuid'  
                        AND `firstname` = '$firstname'
                        AND `middlename` = '$middlename'
                        AND `lastname` = '$lastname'
                    ")
                    ->getFirst();

    // $transaction = new Transaction();
    // $transaction->setQuery("INSERT INTO `transactions` (`guest_id`, `room_id`, `status`, `days`, `checkin`, `checkout`, `bill`, `valid_until`, `created_at`, `updated_at`) 
    //                     VALUES ('$uuid', '$firstname', '$middlename', '$lastname', '$contact', '$today', '$today' )");




    // print_r($_POST);
    print_r($currentGuest);

} catch (PDOException $e) {
    echo $e->getMessage();
}
