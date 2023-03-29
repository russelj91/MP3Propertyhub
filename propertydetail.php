<?php 
ini_set('session.cache_limiter','public');
session_cache_limiter(false);
session_start();
include("config.php")
								
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


		

				
					<?php
						$id=$_REQUEST['pid']; 
						$query=mysqli_query($con,"SELECT property.*, user.* FROM `property`,`user` WHERE property.uid=user.uid and pid='$id'");
						while($row=mysqli_fetch_array($query))
						{
					  ?>
				  <div class="mt-3 pt-3">
                   <h2 class="mt-5 pt-5 text-center">Property Details</h2>
                  </div>
                        <div class="container pt-5 mt-5 rounded shadow">
            
<div class="container px-5 mt-2 pt-2">
<div class="row shadow-sm rounded my-1 py-1">
    <div class="col-md">
        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
                <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="3"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="4"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="5"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="6"></li>
            </ol>

            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="admin/property/<?php echo $row['19'];?>" class="d-block img-fluid" alt="Slide 1" />
                </div>
                <div class="carousel-item">
                    <img src="admin/property/<?php echo $row['20'];?>" class="d-block img-fluid" alt="Slide 2" />
                </div>
                <div class="carousel-item">
                    <img src="admin/property/<?php echo $row['21'];?>" class="d-block img-fluid" alt="Slide 3" />
                </div>
                <div class="carousel-item">
                    <img src="admin/property/<?php echo $row['22'];?>" class="d-block img-fluid" alt="Slide 4" />
                </div>
                <div class="carousel-item">
                    <img src="admin/property/<?php echo $row['25'];?>" class="d-block img-fluid" alt="Slide 5" />
                </div>
                <div class="carousel-item">
                    <img src="admin/property/<?php echo $row['26'];?>" class="d-block img-fluid" alt="Slide 6" />
                </div>
                <div class="carousel-item">
                    <img src="admin/property/<?php echo $row['27'];?>" class="d-block img-fluid" alt="Slide 7" />
                </div>
            </div>

            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
    </div>
</div>




                      
                                
                
</div>

                
<div class="container">


    <div class="container mt-3">
              <div class="card-header">
    <h2 class="text-center"><h5 class=" text-secondary">Property Details for: <?php echo $row['1'];?></h5></h2>
    <h5>Date added:</i> <?php echo date('d-m-Y', strtotime($row['date']));?></h5>
    <h5>Description:<?php echo $row['2'];?></h5>
  </div>
    <div class="row">
  <div class="col-6">
    <ul class="list-group">
      <li class="list-group-item"><i class="fas fa-bed"></i> Bedroom: <?php echo $row['6'];?></li>
      <li class="list-group-item"><i class="fas fa-building"></i>Room Location: <?php echo $row['11'];?></li>
      <li class="list-group-item"><i class="fas fa-city"></i> City: <?php echo $row['15'];?></li>
      <li class="list-group-item"><i class="fas fa-square"></i> Floor Area: <?php echo $row['12'];?>SQM.</li>
      <li class="list-group-item"><i class="fas fa-door-closed"></i> Balcony: <?php echo $row['8'];?></li>
      <li class="list-group-item"><i class="fas fa-utensils"></i> Kitchen: <?php echo $row['9'];?></li>
      <li class="list-group-item"><i class="fas fa-map-marker-alt"></i> Location: <?php echo $row['14'];?></li>
    </ul>
  </div>
  <div class="col-6">
    <ul class="list-group">
      <li class="list-group-item"><i class="fas fa-home"></i> Property Type: <?php echo $row['3'];?></li>
      <li class="list-group-item"><i class="fas fa-building"></i> Floor Count: <?php echo $row['28'];?></li>
      <li class="list-group-item"><i class="fas fa-map-marker-alt"></i> Region: <?php echo $row['16'];?></li>
      <li class="list-group-item"><i class="fas fa-bath"></i> Bathroom: <?php echo $row['7'];?></li>
      <li class="list-group-item"><i class="fas fa-door-open"></i> Hall: <?php echo $row['10'];?></li>
      <li class="list-group-item"><i class="fas fa-info-circle"></i> Availavility: For <?php echo $row['5'];?></li>
      <li class="list-group-item"><i class="fas fa-dollar-sign"></i> Price: ₱ <?php echo $row['13'];?></li>
    </ul>
  </div>
</div>

</div>

              
                          
                                            
                                       
     <div class="container my-5">
         
      <div class="card">
  <div class="card-header">
    <h2 class="text-center">Seller</h2>
  </div>
  <div class="card-body">
    <div class="row text-center d-flex">
      <div class="col-md">
        <h6>Name: <?php echo $row['uname'];?></h6>
      </div>
      <div class="col-md">
        <h6>Phone Number: <?php echo $row['uphone'];?></h6>
      </div>
      <div class="col-md">
        <h6>Email Address: <?php echo $row['uemail'];?></h6>
      </div>
    </div>
  </div>
</div>

                            <div class="row mb-5">
    
              <div class="col-md text-center">    
                                            <div class="card-header">
    <h2 class="text-center">Schedule for Viewing</h2>
  </div>
<form action="schedule.php" method="post" class="row g-3">
  <div class="col-md-6">
    <label for="name" class="form-label">Full Name</label>
    <input type="text" class="form-control" id="name" name="name" required>
  </div>
  <div class="col-md-6">
    <label for="email" class="form-label">Email Address</label>
    <input type="email" class="form-control" id="email" name="email" required>
  </div>
  <div class="col-md-6">
    <label for="phone" class="form-label">Mobile Number</label>
    <input type="tel" class="form-control" id="phone" name="phone" required>
  </div>
  <div class="col-md-6">
    <label for="date" class="form-label">Preferred viewing date</label>
    <input type="date" class="form-control" id="date" name="date" required>
  </div>
  <div class="col-md-6">
    <label for="time" class="form-label">Preferred viewing time</label>
    <input type="time" class="form-control" id="time" name="time" required>
  </div>
  <div class="col-md-6">
   
    <input type="hidden" id="property" name="property" value="<?php echo htmlspecialchars($row['1']); ?>" class="form-control" readonly>
  </div>
  <div class="col-12">
    <label for="message" class="form-label">Additional comments or questions</label>
    <textarea class="form-control" id="message" name="message" rows="3"></textarea>
  </div>
  <div class="col-md-6">
  
    <input type="hidden" id="seller" name="seller" value="<?php echo $row['uname']; ?>" class="form-control" readonly>
  </div>
  <div class="col-12">
    <button type="submit" name="submit" class="btn btn-primary my-3">Submit</button>
  </div>
</form>

</div>



                  






                                                          </div>
                                            

                                                      </div>
                                                      </div>
                                    <?php } ?>
                                    
                                              </div>
                                  
                              
                        </div>
                              <?php include("include/footer.php");?>


                          
                                  
                           <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
                        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js" integrity="sha384-eMNCOe7tC1doHpGoWe/6oMVemdAVTMs2xqW4mwXrXsW0L84Iytr2wi5v2QjrP/xp" crossorigin="anonymous"></script>
                        <script src="js/bootstrap.min.js"></script>
                        <script src="js/effects.js"></script>

                            
                         

                             
 
</body>

</html>