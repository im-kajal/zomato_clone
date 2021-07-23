<?php
session_start();
include "includes/dbhelper.php";
$name=$_POST['name'];
$password=$_POST['password'];
$user_id=$_SESSION['user_id'];
$query="SELECT * FROM users WHERE user_id LIKE $user_id AND  password LIKE '$password'";
$result=mysqli_query($conn,$query);

$num_rows=mysqli_num_rows($result);

if($num_rows==1){
	$query1="UPDATE users SET name='$name' WHERE user_id=$user_id";
	mysqli_query($conn,$query1);
	header('Location:setting.php');
	$_SESSION['name']=$name;
	// $_SESSION['image']=$result2_arr['image'];
}else{
	echo 'Please enter correct password';
}
?>