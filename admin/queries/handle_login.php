<?php
session_start();
date_default_timezone_set('Asia/Manila');

spl_autoload_register(function ($class) {
    include '../../models/' . $class . '.php';
});
header('Content-Type: application/json; charset=utf-8');


$username = $_POST['username'];
$password = $_POST['password'];
$token = $_POST['token'];
// print_r([$username, $password, $token]);

if(base64_decode($token) != 'Serenidad Suites'){
    $_SESSION['error'] = 'Server Error';
    header('Location: ../../login.php');
    exit(0);
}

// print_r(base64_decode($token));

$conn = new Admin;
$user = $conn->setQuery("SELECT * FROM `admin` WHERE `username` = '$username' AND `password` = '$password'")->getAll();
print_r($user);

if(count($user) == 0){
    $_SESSION['error'] = ' Username or Password does not match our records!';
    header('Location: ../../login.php');
    exit(0);
}else{

    $_SESSION['name'] = $token;
    $_SESSION['username'] = $token;
    $_SESSION['token'] = $token;

    $_SESSION['login-success'] = ' Welcome '. $_SESSION['name'];
    header('Location: ../index.php');
    exit(0);
}
