<?php
session_start();
include("includes/dbhelper.php");
$res_id=$_GET['res_id'];
$dish_id=$_GET['dish_id'];
$user_id=$_SESSION['user_id'];
$query1="SELECT * FROM cart WHERE user_id=$user_id";
$result1=mysqli_query($conn,$query1);
$row1=mysqli_fetch_assoc($result1);
$num_rows=mysqli_num_rows($result1);
if($num_rows > 0){
	if($res_id==$row1['res_id']){
        $query="INSERT INTO cart VALUES (NULL,$res_id,$user_id,$dish_id,1)";

		mysqli_query($conn,$query);
			
	}else{
		echo "Your cart has existing items from other restaurant. Do you want to clear it and add items from this restaurant?";
	}
}else{
    $query="INSERT INTO cart VALUES (NULL,$res_id,$user_id,$dish_id,1)";

		mysqli_query($conn,$query);
			
}

?>