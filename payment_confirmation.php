<?php
session_start();
$payment_method=$_POST['x'];
$order_id=$_POST['order_id'];

$user_id=$_SESSION['user_id'];
include "includes/dbhelper.php";
if(!empty($payment_method)){
	$query="UPDATE orders SET payment_method='$payment_method' WHERE order_id='$order_id'";
	if(mysqli_query($conn,$query)){
		
			header('Location:checkout.php?order_id='.$order_id.'');
		
	echo 1;
	}else{
		echo "error occured";
	}
}else{
	echo '<p style="color:red;">Please select a valid payment method.</p>';
}


?>