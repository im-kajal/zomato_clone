<?php
include "includes/header.php";
include "includes/dbhelper.php";
$user_id=$_SESSION['user_id'];
?>
<div class="container">
	<div class="row mt-3 ml-1">
		<h2>Bookmarks</h2>
	</div>
	<div class="row mt-3">
		<?php
		$query="SELECT * FROM bookmark WHERE user_id=$user_id ";
		$result=mysqli_query($conn,$query);
		while($row=mysqli_fetch_assoc($result)){
			$res_id=$row['res_id'];
			$query1="SELECT * FROM restaurant WHERE res_id=$res_id";
			$result1=mysqli_query($conn,$query1);
			$row1=mysqli_fetch_assoc($result1);
			echo '<div class="col-3">
					<div class="card">
						<div class="card-body">
							<img src="'.$row1['photo'].'" style="width:100%;height:200px; ">
							<a href="detail.php?res_id='.$res_id.'">'.$row1['res_name'].'</a>
							<p>'.$row1['res_name'].'</p>
							
						</div>
					</div>
				 </div>	';
		}
		?>
		
	</div>
</div>