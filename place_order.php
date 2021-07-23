<?php
session_start();
if(!empty($_SESSION)){
 $is_logged_in=1;
}else{
 $is_logged_in=0;
}
 // $amount=$_POST['amount'];
date_default_timezone_set('Asia/kolkata');
$order_date=date("Y/m/d h/i");
$order_id=uniqid();
$user_id=$_SESSION['user_id'];
include("includes/dbhelper.php");

$query="INSERT INTO orders VALUES('$order_id','$user_id','$order_date','0','None',0,0,0)";
if(mysqli_query($conn,$query)){
	echo $order_id;

   
}else{
	echo "failed";
}