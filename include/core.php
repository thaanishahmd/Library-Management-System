<?php 
session_start();
if(isset($_COOKIE['user_id'])){
    $_SESSION['user_id'] = $_COOKIE['user_id'];
}
if(isset($_COOKIE['admin_id'])){
    $_SESSION['admin_id'] = $_COOKIE['admin_id'];
}
?>