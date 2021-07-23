
<?php
include "includes/header.php";
?>
<div class="container">
	<div class="row mt-5" style="border:1px solid #ddd; border-radius: 10px;background-color: #fff">
		<?php
		echo '<img src="images/'.$_SESSION['image'].'" style="height:150px;width:150px;margin-left:35%;border-radius:250px" class="mt-5 mb-5">
		    <h4 style="margin-top:100px; margin-left:10px">'.$_SESSION['name'].'</h4>';
		?>
	</div>
	<div class="row">
		<div class="col-3 mt-5">
			<div class="card">
				<div class="card-body">
				    <?php
				    echo '<img  class="image" src="images/'.$_SESSION['image'].'" style="height:200px;width:210px;">
				    <h4 style=" margin-left:10px">'.$_SESSION['name'].'</h4>';
				    ?> 
				    <button class="btn btn-danger upload" data-toggle="modal" data-target="#upload-image">Change Picture</button>
		        </div>
		    </div> 
		</div>    
		<div class="col-6">
			<div class="row mt-3" >
		    	<div class="col-12">
		    		<div class="card">

				    	<div class="dropright" >
						  <p class="dropdown-toggle ml-5" data-toggle="collapse" href="#edit_profile" aria-haspopup="true" aria-expanded="false" >
						    Edit Profile
						  </p>
						  <div class="collapse ml-5 mr-5" id="edit_profile">
						    <h4>Edit Profile</h4>
						    
						    <form action="edit_name.php" method="POST">
					        <label><b>Your Name</b></label>
					        <input type="text" name="name" class="form-control ">
					        <!-- <label><b>Email</b></label>
					        <input type="email" name="email" class="form-control"> -->
					        <label><b>Password</b></label>
					        <input type="password" name="password" class="form-control"><br>
					        <input type="submit" name="Upload" class="btn btn-lg btn-danger btn-block text-white" value="continue">
					        </form>
						  </div>
						</div>	

						<div class="dropright">
						  <p class="dropdown-toggle ml-5" data-toggle="collapse"  href="#privacy" aria-haspopup="true" aria-expanded="false" >
						    Privacy
						  </p>
						  <div class="collapse" id="privacy">
						    <button class="btn btn-secondary ml-5" id="delete_ac">Delete my account</button>
						    <p>Please note that this action is irreversible and all the data associated with your account will be permanently deleted.</p>
						  </div>
					    </div>
						 
					</div>  
				</div>
            </div> 
		</div>
	</div>


	<div class="modal fade" id="upload-image" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
	  <div class="modal-dialog">
	    <div class="modal-content">
	      <div class="modal-header">
	        <h5 class="modal-title" id="staticBackdropLabel">Edit profile picture</h5>
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	          <span aria-hidden="true">&times;</span>
	        </button>
	      </div>
	      <div class="modal-body">
             
             <form action="edit_image.php" method="post" enctype="multipart/form-data" >
             	<label><b>Upload Picture</b></label>
			    <input type="file" name="image" class="form-control " multiple accept="image/*" id="image">
			    <input type="submit" name="submit" class="btn mt-3 btn-danger btn-block text-white" value="Upload">
             </form>
	        
	      </div>
	    </div>
	  </div>
	</div>


</div>
<script type="text/javascript">
	$('#delete_ac').click(function(){
		 $.ajax({
			url:'delete_account.php',
			type:"GET",
			success:function(data){
	            console.log(data);
	            $.ajax({
	                url:'logout.php',
	                type:"GET",
	                success:function(data){
                        window.location.replace('index.php');
                        },
				     error:function(error){
				        console.log(error);
				    }
                })
	        },
		    error:function(error){
		        console.log(error);
		    }
		})	
	
	})
	
</script>
</body>


<style type="text/css">
	body{
		background-color: #eee;
	}
	.card-body:hover .image {
	  opacity: 0.3;
	}
	.upload {
	  opacity: 0;
	  position: absolute;
	  top: 50%;
	  left: 50%;
	  transform: translate(-50%, -50%);
	  -ms-transform: translate(-50%, -50%);
    }

    .card-body:hover .upload {
	  opacity: 1;
	}
	
</style>
</html>
