<?php
session_start();
include("includes/dbhelper.php");
$dish_id=$_GET['dish_id'];
$user_id=$_SESSION['user_id'];
$query="DELETE FROM cart WHERE user_id=$user_id AND dish_id=$dish_id";

if(mysqli_query($conn,$query)){
	echo 1;
}else{
	echo 0;
}

?>