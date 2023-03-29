<?php 
ini_set('session.cache_limiter','public');
session_cache_limiter(false);
session_start();
include("config.php");
if(!isset($_SESSION['uemail']))
{
	header("location:login.php");
}				
				
?>
 <!DOCTYPE html>
<html lang="en">

                    <head>
                    <meta charset="utf-8">
                    <meta http-equiv="X-UA-Compatible" content="IE=edge">
                    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
                    <meta http-equiv="X-UA-Compatible" content="IE=edge">
                    <link rel="shortcut icon" href="prop.png">
                    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
                    <link rel="stylesheet" type="text/css" href="css/style.css">



<title>Property Hub</title>
</head>
<body>
    
		<?php include("include/header.php");?>

     
<section class="mt-2 pt-2"> 
 <div class="container rounded shadow">
    <div class="row my-5">
        <div class="col-md">
<div class="container my-5 py-5">
            <div class="row justify-content-center align-items-center text-muted">
                 <h2 class="text-center text-muted">Your details</h2>
    <?php 
        $uid=$_SESSION['uid'];
        $query=mysqli_query($con,"SELECT * FROM `user` WHERE uid='$uid'");
        while($row=mysqli_fetch_array($query))
        {
    ?>
    <div class="col-md text-center">
        <img src="admin/user/<?php echo $row['6'];?>" alt="userimage" width="150px" style="border-radius: 50%;">
    </div>
    <div class="col-md">
        <div class="mb-3"><b>Name:</b> <?php echo $row['1'];?></div>
    </div>
    <div class="col-md">
        <div class="mb-3"><b>Email:</b> <?php echo $row['2'];?></div>
    </div>
    <div class="col-md">
        <div class="mb-3"><b>Mobile#:</b> <?php echo $row['3'];?></div>
    </div>
    </div>
    <?php } ?>
</div>


                <h2 class="text-secondary   text-center">Your Listing</h2>
                <?php 
                    if(isset($_GET['msg'])) {
                        echo $_GET['msg'];
                    }
                ?>
                    
                    <div class="table-responsive">
<div class="table-responsive">
  <table class="table table-striped table-bordered">
    <thead class="bg-primary text-white">
      <tr>
        <th scope="col">Listing Name</th>
        <th scope="col">Type</th>
        <th scope="col">Location</th>
        <th scope="col">Price</th>
        <th scope="col">Availability</th>
        <th scope="col">Actions</th>
      </tr>
    </thead>
    <tbody>
      <?php
      $uid = $_SESSION['uid'];
      $query = mysqli_query($con, "SELECT * FROM `property` WHERE uid='$uid'");
      while ($row = mysqli_fetch_array($query)) {
      ?>
        <tr>
          <td>
            <div class="d-flex align-items-center">
                <h5 class="text-secondary text-uppercase mb-1"><a href="propertydetail.php?pid=<?php echo $row['0']; ?>"><?php echo $row['1']; ?></a></h5>
            </div>
          </td>
          <td><?php echo $row['5']; ?></td>
          <td><?php echo $row['14']; ?></td>
          <td>₱<?php echo $row['13']; ?></td>
          <td><?php echo $row['24']; ?></td>
          <td>
            <div class="d-flex justify-content-center">
              <a class="btn btn-warning btn-sm mx-1" href="submitpropertyupdate?id=<?php echo $row['0']; ?>">Update</a>
              <a class="btn btn-warning btn-sm mx-1" href="submitpropertydelete?id=<?php echo $row['0']; ?>">Remove</a>
            </div>
          </td>
        </tr>
      <?php } ?>
    </tbody>
  </table>
</div>

</div>

            </div>         
        </div>
    </div>
</div>
</section>
   
        
        
  
		<?php include("include/footer.php");?>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js" integrity="sha384-eMNCOe7tC1doHpGoWe/6oMVemdAVTMs2xqW4mwXrXsW0L84Iytr2wi5v2QjrP/xp" crossorigin="anonymous"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/effects.js"></script>

 
        


</body>
</html>