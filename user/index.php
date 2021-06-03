
<link rel="stylesheet" type="text/css" href="//netdna.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
<script src="//ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="//netdna.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script> 


<!--<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script> -->

 
<?php 

	include 'include/header.php'; 
	if(isset($_SESSION['user_id'])  && !empty($_SESSION['user_id'])){
        $x=$_SESSION['user_id'];
		$sql="SELECT verify from  donor WHERE id='$x'";
		$result =mysqli_query( $connection,$sql);
		   if(mysqli_num_rows($result)>0){
  
			while($row = mysqli_fetch_assoc($result)){
			  $verify=$row['verify'];
			}
		  }

		  $sql2="SELECT verifytwo from  donor WHERE id='$x'";
		$result =mysqli_query( $connection,$sql2);
		   if(mysqli_num_rows($result)>0){
  
			while($row = mysqli_fetch_assoc($result)){
			  $verifytwo=$row['verifytwo'];
			}
		  }


	
						
						
		
		

		

	 if(isset($_POST['date'])){
	 	$showForm ='
	 	<div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Are you Sure To Proceed Further?</strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <form target="" method="post">
                <br>
                <input type="hidden" name="userID" value="'.$_SESSION['user_id'].'">
                <button type="submit" name="updateSave" class="btn btn-danger">Yes</button>

                <button type="button" class="btn btn-info" data-dismiss="alert">
                <span aria-hidden="true">  Oops! No </span>
                </button>  
		     
            </form>
     </div>



	 	';
	 }
	 if(isset($_POST['userID'])){

	 	$userID =$_POST['userID'];
        $currentDate= date_create();
        $currentDate=date_format($currentDate,'Y-m-d');

       $sql = "UPDATE donor SET save_life_date='$currentDate' WHERE id='$userID' ";
        if(mysqli_query($connection,$sql))
       {

       	  $_SESSION['save_life_date']=$currentDate;
       	  
       }
        $sql="UPDATE donor SET no_of_time= no_of_time +1  WHERE id='$userID'";
if(mysqli_query($connection,$sql))
      {
      	 header("Location: index.php");

      }
	  
       else
       {
       	 $submitError=  '<div class="alert alert-danger alert-dismissible fade show" role="alert">
  <strong>Data not inserted properly...</strong>
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>';

       }
	 }
	

?>


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
		background-color:#161B21;
		color: #F4A950;
		border-radius: 5px;
		margin:20px 5px 0px 5px;
		-webkit-box-shadow: 0px 2px 5px -2px rgba(89,89,89,0.95);
		-moz-box-shadow: 0px 2px 5px -2px rgba(89,89,89,0.95);
		box-shadow: 0px 2px 5px -2px rgba(89,89,89,0.95);
		padding: 20px;
	}

body {
  background-color: #FFE5B4;
 
}
</style>

			<div class="container" style="padding: 60px 0;">
			<div class="row">
				<div class="col-md-12 col-md-push-1">
					<div class="panel panel-default" style="padding: 20px;">
						<div class="panel-body">
							<?php if(isset($submitError)) echo $submitError;
