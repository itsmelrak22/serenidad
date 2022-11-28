<?php
session_start();
date_default_timezone_set('Asia/Manila');
header('Content-Type: application/json; charset=utf-8');

spl_autoload_register(function ($class) {
    include '../../models/' . $class . '.php';
});

$conn = new Transaction();
$id = $_POST['transaction_id'];
$today = date('Y-m-d H:i:s');

switch ($_POST['resource_type']) {
    case 'accept':
        $transaction = $conn->setQuery("SELECT
                                            A.*,
                                            B.firstname,
                                            B.middlename,
                                            B.lastname,
                                            B.address,
                                            B.contactno,
                                            C.room_type,
                                            C.price,
                                            C.photo
                                            FROM `transactions` as A
                                            LEFT JOIN `guest` as B
                                            ON A.guest_id = B.id
                                            LEFT JOIN `room` as C
                                            ON A.room_id = C.id
                                            WHERE A.id = $id
                                        ")
                                        ->getFirst();

        $_SESSION['resource_type'] = $_POST['resource_type'];
        $_SESSION['transaction'] = $transaction;

		header("location:../accept-reservation.php");
        break;

    case 'save-accept':
        // print_r($_POST);
        $balance = (int) $_POST['bill'] - (int)$_POST['payment'];
        $is_payment_full = $balance == 0 ? 1 : 0;
        $payment = $_POST['payment'];

        try {
            $conn->setQuery("UPDATE `transactions` SET `balance`= $balance, `payment`= $payment, `is_payment_full` = $is_payment_full, `payment_at` = '$today' , `updated_at` = '$today', `status` = 'Reserved' WHERE `id` = $id");

        } catch (\PDOException $e) {
            echo $e->getMessage();
            exit(0);
        }
        
        $_SESSION["reserved-success"] = "Transaction Successfuly Reseved!";
        header("Location: ../");
        
        break;

    case 'checkin-confirm':
            try {
                $conn->setQuery("UPDATE `transactions` SET `status`= 'Check In', `updated_at`= '$today' WHERE `id` = $id");

            } catch (\PDOException $e) {
                echo $e->getMessage();
                exit(0);
            }
            
            $_SESSION["checkin-success"] = "Transaction Successfuly Checkin!";
            header("Location: ../");
        break;
        
    case 'checkout-confirm':
            try {
                $conn->setQuery("UPDATE `transactions` SET `status`= 'Check Out', `updated_at`= '$today' WHERE `id` = $id");

            } catch (\PDOException $e) {
                echo $e->getMessage();
                exit(0);
            }
            
            $_SESSION["checkout-success"] = "Transaction Successfuly Checkout!";
            header("Location: ../");
        break;

    exit(0);
    
}