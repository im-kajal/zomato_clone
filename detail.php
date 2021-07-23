<?php 
$res_id=$_GET['res_id'];
include "includes/dbhelper.php";
// $query="SELECT * FROM restaurant WHERE res_id=$res_id";
// $result=mysqli_query($conn,$query);
// $row = mysqli_fetch_assoc($result);
// print_r($row);
$query1="SELECT * FROM menu WHERE res_id=$res_id";
$result1=mysqli_query($conn,$query1);

include "includes/header.php"; 
?>

<div class="container mt-5">
	<div class="row">
		<div class="col-8">
			<?php
			$query="SELECT * FROM restaurant WHERE res_id=$res_id";
			$result=mysqli_query($conn,$query);
			$row = mysqli_fetch_assoc($result);
            
			echo '<img style="height:450px;width:100%" src="'.$row['photo'].'">
			      <span><h1>'.$row['res_name'].'</h1></span>';
			$star=$row['rating'];
			for ($i = 0; $i < $star; $i++) { 
			      	echo '<span class="btn fas fa-2x fa-star text-danger" style="margin-left:-16px"></span>';
			      }  
			for ($i=$star; $i <5; $i++) { 
			    	echo '<span class="btn far fa-2x fa-star" style="margin-left:-16px"></span>';
			    }    
            echo '<span>('.$row['vote'].' people voted)</span>';
			if($is_logged_in){
	            $query3="SELECT * FROM bookmark WHERE user_id=$user_id AND res_id=$res_id";
	            $result3=mysqli_query($conn,$query3);
	            $num_rows3=mysqli_num_rows($result3);
	            if($num_rows3==0){
	               echo  '<span><p id="bookmark" style="float: right"><i class=" btn far fa-bookmark fa-2x"></i></p></span>';
	            }else{
	               echo  '<span><p id="bookmark" style="float: right"><i class=" btn text-danger fas fa-bookmark fa-2x"></i></p></span>';  
	            }
            }

		    echo  '<p>'.$row['cuisins'].'</p>
			      <p class="text-muted">'.$row['address'].'</p>
			      <p>Opens 11am to 11pm</p>';
			?>
			
		</div>

	</div>
	<hr>
	<div class="row">
		<div class="col-3">
			<h3>Menu</h3>
			<?php
			while ($row1 = mysqli_fetch_assoc($result1)) {
				echo '<div><span>'.$row1['dish_name'].'</span>
			<span style="float: right">'.$row1['price'].'</span></div>';
			}
			?>	
		</div>
		<div class="col-9">
			 <?php
			$query1="SELECT * FROM menu WHERE res_id=$res_id";
            $result1=mysqli_query($conn,$query1); 
			while ($row1 = mysqli_fetch_assoc($result1)) {
				$dish_id=$row1['dish_id'];
				$category=$row1['category'];
				
				if (strpos($category, 'non-veg') !== false) {
				    echo '<div class="row">
					<div class="col-3 mt-3">
					<img style="height:200px;width:100%;border-radius:20px;"src="'.$row1['image'].'">
					</div>
					<div class="col-9">
					<span><h4><span><img style="height:15px;width:15px" src="https://www.searchpng.com/wp-content/uploads/2019/09/Non-Veg-Sign-715x715.jpg">	</span>'.$row1['dish_name'].'</h4></span>';

				}else{
					echo '<div class="row">
					<div class="col-3 mt-3">
					<img style="height:200px;width:100%;border-radius:20px;"src="'.$row1['image'].'">
					</div>
					<div class="col-9">
					<span><h4><span><img style="height:15px;width:15px" src="https://www.clipartmax.com/png/small/299-2998556_vegetarian-food-symbol-icon-non-veg-symbol-png.png">	</span>'.$row1['dish_name'].'</h4></span>';
				}

			
                if($is_logged_in==1){
                	$query2="SELECT * FROM cart WHERE dish_id=$dish_id AND user_id=$user_id";
					$result2=mysqli_query($conn,$query2);
					$row2 = mysqli_fetch_assoc($result2);
					if(!empty($row2['quantity']) ){
						$quantity=$row2['quantity'];
						echo '<span style="float: right" id="add-btn'.$row1['dish_id'].'" >
							
						    <button data-id='.$row1['dish_id'].' class=" update btn btn-outline-danger btn-sm">-</button>
						    <span id="quantity'.$row1['dish_id'].'" class="ml-1 mr-1"><b>'.$quantity.'</b></span>
							<button data-id='.$row1['dish_id'].' class=" update btn btn-outline-danger btn-sm ">+</button>
							
	                        </span>';
						

					}else{
						echo '<span  style="float: right"><button class=" add-btn btn btn-outline-danger text-dark " data-id='.$row1['dish_id'].' >Add+</button></span>';
					}

                }else{
					echo '<span data-toggle="modal" data-target="#login" style="float: right"><a href="#" class=" btn btn-outline-danger text-dark" data-id='.$row1['dish_id'].' >Add+</a></span>';
				}
				
				echo '<p>₹<span  id="price'.$row1['dish_id'].'">'.$row1['price'].'</span></p>
					  <p>Eat Bestseller and stay home</p>
					  </div>
				      </div>';	
			}
			?>
		
			
		</div>
	</div>

	
	   
