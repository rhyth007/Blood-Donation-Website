
<!--<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script> -->

<?php 

	include 'include/header.php'; ?>

<style>
	h1,h3{
		display: inline-block;
		padding: 10px;

	}

	.name{
		color: #DC1D26;
		font-size: 22px;
		font-weight: 700;
	}
	.donors_data{
		background-color: grey;
		color: white;
		border-radius: 5px;
		margin:20px 10px 0px 5px;
		-webkit-box-shadow: 0px 2px 5px -2px rgba(89,89,89,0.95);
		-moz-box-shadow: 0px 2px 5px -2px rgba(89,89,89,0.95);
		box-shadow: 0px 2px 5px -2px rgba(89,89,89,0.95);
		padding: 50px;
		position: relative;
		margin-left:400px;
		margin-top:;

	}
	b{
		
	}

body {
  background-color: #FFE5B4;
 
}
</style>

		

<?php
              if(isset($_POST['submit'])){
$file=$_FILES['photo'];
// print_r($file);
 $filename = $file['name'];
 $filepath = $file['tmp_name'];
 $fileerror = $file['error'];

 if($fileerror == 0)
 {
   $destfile = 'upload/'.$filename;
   //echo "$destfile";
   move_uploaded_file($filepath,$destfile);
                      
   if(isset($_SESSION['user_id'])  && !empty($_SESSION['user_id'])){
	                    $x=$_SESSION['user_id'];

				
				 $sql= "UPDATE donor  SET donateproof ='$destfile' WHERE id='$x'";
   }

					   if(mysqli_query( $connection,$sql)){
					   }


					}

	}

?>

			<div class="container" style="padding: 60px 0;">
			<div class="row">
				<div class="col-md-12 col-md-push-1">
					<div class="panel panel-default" style="padding: 20px;">
						<div class="panel-body">
							
    							
    						
  							</div>
							<div class="heading text-center">
								<h1>Welcome</h1><br> <h1><?php  if(isset($_SESSION['name'])) echo $_SESSION['name'];?></h1>
							</div>
							<p class="text-center">Here you can See Your Donate History</p>
							<div class="test-success text-center" id="data" style="margin-top: 20px;"><?php if(isset($showForm)) echo $showForm?><!-- Display Message here--></div>
	<form class="form-group" action="" method="post" enctype="multipart/form-data">
			<div class="form-group">
						<label for="file">Upload Image of the Identity Document</label>
						<br>
						<input type="file" class="form-control" name="photo" required="" 
						style="padding:2px;">
						
            </div><!--End form-group-->
			<div class="form-group">
						<button id="submit" name="submit" type="submit" class="btn btn-lg btn-danger center-aligned" style="margin-top: 20px;">SUBMIT
            </button>
			</div>
	</form>

							
<?php
    $connection = mysqli_connect("localhost","root","" ,"donatetheblood");

?>
	<?php
	    print "<b>Donated Details: <b>";
									    
        $user=$_SESSION['user_id'];

	 									      
	 	$sql= "SELECT save_life_date,city,blood_group FROM donor WHERE id='$user' ";
	 	 $result =mysqli_query($connection,$sql);
	     if(mysqli_num_rows($result)>0){
		while($row = mysqli_fetch_assoc($result)){

		 if($row['save_life_date']>'0'){


		echo '<div class="col-md-3 col-sm-12 col-lg-3 donors_data">
		<span>Date of Donation:</span>												            
	    <span>'.$row['save_life_date'].'</span>
	    <span><br>Blood Group:</span>
	    <span>'.$row['blood_group'].'</span>	
	    <span><br>City : </span>
	    
	    <span>'.$row['city'].'</span>
        						           				
		</div>';
									            
        }

    }

}
?>
									 
									                                         
									         
									                                        