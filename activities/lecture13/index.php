<?php

if(!isset($_COOKIE['visits'])){
    $_COOKIE['visits'] = 0;
}
if(!isset($_COOKIE['lastname'])) {
    $_COOKIE['lastname'] = ' ';
} 


$visits = $_COOKIE['visits'] + 1;
$lastName = $_POST['lastName'];

setcookie('visits', $visits , time() + 3600 * 24 * 365);
setcookie('lastname', $lastName, time() + 3600 * 24 * 365);

include('welcome.php');
?>