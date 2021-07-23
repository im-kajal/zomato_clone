<?php
include "includes/header.php";
include "includes/dbhelper.php";
$user_name=$_SESSION['name'];
?>
<div class="container">
	<h2 class="mt-3 mr-5">Checkout</h2>
	<p id="message23" class="text-danger"></p>
	<div class="row">
		<div class="col-6">
			<div class="row" style="border:1px solid #ddd; border-radius: 10px">
				<div class="ml-4">
					<h4><?php echo ''.$user_name.''; ?></h4>
				    <p>You are securely login.</p>
				</div>
			</div>
			<div class="row mt-3" style="border:1px solid #ddd; border-radius: 10px">
				<h4 class="mt-2 mb-3">Delivery Address</h4>
				<a href="#"class="text-danger ml-5 mt-3" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">show Address</a>
			    <div class="col-12" style="">
			    	<?php
			    	$order_id=$_GET['order_id'];
			    	$query3="SELECT * FROM orders WHERE order_id='$order_id'";
			    	$result3=mysqli_query($conn,$query3);
			    	$row3=mysqli_fetch_assoc($result3);
                    if(!empty($row3['address'])){
                    	$address_id=$row3['address'];
			    		$query4="SELECT * FROM address WHERE address_id=$address_id";
			    		$result4=mysqli_query($conn,$query4);
			    		$row4=mysqli_fetch_assoc($result4);
			    		echo '<p class="ml-2"><i class="fas fa-check-circle text-primary"></i>
							     '.$row4['street_address'].'
							     '.$row4['landmark'].'
							     '.$row4['city'].'
							     '.$row4['pin'].'
							     '.$row4['state'].'<br>
							     '.$row4['contact'].'</p>';
			    	}
			    	// <p></p>
			    	?>
			    </div>
				<div class="row ml-3">
	                <div class="collapse" id="collapseExample">
			       
					  	<form action="select_order_address.php" method="POST" id="address123" >
		                	
					    <?php
						include ("includes/dbhelper.php");
						$query="SELECT * FROM address WHERE user_id=$user_id";
						$result=mysqli_query($conn,$query);
						while($row=mysqli_fetch_assoc($result)){
							echo '<div class=""><p class="ml-2"><input type="radio" name="x" class="" value="'.$row['address_id'].'">
							     '.$row['street_address'].'
							     '.$row['landmark'].'
							     '.$row['city'].'
							     '.$row['pin'].'
							     '.$row['state'].'<br>
							     '.$row['contact'].'</p></div>';
			                      
						}  
						?>
						<input type="hidden" name="order_id" value="<?php echo $_GET ['order_id'];?>">
				        <input type="submit" class="btn btn-danger mb-2" style="float: right;" name="" value="Deliever here">
				    </form>
				
					</div>
				</div>
			</div>
			<div class="row">
				<a href="#" class="text-danger" style="font-size: 26px" data-toggle="modal" data-target="#add-address">+ Add new address</a>
				<div class="modal fade" id="add-address" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
				  <div class="modal-dialog">
				    <div class="modal-content">
				      <div class="modal-header">
				        <h5 class="modal-title" id="exampleModalLabel">Add your delievery address</h5>
				        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
				          <span aria-hidden="true">&times;</span>
				        </button>
				      </div>
				      <div class="modal-body">
				       <form action="add_address.php" method="POST" >
			           	<label>Street Adress</label><br>
			           	<textarea name="street_address"class="form-control"></textarea><br>
			           	<label>Landmark</label><br>
			           	<textarea name="landmark"class="form-control"></textarea><br>
			           	<label>City</label><br>
			           	<input  class="form-control" type="text" name="city"><br>
			           	<label>State</label><br>
			           	<input class="form-control" type="text" name="state"><br>
			           	<label>Contact No</label><br>
			           	<input class="form-control"type="text" name="contact_no"><br>
			           	<label>Pincode</label><br>
			           	<input class="form-control"type="text" name="pincode"><br><br>
			           	<input type="hidden" name="order_id" value="<?php echo $_GET ['order_id'];?>">
			           	<input type="submit" value="Add Address" class="btn btn-danger btn-lg" name="">

			           </form>
				      </div>
				     
				    </div>
				  </div>
				</div>
			</div>	
			<div class="row" style="border:1px solid #ddd; border-radius: 10px">
				<div class="" >
					<h3 class="mb-4">Select Payment Option</h3>
					<form class="ml-3" action="payment_confirmation.php" method="POST">
						<input type="radio" name="x" value="credit card">Credit Card<br><br>
						<input type="radio" name="x" value="Debit Card">Debit Card<br><br>
						<input type="radio" name="x" value="UPI">UPI<br><br>
						<input type="radio" name="x" value="Wallet">Wallet<br><br>
						<input type="radio" name="x" value="Net Banking">Net Banking<br><br>
						<input type="radio" name="x" value="COD">COD<br><br>
						<input type="submit" name="" class="btn btn-warning" value="Pay Now">
						<input type="hidden" name="order_id" value="<?php echo $_GET['order_id'];?>">
					</form>
					
				</div>
				
			</div>
		</div>
		<div class="col-5 ml-5">
		<h5>Summary</h5>	
		<?php
		$query1="SELECT * FROM cart WHERE user_id=$user_id";
		$result1=mysqli_query($conn,$query1);
		$row1=mysqli_fetch_assoc($result1);
		$res_id=$row1['res_id'];
		$query2="SELECT * FROM restaurant WHERE res_id=2";
		$result2=mysqli_query($conn,$query2);
		$row2=mysqli_fetch_assoc($result2);
		echo '<div style="background-color:#ddd;"><p>Order From</p>
		      <a href="detail.php?res_id='.$row2['res_id'].'">'.$row2['res_name'].'</a></div>';
		$query="SELECT * FROM cart c JOIN menu m ON c.dish_id = m.dish_id WHERE c.user_id = $user_id";
		$result=mysqli_query($conn,$query);
		$amount=0;
		$total=0;
		while($row=mysqli_fetch_assoc($result)){
			$amount=$amount + $row['price']*$row['quantity'];
		    $total=$total + $amount;
		    $tax=$total*0.05;
		    $grand=$total+$tax+20;
			echo '<div class="row">
		         		<div class="col-6">
			       		   <p>'.$row['dish_name'].'</p>
			       		   <p>₹ '.$row['price'].'</p>
				        </div>
				       	<div class="col-3">
				       	 	
						    <span id="mquantity'.$row['dish_id'].'" class="ml-1 mr-1">Quantity '.$row['quantity'].'</span>
						</div>
		       	        <div class="col-3">
		       	        <p>Rs <span id="amount'.$row['dish_id'].'">'.$amount.'</span></p>
		       	        </div>
                      </div>';

                      $amount=0;
            
		}
		 echo '<hr>
				<div class="row">
					<div class="col-8">
						<p><strong>Subtotal</strong></p>
						<p>Tax</p>
						<p>Delievery Charge</p>
						<hr>
						<h5>Grand Total</h5>
					</div>
					<div class="col-4">
						<p>₹'.$total.'</p>
						<p>'.$tax.'</p>
						<p>₹20</p>
						<hr>
						<h5 id="grand-total">'.$grand.'</h5>
					</div>
				</div>';
		?>
		
		<button style="float: right" id="place_order" class="btn btn-danger mt-3 mr-3 mb-3">Place Order</button>
		</div>
	</div>
</div>
<script type="text/javascript">
	
$(document).ready(function(){
	var url=window.location.search;
	var urlParams=new URLSearchParams(url);
	var order_id=urlParams.get('order_id');
	$('#place_order').click(function(){
		var grandTotal=Number($('#grand-total').text());
   	  $.ajax({
          url:'success.php?order_id='+order_id+ '&grandTotal='+grandTotal,
          method:'GET',
          success:function(data){
          console.log(data);
          if(data){
           $('#message23').text(data);

          }else{
          	 window.location.replace('order_placed.php');
          }
         
          
          },
          error:function(error){
          console.log(error);

          }
       })
   })	 
})
</script>