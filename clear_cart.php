<?php
session_start();
$user_id=$_SESSION['user_id'];
include "includes/dbhelper.php";
$query="DELETE FROM cart WHERE user_id=$user_id ";
if(mysqli_query($conn,$query)){
	header('Location: ' . $_SERVER['HTTP_REFERER'].'');
}else{
	echo 1;
}

?>

