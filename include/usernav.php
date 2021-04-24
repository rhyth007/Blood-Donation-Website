<link rel="stylesheet" type="text/css" href="//netdna.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
<script src="//ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="//netdna.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script> 

<!--<script src="http://code.jquery.com/jquery-1.11.0.min.js"></script> 
<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script> 
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script> -->


<nav id="mainNav" class="navbar fixed-top navbar-default navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="./index.php">DONATETHEBLOOD</a>
  
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarTogglerDemo02">

    <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
      
    </ul>
    
    <ul class="navbar-nav form-inline my-2 my-lg-0">
      <li class="nav-item">
        <a class="nav-link" href="history.php">History</a>
      </li>
          <li class="nav-item">
        <a class="nav-link" href="ranking.php">Ranking</a>
      </li>

      <li class="nav-item">
        <a class="nav-link" href="index.php">Home</a>
      </li>
      
      <li class="nav-item">
        <a class="nav-link" href="donor.php">Donors</a>
      </li>

      <li class="nav-item">
        <a class="nav-link" href="search.php">Search</a>
      </li>

      <li class="nav-item">
        <a class="nav-link" href="signin.php">Signin</a>
      </li>
      
      
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">

          <?php  if(isset($_SESSION['name'])) echo $_SESSION['name'];?> <!-- Donor Name -->
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
          
          <a class="dropdown-item" href="user/index.php"><i class="fa fa-user" aria-hidden="true"></i>Profile</a>

          <a class="dropdown-item" href="user/update.php"><i class="fa fa-edit" aria-hidden="true"></i>Update Profile</a>

          <a class="dropdown-item" href="user/logout.php">
          <i class="fa fa-arrow-circle-left" aria-hidden="true"></i>

Logout</a>
          </div>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="about.php">About Us</a>
      </li>
    

    </ul>
  </div>
</nav>