
<?php
session_start();
include "includes/dbhelper.php";

if(!empty($_SESSION)){
 $is_logged_in=1;

 $user_id=$_SESSION['user_id'];
}else{
 $is_logged_in=0;
}
// $_GET['error']=null;

?>
<!DOCTYPE html>
<html>
<head>
	<title>Zomato</title>
	<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
	<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css">
	<!-- <link rel="stylesheet" type="text/css" href="css/style.css"> -->
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
  
</head>
<style type="text/css">
.jumbotron-bg{
	background-image: url('https://cdn.hipwallpaper.com/m/37/30/0EF75T.jpg');
	background-size:cover;
	background-repeat: no-repeat;

}
</style>

<body>
	<nav class="navbar bg-danger">
		<a href="index.php" class="text-white" style="font-size: 40px">Zomato</a>
     <?php
     if($is_logged_in){
       echo '<img src="images/'.$_SESSION['image'].'"    style="height:45px;width:45px;margin-left:65%;border-radius:25px">
              <div class="dropdown mt-2 " style="margin-right:80px;">
              
              <p class="text-white dropdown-toggle" type="" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
               '."Hi! ".$_SESSION['name'].'
              </p>
              <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                <a class="dropdown-item" href="orders.php">Orders</a>
                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#cart">My Cart</a>
                <a class="dropdown-item" href="bookmark.php">Bookmarks</a>
                <a class="dropdown-item" href="setting.php">Settings</a>
                <a class="dropdown-item" href="logout.php">Logout</a>
              </div>
            </div>';
     }else{
      echo '
           
           <a href="#" class=" text-white" style="font-size:20px;style="margin-left:100%" data-toggle="modal" data-target="#login">Log in</a>
           
           <a href="#" class=" text-white" style="font-size:20px;" data-toggle="modal" data-target="#signup">
           Sign up</a>';


     }
     ?>
  </nav>

   <?php
	 if($is_logged_in){
    echo '
      <div class="modal fade" id="cart" tabindex="-1" aria-labelledby="yourOrders" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="yourOrders" >your Orders</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <p id="message" class="text-danger"></p>';
           
           $query="SELECT * FROM cart c JOIN menu m ON c.dish_id = m.dish_id WHERE c.user_id = $user_id";
           $result=mysqli_query($conn,$query);
           $amount=0;
           $total=0;
           while($row=mysqli_fetch_assoc($result)){
           $amount=$amount + $row['price']*$row['quantity'];
           $total=$total + $amount;
           // $res_id=$row['res_id'];

            echo '<div class="row">
                <div class="col-6">
                   <p><strong>'.$row['dish_name'].'</strong></p>
                   <p style="margin-top:-20px" >Rs <span id="pricec'.$row['dish_id'].'">'.$row['price'].'</span></p>
                </div>
                <div class="col-3">
                  <button data-id='.$row['dish_id'].' class=" updatec btn btn-outline-danger btn-sm">-</button>
                <span id="mquantity'.$row['dish_id'].'" class="ml-1 mr-1"><b>'.$row['quantity'].'</b></span>
              <button data-id='.$row['dish_id'].' class=" updatec btn btn-outline-danger btn-sm ">+</button>
                    </div>
                    <div class="col-3">
                    <p>Rs <span id="amount'.$row['dish_id'].'">'.$amount.'</span></p>
                    </div>
                      </div>
                      <hr>';
                      $amount=0;
           }
           $num_rows=mysqli_num_rows($result);
            if($num_rows==0){
              echo '<p class="text-danger">Your cart is empty</p>';
             }else{
              echo '<div class="row">
                      <div class="col-5">
                      <h5> Subtotal: ₹<span id="total">'.$total.'</span></h5>
                      </div>
                      <div class="col-4">
                      <a href="clear_cart.php" class="btn btn-outline-danger">Clear Cart</a>
                      </div>
                      <div class="col-3">
                      <button id="checkout-btn" class="btn btn-danger">Checkout</button>
                      </div>

                   </div>';
             
             }      
                 
              echo   ' </div>
                  </div>
                </div>
              </div>';

           
           
          
   }

    ?>


  <div class="modal fade" id="login" tabindex="-1" aria-labelledby="logIn" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="logIn">Log in</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <?php
         if(!empty($_GET)){
          if($_GET['error']==1){
              echo '<p class="text-danger">Incorrect Email/Password</p>';
          }
        } ?>
        <form action="login_validation.php" method="POST">
        <label><b>Email</b></label>
        <input type="email" name="email" class="form-control">
        <label><b>Password</b></label>
        <input type="password" name="password" class="form-control"><br>
        <input type="submit" class="btn btn-lg btn-danger btn-block text-white" value="continue">
        </form>
      
        <small>By continuing, you agree to Zomato's Conditions of Use and Privacy Notice.</small>
        <hr>
        <div align="center">
          <small align="center">New to Zomato?</small>
          <a  href="#"class=" mt-2 text-danger" data-toggle="modal" data-target="signup" id="signup-btn">create account</a>
        </div>
      </div>
     </div> 
    </div>
  </div>

 

  <div class="modal fade" id="signup" tabindex="-1" aria-labelledby="signIn" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="signIn">Sign up</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <?php
         if(!empty($_GET)){
          if($_GET['error']==2){
              echo '<p class="text-danger">User already exists</p>'; 
          }
         } ?>
        <form action="reg_validation.php" method="POST">
        <label><b>Your Name</b></label>
        <input type="text" name="name" class="form-control ">
        <label><b>Email</b></label>
        <input type="email" name="email" class="form-control">
        <label><b>Password</b></label>
        <input type="password" name="password" class="form-control"><br>
        <input type="submit" name="" class="btn btn-lg btn-danger btn-block text-dark" value="continue">
        </form>
        <hr>
        <div align="center">
          <small class="mt-2">Already have an account? <a href="#" class="text-danger"  id="login-btn">Sign in</a></small>
        </div>
      </div >
     
     </div>
  </div>
</div>


<script type="text/javascript">
$('#signup-btn').click(function() {
    // var link = $('#login').data('link');
    // location.href = link;
    $('#login').modal('hide');
    $('#signup').modal('show');
})
$('#login-btn').click(function() {
    $('#signup').modal('hide');
    $('#login').modal('show');
})


$('#checkout-btn').click(function(){
     // var amount=Number($('#total').text());
     alert(0);
    $.ajax({
      url:'place_order.php',
      type:"POST",
      // data: {amount:amount},
      success:function(data){
                 console.log(data);
                  window.location.replace('checkout.php?order_id='+data,);
                 // if(!empty(data)){
                 //    window.location.replace('checkout.php?order_id='+data,);
                 // }else{
                 //    header('Location: ' . $_SERVER['HTTP_REFERER'].'');
                 // }
                 
             },
      error:function(error){
        console.log(error);
      }

    })
})



 $('.updatec').click(function(){

    var sign=$(this).text();
      var dish_id=$(this).attr('data-id');
      var quantity=$('#mquantity' + dish_id).text();
      var total=Number($('#total').text());
      var price=Number($('#pricec' + dish_id).text());
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
});

</script>
 
