<?php
include "includes/header.php";

?>
	<div class="jumbotron jumbotron-bg text-white" style="background-image: url('https://cdn.hipwallpaper.com/m/37/30/0EF75T.jpg');
	background-size:cover;
	background-repeat: no-repeat;">
			<h1 class="text-md-center display-1">Welcome to Zomato</h1>
	</div>

	<div style="margin-left: 150px">
	 	<img style="border-radius: 40px;height: 90px;width:90px"  src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQuyxyiAQoY9JDWrxTn1mWWipGf6cYh7Lbeog&usqp=CAU">
	 	<h4 class="text-danger">Delievery</h4>
	</div>
	<hr>

	<div class="container">
		<h1 class="mb-3">Delievery Restaurants</h1>
		<div class="row">
			<?php
			include "includes/dbhelper.php";
			$query="SELECT * FROM restaurant";
            $result=mysqli_query($conn,$query);
            while($row = mysqli_fetch_assoc($result)){
           echo '<div class="col-4">
					<div class="card mt-5">
						<div class="card-body">
							<img src="'.$row['photo'].'" class="card-img-top" style="height:160px;width:100%">
							<a href="detail.php?res_id='.$row['res_id'].'&error=3" class="card-title text-dark" style="font-size: 20px"><b>'.$row['res_name'].'</b></a>
							<p>Rating <i class="fas fa-star text-success"></i> '.$row['rating'].'  ('.$row['vote'].' people voted)</p>
							<p class="card-text">'.$row['cuisins'].'</p>
							<p>100 for one</p>
						</div>
					 </div>
			     </div>';
            }
			?>
			
		 </div>	 

	 </div>	 


	 
 </body>
 </html>	 