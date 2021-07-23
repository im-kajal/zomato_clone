<?php
session_start();
$user_id=$_SESSION['user_id'];
$res_id=$_GET['res_id'];
$action=$_GET['action'];
include "includes/dbhelper.php";
if($action==1){
	$query="INSERT INTO bookmark VALUES(NULL,$user_id,$res_id)";
	$result=mysqli_query($conn,$query);
	if($result){
		echo "0";
	}else{
	echo "1";
	}
	
}else{
	$query="DELETE FROM bookmark WHERE user_id=$user_id AND res_id=$res_id";
	if(mysqli_query($conn,$query)){
		echo 1;
	}else{
		echo 0;
	}
	
}
?>