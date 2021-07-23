<?php
session_start();
$conn=mysqli_connect("localhost","root","","zomato");
$email=$_POST['email'];
$password=$_POST['password'];
$query="SELECT * FROM users WHERE email LIKE '$email' AND password LIKE '$password'";
$result=mysqli_query($conn,$query);
$result_arr=mysqli_fetch_assoc($result);
$num_rows=mysqli_num_rows($result);
if($num_rows==1){
	$_SESSION['name']=$result_arr['name'];
	$_SESSION['user_id']=$result_arr['user_id'];
	$_SESSION['image']=$result_arr['image'];
	header('Location: ' . $_SERVER['HTTP_REFERER'].'');
}else{
	   header('Location:index.php?error=1');
}


?>