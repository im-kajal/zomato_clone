<?php
session_start();
include "includes/header.php";
include "includes/dbhelper.php";
$user_id=$_SESSION['user_id'];
$query="DELETE FROM users WHERE user_id=$user_id";
$query1="DELETE FROM cart WHERE user_id=$user_id";
$query2="DELETE FROM orders WHERE user_id=$user_id";
$query3="DELETE FROM order_detail WHERE user_id=$user_id";
$query4="DELETE FROM address WHERE user_id=$user_id";
$query5="DELETE FROM bookmark WHERE user_id=$user_id";
mysqli_query($conn,$query);
mysqli_query($conn,$query1);
mysqli_query($conn,$query2);
mysqli_query($conn,$query3);
mysqli_query($conn,$query4);
mysqli_query($conn,$query5);


?>