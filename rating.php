<?php
session_start();
$user_id=$_SESSION['user_id'];
$res_id=$_POST['res_id'];
$star=$_POST['star']+1;
$review=$_POST['review'];
$order_id=$_POST['order_id'];
// echo $order_id;
include "includes/dbhelper.php";
$query="SELECT * FROM restaurant WHERE res_id=$res_id";
$result=mysqli_query($conn,$query);
$row=mysqli_fetch_assoc($result);
$vote=$row['vote']+1;
$rating=(($row['rating']*$row['vote'])+$star)/($row['vote']+1);
$query1="UPDATE restaurant SET vote=$vote, rating=$rating WHERE res_id='$res_id'";
if(mysqli_query($conn,$query1)){
	$query2="UPDATE orders SET rated=1 WHERE order_id='$order_id'";
	if(mysqli_query($conn,$query2)){
		header('Location: ' . $_SERVER['HTTP_REFERER'].'');
	}else{
		echo 1;
	}
}

?>