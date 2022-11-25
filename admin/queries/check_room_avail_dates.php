<?php
spl_autoload_register(function ($class) {
    include '../../models/' . $class . '.php';
});

$room_id = $_POST['room_id'];
$connection = new Transaction();
$rooms = $connection->setQuery(" SELECT
                                    A.*,
                                    B.room_type
                                    FROM `transactions` as A
                                    LEFT JOIN `room` as B
                                    ON A.room_id = B.id
                                    WHERE A.room_id = $room_id
                                    AND (
                                        A.status = 'Check in'
                                        OR 
                                        A.status = 'Pending'
                                    )

                                ")
                                ->getAll();
header('Content-Type: application/json; charset=utf-8');
echo json_encode($rooms);