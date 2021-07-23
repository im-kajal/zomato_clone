<?php
session_start();
$user_id=$_SESSION['user_id'];
$order_id=$_GET['order_id'];
$grandTotal=$_GET['grandTotal'];
include "includes/dbhelper.php";
$query4="SELECT * FROM orders WHERE order_id='$order_id'";
 $result4=mysqli_query($conn,$query4);
 $row4=mysqli_fetch_assoc($result4);
if($row4['address']!==0 && $row4['payment_method']!=="None"){
	$query3="UPDATE orders SET status=1, amount=$grandTotal WHERE order_id='$order_id'";
	if(mysqli_query($conn,$query3)){
		 $query1="SELECT * FROM cart WHERE user_id = $user_id";
	    $result1=mysqli_query($conn,$query1);
		while($row=mysqli_fetch_assoc($result1)){
			$dish_id=$row['dish_id'];
			$quantity=$row['quantity'];
			$query2="INSERT INTO order_detail VALUES(NULL,'$order_id','$dish_id','$quantity')";
			if(mysqli_query($conn,$query2)){
				$query="DELETE FROM cart WHERE user_id=$user_id";
				if(mysqli_query($conn,$query)){
			
				}else{
					echo 1;
				}

			}else{
				echo 1;

			}
		}

	}else{
		echo "order not placed.Some error occured.";
	}
}else{
	echo "Please select a valid payment method or address.";
}

   


?>