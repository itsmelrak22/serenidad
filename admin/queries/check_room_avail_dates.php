<?php
spl_autoload_register(function ($class) {
    include '../../models/' . $class . '.php';
});

$room_id = $_POST['room_id'];
$connection2 = new Transaction();
$rooms = $connection2->setQuery(" SELECT
                                    A.*,
                                    B.room_type
                                    FROM `transactions` as A
                                    LEFT JOIN `room` as B
                                    ON A.room_id = B.id
                                    WHERE A.status = 'Pending'
                                    AND A.room_id = $room_id
                                ")
                                ->getAll();
header('Content-Type: application/json; charset=utf-8');
echo json_encode($rooms);