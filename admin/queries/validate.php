<?php

if( !isset($_SESSION['name']) ) {
    header('Location: ../login.php');
}

if( !isset($_SESSION['username']) ) {
    header('Location: ../login.php');
}

if( !isset($_SESSION['token']) ) {
    header('Location: ../login.php');
}

