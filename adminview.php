<script src="//ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="//netdna.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
<link rel="stylesheet" type="text/css" href="//netdna.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"> 
 
<?php	
	
	include ('include/header.php'); 
 ?>
 <link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Baloo+Bhai+2:wght@800&display=swap" rel="stylesheet">

 <style>
 h1{
      color: orange ;
      padding-left: 520px;
      position: relative;
      padding-top: 10px;
      text-decoration: solid;
      font-family: 'Baloo Bhai 2', cursive;
      
 }
 body{
      background-color: #ffcccc;
 }
 td{
     font-family: 'Baloo Bhai 2', cursive;

 }

 .status{
    width: 400px;
 }
 a {
  text-decoration: none;
  display: inline-block;
  padding: 8px 16px;
  
}

a:hover {
  background-color: #ddd;
  color: black;
}
.previous {
  background-color: #f1f1f1;
  color: black;
  
}

.next {
  background-color: #4CAF50;
  color: white;
  
}
 
 </style>
<?php 

if(isset($_POST['accept']) && $_POST['id']){
               
   $SForm ='<div class="alert alert-danger alert-dismissible fade show" role="alert">
   <strong>Are you Sure To Proceed Further?</strong>
   <button type="button" class="close" data-dismiss="alert" aria-label="Close">
       <span aria-hidden="true">&times;</span>
   </button>
   <form target="" method="post">
   <br>
   <button type="submit" name="updateSave" class="btn btn-danger">Yes</button>

   <button type="button" class="btn btn-info" data-dismiss="alert">
   <span aria-hidden="true">  Oops! No </span>
   </button>  

</form>
</div>';

 
//if(isset($SForm)) echo $SForm; 

 
  $y=$_POST['id'];
 $sql="UPDATE donor SET verify=1  WHERE id='$y'";
 if(mysqli_query($connection,$sql))
 {
   

 }
}
if(isset($_POST['reject']) && $_POST['id']){
   $SForm ='<div class="alert alert-danger alert-dismissible fade show" role="alert">
   <strong>Are you Sure To Proceed Further?</strong>
   <button type="button" class="close" data-dismiss="alert" aria-label="Close">
       <span aria-hidden="true">&times;</span>
   </button>
   <form target="" method="post">
   <br>
   <button type="submit" name="updateSave" class="btn btn-danger">Yes</button>

   <button type="button" class="btn btn-info" data-dismiss="alert">
   <span aria-hidden="true">  Oops! No </span>
   </button>  

</form>
</div>';

 
if(isset($SForm)) echo $SForm; 
 $u=$_POST['id'];
 
                              
 $sql="UPDATE donor SET verify=2  WHERE id='$u'";
 
 
 if(mysqli_query($connection,$sql))
 {
   

 }

}



?>
   <a href="a.php" class="previous">&laquo; Go Back</a>
   <a href="adminview2.php" class="next">Next &raquo;</a>
     <h1> User Details and Verification</h1>
  <div class="container"> 
     <div class="row d-flex justify-content-center">
        <div class="col-lg-11 col-12"></div>
          <div class="table-responsive">
          <table  class="table table-dark">
          <thead class="bg-dark text-white"></thead>
          <tr>
             <th class="py-3 text-white">id</th>
             <th class="py-3 text-white">Name</th>
             <th class="py-3 text-white">Email</th>
             <th class="py-3 text-white">City</th>
             <th class="py-3 text-white">Contact</th>
             <th class="py-3 text-white">Proof</th>
             <th class="py-3 text-white">Status</th>
            
            
          </tr>
          
          </thead>
          <tbody>
        
          <?php  include 'include/config.php';
                    
           $selectquery= "select * from donor";
           $query= mysqli_query($connection,$selectquery);
           while ($result = mysqli_fetch_array($query)) {
                  
             
           
           ?>
            <tr>
              <td><?php echo $result['id']; ?></td>
              <td><?php echo $result['name']; ?></td>
              <td><?php echo $result['email'];?></td>
              <td><?php echo $result['city']; ?></td>
              <td><?php echo $result['contact_no']; ?></td>
              <td class="pic"width=400 height=300> <img src="<?php echo $result['proofimg'];?>"width=300 height=300 ></td>
              <td class="status" width=400 > 

     <?php
              
              if($result['verify']=='0'){ 
              echo'<form target="" method="post">
                    
                             <button style="margin-top: 20px;" name="accept" type="submit"   class="btn btn-lg btn-success center-aligned ">Accept</button>
                             <button style="margin-top: 20px;" name="reject" type="submit" class="btn btn-lg btn-danger center-aligned ">Reject</button>
                             <input type="hidden" name="id" value="'.$result['id'].'"/> </form>';
                             
               }
                             
               if($result['verify']=='1')  {
                  echo 'Accepted';
                             }
                  if($result['verify']=='2')  {
                  echo 'Rejected';
                          }              
                             
                             
                             ?>
                     

                             
            
              </td>
             
            </tr> 
            <?php
           }  
           ?>     
               
</tbody>
</table>
</div>
  </div>
  </div>
  