</div>
<script type="text/javascript">
	
	
	$(document).ready(function(){
		var url=window.location.search;
		var urlParams=new URLSearchParams(url);
		var res_id=urlParams.get('res_id');

       $('.add-btn').click(function(){
       	 var dish_id=$(this).attr('data-id');
       	  $.ajax({
              url:'add_to_cart.php?dish_id='+dish_id+ '&res_id='+res_id,
              method:'GET',
              success:function(data){
              console.log(data);
              if( data == ""){
                window.location.reload(); 
              }else{
              	 $('#message').text(data);
                 $('#cart').modal('show'); 
              	
              }
              
              },
              error:function(error){
              console.log(error);

              }
            })
       })

       $('.update').click(function(){
		var sign=$(this).text();
	    var dish_id=$(this).attr('data-id');
	    var quantity=$('#quantity' + dish_id).text();
	    var total=Number($('#total').text());
	    var price=Number($('#price' + dish_id).text());
	    var amount=Number($('#amount'+dish_id).text());
	  
			$.ajax({
				url:'update_dish_quantity.php?dish_id=' +dish_id + '&quantity=' +quantity+ '&sign='+sign,
				method:'GET',
				success:function(data){
					if(sign=='+'){
						$('#quantity'+dish_id).text(Number(quantity)+1);
						$('#mquantity'+dish_id).text(Number(quantity)+1);
					    $('#total').text(total + price);
					    $('#amount'+dish_id).text(Number(amount)+price);
	                    

					}else{
	                    $('#quantity'+dish_id).text(Number(quantity)-1);
	                    $('#mquantity'+dish_id).text(Number(quantity)-1);
					    $('#total').text(total - price);
					    $('#amount'+dish_id).text(Number(amount)-price);
					    if(Number(quantity)-1===0){
					    	
					    	$.ajax({
					    		url:'remove_product_from_cart.php?dish_id='+dish_id,
					    		method:'GET',
					    		success:function(data){
					    		   // $('#cart').reload();
	                               window.location.reload();
	                               // $('#quantity'+dish_id).siblings().hide();
					    			
					    		},
					    		error:function(error){
	                                  console.log(error);
					    		}
					    	})
					    }

					}
					
				},
				error:function(error){
					console.log(error);
			    }		
		   })
	   })	

       
       $('#bookmark').on('click','i.far',function(){
       	$.ajax({
       		url:'update_bookmark.php?res_id='+res_id + '&action=1',
       		method:'GET',
       		success:function(data){
       			console.log(data);
       			$('#bookmark').html("<i class='btn text-danger fas fa-bookmark fa-2x'></i>");
       		},
       		error:function(error){
       			console.log(error);
       		}
       	})


       })
       $('#bookmark').on('click','i.fas',function(){
       	$.ajax({
       		url:'update_bookmark.php?res_id='+res_id + '&action=0',
       		method:'GET',
       		success:function(data){
       			console.log(data);
       			$('#bookmark').html("<i class='btn far fa-bookmark fa-2x'></i>");
       		},
       		error:function(error){
       			console.log(error);
       		}
       	})
       })


	});
	
               
                       
 
</script>
</body>
</html>