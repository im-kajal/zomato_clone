<?php
include "includes/header.php";

if(empty($_SESSION)){
 header('Location:login_form.php');
}else{
 $is_logged_in=1;
}
$user_id=$_SESSION['user_id'];
include "includes/dbhelper.php";


?>
<div class="container">
	<div class="row">
	    <div class="col-8">
		<h2 class="mt-5 mb-5">My Orders</h2>
		<?php
		$query="SELECT * FROM orders WHERE user_id=$user_id AND status=1" ;
		$result=mysqli_query($conn,$query);
		while($row=mysqli_fetch_assoc($result)){
			$curr_order_id=$row['order_id'];
			$query3="SELECT * FROM order_detail od JOIN menu m ON od.dish_id=m.dish_id WHERE  od.order_id='$curr_order_id'";
			$result3=mysqli_query($conn,$query3);
            $row3=mysqli_fetch_assoc($result3);

			echo '<div class="card mb-3">
					<div class="card-body">
						<div class="row">
							<div class="col-12">
							    <p>Order ID - <span id="res_id'.$row['order_id'].'" data-id='.$row3['res_id'].'><b>'.$row['order_id'].'</b></span></p>
							     <span style="float: right">Date - <b>'.$row['date'].'</b></span>
							    </p><hr>	
							</div>';
							
							$query2="SELECT * FROM order_detail od JOIN menu m ON od.dish_id=m.dish_id WHERE  od.order_id='$curr_order_id'";
							$result2=mysqli_query($conn,$query2);
							while($row2=mysqli_fetch_assoc($result2)){
								
								 echo      '<div class="col-3 mb-3">
												<img src="'.$row2['image'].'" style="width:100%;height:90px">
												
											</div>
											<div class="col-9 mb-3s">
												<h5><a href="detail.php?res_id='.$row2['res_id'].'">'.$row2['dish_name'].'</a><br><span class="lead" >Rs '.$row2['price'].'</span></h5>
											</div>';
							}
							
				           
		    echo	   '<div class="col-12">
							<P >Paid Amount Rs '.$row['amount'].'</P>';

			 if($row['rated']==1){
              
			 }else{
			 	 echo			'<button style="float:right; margin-top:-25px" class="btn btn-danger rate"  data-toggle="modal" data-target="#review" data-id='.$row['order_id'].'>Rate Food</button>';
			 }	 	
		    
							
			echo		  '</div>
						 </div>
				 	 </div>
				  </div>';
		}
		?>
			
			
		 </div>
		
	</div>


	<div class="modal fade" id="review" data-backdrop="static" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
	  <div class="modal-dialog">
	    <div class="modal-content">
	      <div class="modal-header">
	        <h5 class="modal-title" id="exampleModalLabel">Review your food </h5>
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	          <span aria-hidden="true">&times;</span>
	        </button>
	      </div>
	      <div class="modal-body">
	        <form action="rating.php" method="POST">
	        	<label><b>Give Stars</b></label><br>
	        	<div id="stars">
	        	<span class="btn far fa-2x fa-star" data-id=0></span>
				<span class="btn far fa-2x fa-star" data-id=1></span>
				<span class="btn far fa-2x fa-star" data-id=2></span>
				<span class="btn far fa-2x fa-star" data-id=3></span>
				<span class="btn far fa-2x fa-star" data-id=4></span><br><br>
				</div>
				<div id="post-info">
				
				</div>
		        <label><b>your review</b></label>
		        <input type="text" name="review" class="form-control"><br>
		        <input type="submit" class="btn btn-lg btn-danger btn-block text-white" value="Rate">	
	        </form>
	      </div>
	    </div>
	  </div>
    </div>

</div>
<script type="text/javascript">
	$('.rate').click(function(){
		// alert(0);
		var order_id=$(this).attr('data-id');
         // alert(order_id);
		var res_id=$('#res_id'+order_id).attr('data-id');
		// alert(res_id);
		$('#stars').on('click','span.fa-2x',function(){
			var no_star=$(this).attr('data-id');
			$('#stars').children().hide();
			for(var i = 0; i <= no_star; i++){
				var p=`<span class="btn fas fa-2x fa-star text-warning" data-id=${i}></span>`
				$('#stars').append(p);
			 
			}
			var n=Number(no_star)+1;
			for(var i = n; i <= 4; i++){
	            var p=`<span class="btn far fa-2x fa-star" data-id=${i}></span>`
				$('#stars').append(p);
			 
			}
			var p=`<input class="remove-postinfo"type="hidden" name="star" value="${no_star}">`
			var p1=`<input class="remove-postinfo" type="hidden" name="res_id" value="${res_id}">`
			var p2=`<input class="remove-postinfo" type="hidden" name="order_id" value="${order_id}">`
			$('#post-info').append(p);
	        $('#post-info').append(p1);
	        $('#post-info').append(p2);

	    })
   })
   $('.close').click(function(){
   	// alert(0);
   	   $('.remove-postinfo').remove();
   })
	
	
</script>
</body>
</html>