?>
								<div class="alert alert-danger alert-dismissable" style="font-size: 18px; display: none;">
    						
    								<strong>Warning!</strong> Are you sure you want a save the life if you press yes, then you will not be able to show before 3 months.
    							
    							<div class="buttons" style="padding: 20px 10px;">
    								<input type="text" value="" hidden="true" name="today">
    								<button class="btn btn-primary" id="yes" name="yes" type="submit">Yes</button>
    								<button class="btn btn-info" id="no" name="no">No</button>
    							</div>
  							</div>
							 
							<div class="heading text-center">
								<h1>Welcome</h1><br> 
								<h1>
									<?php 
									 if(isset($_SESSION['name'])) echo $_SESSION['name'];
									 
									 


									 ?></h1>
							</div>
							<p class="text-center">Here you can Manage your account and update your profile</p>
							<div class="test-success text-center" id="data" style="margin-top: 20px;">
							<?php if(isset($showForm)) echo $showForm?><!-- Display Message here--></div>
						

							<?php
													

													
								$safeDate = $_SESSION['save_life_date'];
								
							
						    if($safeDate=='0' && $verify=='0')
							{
								echo'<script>
								window.alert("Cannot Donate,Your Verification is under Process,Try Again Sometime");
								</script>';

								echo '<div class="donors_data">
      							<span class ="name">WAIT!</span>
      							<span>Your Documents are Under Verification, You Can Donate Once all the details Verified by Our Admin</span>
      							<div class="test-success text-center" id="data" style="margin-top: 20px;"><!-- Display Message here--></div>
                               </div>';
							
                              
							}
							if( $verify=='2')
							{
								echo'<script>
								window.alert("Cannot Donate,Your Verification was Unsucessfull!");
								</script>';

								echo '<div class="donors_data">
      							<span class ="name">FAILED!</span>
      							<span>Verification Failed, It seems you have provided wrong data</span>
      							<div class="test-success text-center" id="data" style="margin-top: 20px;"><!-- Display Message here--></div>
                               </div>';
							
                              
							}

							 if($safeDate=='0' && $verify=='1' && $verifytwo=='0')
							 {
								
							 	echo '<form target="" method="post">
                             <button style="margin-top: 20px;" name="date" id="save_the_life"type="submit" class="btn btn-lg btn-danger center-aligned ">Save The Life </button>
							</form>';
							;

							 }
							 else if(($verifytwo=='2'))
							 {
								echo '<div class="donors_data">
								<span class ="name">Donation Failed!</span>
								<span>It Appears You have not Donated in Real</span>
								<div class="test-success text-center" id="data" style="margin-top: 20px;"><!-- Display Message here--></div>
							 </div>';
                                        
							 }
							 if($verify!='2')
							 {
							  if(($verifytwo=='0') ||(($verifytwo=='3')))
							 {
								if($safeDate=='0')
								{
									echo '';

								}
								else{
								echo '<div class="donors_data">
								<span class ="name">Donation Verifying!</span>
								<span>Your Receipt is Under Verification</span>
								<br>
								<a href="../history.php" target="_blank" >Click here to upload Receipt
								<div class="test-success text-center" id="data" style="margin-top: 20px;"><!-- Display Message here--></div>
							 </div>';
								}
                                        
							 }
							}
							 
							 
							 if ($safeDate!='0' && $verify=='1' && $verifytwo=='1'){
          							$start = date_create("$safeDate");
          							$end   = date_create();
          							$diff  = date_diff( $start, $end);

          							$diffstart = $diff->y;
          							$diffmonth = $diff->m;
          							$diffDays  = $diff->d;

                                    echo '<strong>Time Since You Donated<p></strong>';
          							echo "<strong>Its been</strong> ".$diffmonth."<strong> Months and </strong>";
          							echo $diffDays."<strong> Days</strong>";


                                 if($diffmonth >= 3 )
                                 {


									$sql="UPDATE donor SET save_life_date=0,donateproof='',verifytwo=3 WHERE id='$x'";
                                    if(mysqli_query($connection,$sql))
									{
										
									}

									 
									
                                 	echo '<form target="" method="post">
                             <button style="margin-top: 20px;" name="date" id="save_the_life"type="submit" class="btn btn-lg btn-danger center-aligned ">Save The Life </button>
							</form>';

                                 }
								
                                 else{
									 if($verifytwo=='1'){
                                 	echo '<div class="donors_data">
      							<span class ="name">Congratulations!</span>
      							<span>You Saved the Life and completed the Donation. You can donate the blood after 3 months.Thank You</span>
      							<div class="test-success text-center" id="data" style="margin-top: 20px;"><!-- Display Message here--></div>
                               </div>';
								}

                                 }

							 	

							 }


							?>
							



							
							
                               
							
						</div>



					</div>
				</div>
			</div>
		</div>
		
		
  
<?php
  }else{
		header("Location: ../index.php");

	}
	?>