<?php 
ini_set('session.cache_limiter','public');
session_cache_limiter(false);
session_start();
include("config.php");
if(!isset($_SESSION['uemail']))
{
	header("location:login.php");
}

//// code insert
//// add code
$error="";
$msg="";
if(isset($_POST['add']))
{
	
	$title=$_POST['title'];
	$content=$_POST['content'];
	$ptype=$_POST['ptype'];
	$bhk=$_POST['bhk'];
	$bed=$_POST['bed'];
	$balc=$_POST['balc'];
	$hall=$_POST['hall'];
	$stype=$_POST['stype'];
	$bath=$_POST['bath'];
	$kitc=$_POST['kitc'];
	$floor=$_POST['floor'];
	$price=$_POST['price'];
	$city=$_POST['city'];
	$asize=$_POST['asize'];
	$loc=$_POST['loc'];
	$state=$_POST['state'];
	$status=$_POST['status'];
	$uid=$_SESSION['uid'];

	
	$totalfloor=$_POST['totalfl'];


	
	$aimage=$_FILES['aimage']['name'];
	$aimage1=$_FILES['aimage1']['name'];
	$aimage2=$_FILES['aimage2']['name'];
	$aimage3=$_FILES['aimage3']['name'];
	$aimage4=$_FILES['aimage4']['name'];
	
	$fimage=$_FILES['fimage']['name'];
	$fimage1=$_FILES['fimage1']['name'];
	$fimage2=$_FILES['fimage2']['name'];
	
	$temp_name  =$_FILES['aimage']['tmp_name'];
	$temp_name1 =$_FILES['aimage1']['tmp_name'];
	$temp_name2 =$_FILES['aimage2']['tmp_name'];
	$temp_name3 =$_FILES['aimage3']['tmp_name'];
	$temp_name4 =$_FILES['aimage4']['tmp_name'];
	
	$temp_name5 =$_FILES['fimage']['tmp_name'];
	$temp_name6 =$_FILES['fimage1']['tmp_name'];
	$temp_name7 =$_FILES['fimage2']['tmp_name'];
	
	move_uploaded_file($temp_name,"admin/property/$aimage");
	move_uploaded_file($temp_name1,"admin/property/$aimage1");
	move_uploaded_file($temp_name2,"admin/property/$aimage2");
	move_uploaded_file($temp_name3,"admin/property/$aimage3");
	move_uploaded_file($temp_name4,"admin/property/$aimage4");
	
	move_uploaded_file($temp_name5,"admin/property/$fimage");
	move_uploaded_file($temp_name6,"admin/property/$fimage1");
	move_uploaded_file($temp_name7,"admin/property/$fimage2");
	
	$sql="insert into property (title,pcontent,type,bhk,stype,bedroom,bathroom,balcony,kitchen,hall,floor,size,price,location,city,state,pimage,pimage1,pimage2,pimage3,pimage4,uid,status,mapimage,topmapimage,groundmapimage,totalfloor)
	values('$title','$content','$ptype','$bhk','$stype','$bed','$bath','$balc','$kitc','$hall','$floor','$asize','$price',
	'$loc','$city','$state','$aimage','$aimage1','$aimage2','$aimage3','$aimage4','$uid','$status','$fimage','$fimage1','$fimage2','$totalfloor')";
	$result=mysqli_query($con,$sql);
	if($result)
		{
			$msg="<p class='alert alert-success'>Property Inserted Successfully</p>";
					
		}
		else
		{
			$error="<p class='alert alert-warning'>Property Not Inserted Some Error</p>";
		}
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
                 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-Sj16Gd2ZJQ3c3kKfkwKMijwmzKlcJ8RnBzH/gXnKxXYbAGmkN8sU0CO6dvwk0lLc6QKObXTCCqy0X1aJMBxTtw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
                <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
                <link rel="stylesheet" type="text/css" href="css/font-awesome.min.css">
                <link rel="stylesheet" type="text/css" href="css/style.css">

                <title>Property Hub</title>

                </head>
                <body>



		<?php include("include/header.php");?>

<section class="mt-5 pt-5">
            <div class="container text-center rounded shadow my-5 py-5">
                    <div class="row">
						<div class="col-lg-12">
							<h2 class="text-secondary  text-center">Add listing</h2>
                        </div>
					</div>
                    <div class="row p-5 bg-white">
						<div class="col-md">
                        <form method="post" enctype="multipart/form-data">
								<div class="description">
									<h5 class="text-secondary">Listing Details</h5><hr>
									<?php echo $error; ?>
									<?php echo $msg; ?>
									
										<div class="row">
								<div class="col-md-6">
									<div class="form-group">
									<label for="title">Title</label>
									<input type="text" class="form-control" id="title" name="title" required value="<?php echo $row['1']; ?>">
									</div>
									<div class="form-group">
									<label for="content">Details:</label>
									<textarea class="tinymce form-control" id="content" name="content" rows="10" cols="30"><?php echo $row['2']; ?></textarea>
									</div>
							
								</div>
								<div class="col-md-6">
									<div class="row">
									<div class="col-md-6">
										<div class="form-group">
										<label for="bed">Bedroom</label>
										<input type="text" class="form-control" id="bed" name="bed" required value="<?php echo $row['6']; ?>">
										</div>
										<div class="form-group">
										<label for="bath">Bathroom</label>
										<input type="text" class="form-control" id="bath" name="bath" required value="<?php echo $row['7']; ?>">
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
										<label for="balc">Balcony</label>
										<input type="text" class="form-control" id="balc" name="balc" required value="<?php echo $row['8']; ?>">
										</div>
										<div class="form-group">
										<label for="kitc">Kitchen</label>
										<input type="text" class="form-control" id="kitc" name="kitc" required value="<?php echo $row['9']; ?>">
										</div>
										<div class="form-group">
										<label for="hall">Hall</label>
										<input type="text" class="form-control" id="hall" name="hall" required value="<?php echo $row['10']; ?>">
										</div>
									</div>
									</div>
									<div class="form-group">
									<label for="ptype">Property Type</label>
									<select class="form-control" id="ptype" required name="ptype">
										<option value="">Select Type</option>
										<option value="Apartment">Apartment</option>
										<option value="Condo Unit">Condo Unit</option>
										<option value="building">Building</option>
										<option value="House">House</option>
										<option value="Rest House">Rest House</option>
										<option value="Office">Office</option>
										<option value="Function Hall">Function Hall</option>
										<option value="Lot">Lot</option>
										<option value="Farm">Farm</option>
									</select>
									</div>
									<div class="form-group">
									<label for="stype">Selling Type</label>
									<select class="form-control" id="stype" required name="stype">
										<option value="">Select Status</option>
										<option value="rent">Rent</option>
										<option value="sale">Sale</option>
									</select>
									</div>
								</div>
								</div>

										<h5 class="text-secondary"></h5><hr>
										<div class="row">
											<div class="col-xl-6">
												<div class="form-group row  my-2">
													<label class="col-lg-3 col-form-label">Room Location</label>
													<div class="col-lg-9">
														<select class="form-control" required name="floor">
															<option value="">Select Location</option>
															<option value="1st Floor">1st Floor</option>
															<option value="2nd Floor">2nd Floor</option>
															<option value="3rd Floor">3rd Floor</option>
															<option value="4th Floor">4th Floor</option>
															<option value="5th Floor">5th Floor</option>
															<option value="6th Floor">6th Floor</option>
															<option value="7th Floor">7th Floor</option>
															<option value="8th or  above">8th or above</option>
															<option value="Others">Others</option>
															
														</select>
													</div>
												</div>
												<div class="form-group row  my-2">
													<label class="col-lg-3 col-form-label">Price</label>
													<div class="col-lg-9">
														<input type="text" class="form-control" name="price" required placeholder="Enter Price">
													</div>
												</div>
												<div class="form-group row  my-2">
													<label class="col-lg-3 col-form-label">City</label>
													<div class="col-lg-9">
														<input type="text" class="form-control" name="city" required placeholder="Ex. Davao City">
													</div>
												</div>
												<div class="form-group row">
													<label class="col-lg-3 col-form-label">Region</label>
													<div class="col-lg-9">
														<input type="text" class="form-control" name="state" required placeholder="Ex. Region 1">
													</div>
												</div>
											</div>
											<div class="col-xl-6">
												<div class="form-group row  my-2">
													<label class="col-lg-3 col-form-label">Floor Count</label>
													<div class="col-lg-9">
														<select class="form-control" required name="totalfl">
															<option value="">Property Floor Count</option>
															<option value="1">1</option>
															<option value="2">2</option>
															<option value="3">3</option>
															<option value="4">4</option>
															<option value="5">5</option>
															<option value="6">6</option>
															<option value="7">7</option>
															<option value="8">8</option>
															<option value="9">9</option>
															<option value="10">10</option>
															<option value="11">11</option>
															<option value="12">12</option>
															<option value="13">13</option>
															<option value="14">14</option>
															<option value="15">15</option>
															<option value="16">16 and above</option>
																<option value="Others">Others</option>
															
														</select>
													</div>
												</div>
												<div class="form-group row  my-2">
													<label class="col-lg-3 col-form-label">Area Size</label>
													<div class="col-lg-9">
														<input type="text" class="form-control" name="asize" required placeholder="Enter Area Size (in SQM)">
													</div>
												</div>
												<div class="form-group row  my-2">
													<label class="col-lg-3 col-form-label">Address</label>
													<div class="col-lg-9">
														<input type="text" class="form-control" name="loc" required placeholder="Ex. Poblacion, Zone 1">
													</div>
												</div>
												
											</div>
										</div>
										
									
												
										<h5 class="text-secondary  my-2">Image</h5><hr>
										<div class="row">
											<div class="col-xl-6">
												
												<div class="form-group row  my-2">
													<label class="col-lg-3 col-form-label">Image</label>
													<div class="col-lg-9">
														<input class="form-control" name="aimage" type="file" required="">
													</div>
												</div>
												<div class="form-group row  my-2">
													<label class="col-lg-3 col-form-label">Image 2</label>
													<div class="col-lg-9">
														<input class="form-control" name="aimage2" type="file" required="">
													</div>
												</div>
												<div class="form-group row  my-2">
													<label class="col-lg-3 col-form-label">Image 4</label>
													<div class="col-lg-9">
														<input class="form-control" name="aimage4" type="file" required="">
													</div>
												</div>
										
												<div class="form-group row  my-2">
													<label class="col-lg-3 col-form-label text-hidden">Image 5</label>
													<div class="col-lg-9">
														<input class="form-control" name="fimage1" type="file">
													</div>
												</div>
											</div>
											<div class="col-xl-6">
												
												<div class="form-group row  my-2">
													<label class="col-lg-3 col-form-label">Image 1</label>
													<div class="col-lg-9">
														<input class="form-control" name="aimage1" type="file" required="">
													</div>
												</div>
												<div class="form-group row  my-2">
													<label class="col-lg-3 col-form-label">image 3</label>
													<div class="col-lg-9">
														<input class="form-control" name="aimage3" type="file" required="">
													</div>
												</div>
												
												<div class="form-group row  my-2">
													<label class="col-lg-3 col-form-label">Image 6</label>
													<div class="col-lg-9">
														<input class="form-control" name="fimage" type="file">
													</div>
												</div>
												<div class="form-group row  my-2">
													<label class="col-lg-3 col-form-label">Image 7</label>
													<div class="col-lg-9">
														<input class="form-control" name="fimage2" type="file">
													</div>
												</div>
											</div>
											
												<div class="form-group row my-2">
													<label class="col-lg-3 col-form-label">Availability</label>
													<div class="col-lg-3">
														<select class="form-control"  required name="status">
															<option value="">Availability</option>
															<option value="available" class="text-success">Available</option>
															<option value="Not Available" class="text-danger">Not Available</option>
															<option value="Reserve" class="text-warning">Reserve</option>
														</select>
													</div>
												</div>
												
											<input type="submit" value="Submit Property" class="btn btn-primary mx-auto"name="add" style="margin-left:200px;">
										</div>
										</div>
										<hr>


										
											
										
								</div>
								</form>
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