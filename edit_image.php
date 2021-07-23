<?php
session_start();
$user_id=$_SESSION['user_id'];
include "includes/dbhelper.php";

if ($_FILES['image']['size'] > 500000) {
  echo "Sorry, your file is too large.";
  
}
else{
	if(isset($_POST['submit']) && isset($_FILES['image']) ){
	$target_dir = "images/";
    $target_file = $target_dir . basename($_FILES['image']['name']);
	$image=$_FILES['image']['name'];
	$query="UPDATE users SET image='$image' WHERE user_id='$user_id'";
	mysqli_query($conn,$query);
	if(move_uploaded_file($_FILES['image']['tmp_name'], $target_file)){
		$_SESSION['image']=$_FILES['image']['name'];
		header('Location:setting.php');


	}

   }
   }
?>