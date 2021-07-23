<?php
//connect tp data base 
//receive user input and run sql query add  the user to our database
session_start();
$conn=mysqli_connect("localhost","root","","zomato");

$name=$_POST['name'];
$email=$_POST['email'];
$password=$_POST['password'];

$query="INSERT INTO users VALUES(NULL,'$name','$email','$password','user.jpg')";
$query1="SELECT * FROM users WHERE email LIKE '$email'";
$result = mysqli_query($conn,$query1);
$num_rows=mysqli_num_rows($result);

if($num_rows==0){
	if(mysqli_query($conn,$query)){
		$query2="SELECT * FROM users WHERE email LIKE '$email'";
		$result2=mysqli_query($conn,$query2);
		$result2_arr=mysqli_fetch_assoc($result2);

		$_SESSION['name']=$result2_arr['name'];
		$_SESSION['user_id']=$result2_arr['user_id'];
		$_SESSION['image']=$result2_arr['image'];

	header('Location: ' . $_SERVER['HTTP_REFERER'].'');
    }else{
	header('Location:index.php?error=0');

    }
}else{
	header('Location:index.php?error=2');
}
