<?php
session_start();
date_default_timezone_set('Asia/Manila');
header('Content-Type: application/json; charset=utf-8');

spl_autoload_register(function ($class) {
    include '../../models/' . $class . '.php';
});
$target_dir = "../img/rooms/";
$room_type = $_POST['room_type'] ?? '';
$price = $_POST['price'] ?? '';
$path = $_FILES['image']['tmp_name'] ?? '';

if(isset($_POST['room_id'])){
    $id =  $_POST['room_id'];
}

if(file_exists($_FILES['image']['tmp_name']) || is_uploaded_file($_FILES['image']['tmp_name'])) {
    $hasFile = true;
    $target_file = $target_dir . basename($_FILES["image"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

    // Check if image file is a actual image or fake image
    if(isset($_POST["submit"])) {
        $check = getimagesize($_FILES["image"]["tmp_name"]);
        if($check !== false) {
            // echo "File is an image - " . $check["mime"] . ".";
            $uploadOk = 1;
        } else {
            $_SESSION['error'] = 'File is not an image!';
            $uploadOk = 0;
        }
    }

    // Check if file already exists
    if (file_exists($target_file)) {
        $_SESSION['error'] = 'Sorry, file already exists!';
        $uploadOk = 0;
    }

    // // Check file size
    // if ($_FILES["image"]["size"] > 500000) {
    //     $_SESSION['error'] = 'Sorry, your file is too large!';
    //     $uploadOk = 0;
    // }

    // Allow certain file formats
    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
    && $imageFileType != "gif" ) {
        echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        $uploadOk = 0;
    }

    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {

        header("Location: ../rooms.php");
        exit(0);
    // if everything is ok, try to upload file
    } 
}


$conn = new Room();
$today = date('Y-m-d H:i:s');

switch ($_POST['resource_type']) {
    case 'store':
        $path = 'img/rooms/'.htmlspecialchars( basename( $_FILES["image"]["name"]));
        try {
            $conn->setQuery(" INSERT INTO `room`( `room_type`, `price`, `photo`, `created_at`, `updated_at`) VALUES ('$room_type','$price','$path','$today','$today') ");
            $_SESSION['success'] = ' Room Added!';

            if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
                $_SESSION['updload-success'] = " The file ". htmlspecialchars( basename( $_FILES["image"]["name"])). " has been uploaded.";
            } else {
                $_SESSION['error'] =  "Sorry, there was an error uploading your file.";
            }

            header("Location: ../rooms.php");

        } catch (\PDOException $e) {
            $_SESSION['error'] = $e->getMessage();
            exit(0);
        }
        break;

    case 'edit':
        try {
            $room = $conn->find($id);
            $_SESSION['id'] = $room->id;
            $_SESSION['room_type'] = $room->room_type;
            $_SESSION['price'] = $room->price;
            $_SESSION['photo'] = $room->photo;

            header("Location: ../edit_room.php");

        } catch (\PDOException $e) {
            $_SESSION['error'] = $e->getMessage();
            exit(0);
        }
        
        break;

    case 'update':

        try {

            // print_r(is_file($_POST['old_photo']));

            if(isset($hasFile)){
                if(isset($_POST['old_photo'])) {$old_path = $_POST['old_photo'];}
                $photo = 'img/rooms/'.htmlspecialchars( basename( $_FILES["image"]["name"]));
            }else{
                $photo = $old_path;
            }

            $conn->setQuery(" UPDATE `room` SET `room_type`='$room_type',`price`='$price',`photo`='$photo',`updated_at`='$today' WHERE `id` = $id");
            $_SESSION['successs'] = ' Room Updated!';

            if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
                $_SESSION['updload-success'] = " The file ". htmlspecialchars( basename( $_FILES["image"]["name"])). " has been uploaded.";
            } else {
                $_SESSION['error'] =  "Sorry, there was an error uploading your file.";
            }


            if (is_file('../'.$old_path)){
                unlink('../'.$old_path);
            }

            header("Location: ../rooms.php");

        } catch (\PDOException $e) {
            $_SESSION['error'] = $e->getMessage();
            exit(0);
        }
        
        break;

    case 'delete':
        
        try {
            $conn->setQuery(" DELETE FROM `room` WHERE `id` = $id");
            $_SESSION['success'] = ' Room Deleted!';
            
            if(isset($_POST['old_photo'])) {$old_path = $_POST['old_photo'];}
            if (is_file('../'.$old_path)){
                unlink('../'.$old_path);
            }
            
            header("Location: ../rooms.php");

        } catch (\PDOException $e) {
            $_SESSION['error'] = $e->getMessage();
            exit(0);
        }
        break;

    exit(0);
    
}