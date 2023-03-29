<?php 
ini_set('session.cache_limiter','public');
session_cache_limiter(false);
session_start();
include("config.php");
								
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
<section class="my-5 py-5">
        <div class="container my-5 py-5 justify-content-center">
            
            <?php 
            if(isset($_REQUEST['filter'])) {
                $city=$_REQUEST['city'];
                $sql="SELECT property.*, user.uname, user.utype, user.uimage 
                FROM property 
                JOIN user ON property.uid = user.uid 
                WHERE city = '{$city}'
                ";
                
                $result=mysqli_query($con,$sql);

                if(mysqli_num_rows($result)>0) {
                    if($result == true) {
                        ?>
   <div class="row my-5 py-5 justify-content-center">
    <?php while($row=mysqli_fetch_array($result)) { ?> 
      
           <div class="col-sm-6 col-md-4 col-lg-3 mb-4">
                           <div class="card h-100 border-0 shadow rounded">
                <div class="position-relative">
                    <img class="card-img-top" src="admin/property/<?php echo $row['18']; ?>" alt="pimage" style="height: 200px; object-fit: cover;">
                    <div class="card-img-overlay d-flex flex-column justify-content-end align-items-center">
                        <a href="propertydetail?pid=<?php echo $row['0'];?>" class="btn btn-sm btn-primary mb-3">View details</a>
                    </div>
                </div>
                <div class="card-body bg-light">
                    <h5 class="card-title"><?php echo $row['1']; ?></h5>
                    <hr>
                    <div class="row">
                        <div class="col-md-6">
                            <p class="card-text"><i class="fas fa-map-marker-alt text-warning"></i> <?php echo $row['15'];?></p>
                        </div>
                        <div class="col-md-6">
                            <div class="d-flex justify-content-end align-items-center">
                                <p class="card-text mb-0 ms-3"><strong>₱<?php echo $row['13'];?></strong></p>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="d-flex justify-content-between align-items-center">
                        <div class="text-secondary"><?php echo $row['24']; ?></div>
                        <span class="badge bg-primary text-white"><?php echo $row['5']; ?></span>
                    </div>
                </div>
            </div>

        </div>
    <?php } ?>
</div>

                    <?php
                    }
                } else {
                    echo "<h1 class='mb-5'><center>No Property Available in this City!</center></h1>";
                }
            }
            ?>
      
    
</div>
</section>


        
     
		<?php include("include/footer.php");?>
		
		
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js" integrity="sha384-eMNCOe7tC1doHpGoWe/6oMVemdAVTMs2xqW4mwXrXsW0L84Iytr2wi5v2QjrP/xp" crossorigin="anonymous"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/effects.js"></script>

  
  

 
</body>

</html>