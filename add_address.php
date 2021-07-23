<?php 

session_start();
include "includes/dbhelper.php";
$order_id=$_POST['order_id'];
$user_id=$_SESSION['user_id'];
$street_address=$_POST['street_address'];
$landmark=$_POST['landmark'];
$city=$_POST['city'];
$state=$_POST['state'];
$contact=$_POST['contact_no'];
$pincode=$_POST['pincode'];
$query="INSERT INTO address VALUES (NULL,'$user_id','$street_address','$landmark','$city','$state','$pincode','$contact')";
if(mysqli_query($conn,$query)){
	header('Location:checkout.php?order_id='.$order_id.'');

}else{
	echo "some error occured";
	echo $query;
}
?>