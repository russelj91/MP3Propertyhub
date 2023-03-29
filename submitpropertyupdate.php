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

$msg="";
if(isset($_POST['add']))
{
	$pid=$_REQUEST['id'];
	
	$title=$_POST['title'];
	$content=$_POST['content'];
	$ptype=$_POST['ptype'];
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
	
	
	$sql = "UPDATE property SET title= '{$title}', pcontent= '{$content}', type='{$ptype}', stype='{$stype}',
	bedroom='{$bed}', bathroom='{$bath}', balcony='{$balc}', kitchen='{$kitc}', hall='{$hall}', floor='{$floor}', 
	size='{$asize}', price='{$price}', location='{$loc}', city='{$city}', state='{$state}',
	pimage='{$aimage}', pimage1='{$aimage1}', pimage2='{$aimage2}', pimage3='{$aimage3}', pimage4='{$aimage4}',
	uid='{$uid}', status='{$status}', mapimage='{$fimage}', topmapimage='{$fimage1}', groundmapimage='{$fimage2}', 
	totalfloor='{$totalfloor}' WHERE pid = {$pid}";
	
	$result=mysqli_query($con,$sql);
	if($result == true)
	{
		$msg="<p class='alert alert-success'>Property Updated</p>";
		header("Location:feature.php?msg=$msg");
	}
	else{
		$msg="<p class='alert alert-warning'>Property Not Updated</p>";
		header("Location:feature.php?msg=$msg");
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
                <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
                <link rel="stylesheet" type="text/css" href="css/style.css">

                <title>Property Hub</title>

                </head>
                <body>





		<?php include("include/header.php");?>

<section class="mt-5 pt-5">
            <div class="container my-5 py-5 rounded shadow text-center">
                    <div class="row">
						<div class="col-lg-12">
							<h2 class="text-secondary double-down-line text-center">Update Listing</h2>
                        </div>
					</div>
                    <div class="row p-5 bg-white">
                        <form method="post" enctype="multipart/form-data">
								
								<?php
									
									$pid=$_REQUEST['id'];
									$query=mysqli_query($con,"select * from property where pid='$pid'");
									while($row=mysqli_fetch_row($query))
									{
								?>
												
								<div class="description">
								<h5 class="text-secondary">Listing Details</h5><hr>
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
										<option value="">Select Type</option>
										<option value="Rent">Rent</option>
										<option value="Sale">Sale</option>
									</select>
									</div>
								</div>
								</div>


							<hr>
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
												<div class="form-group row my-2">
													<label class="col-lg-3 col-form-label">Price</label>
													<div class="col-lg-9">
														<input type="text" class="form-control" name="price" required value="<?php echo $row['13']; ?>">
													</div>
												</div>
												<div class="form-group row my-2">
													<label class="col-lg-3 col-form-label">City</label>
													<div class="col-lg-9">
														<input type="text" class="form-control" name="city" required value="<?php echo $row['15']; ?>">
													</div>
												</div>
												<div class="form-group row my-2">
													<label class="col-lg-3 col-form-label">State</label>
													<div class="col-lg-9">
														<input type="text" class="form-control" name="state" required value="<?php echo $row['16']; ?>">
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
															<option value="15">16 and above</option>
															<option value="Others">Others</option>
														</select>
													</div>
												</div>
												<div class="form-group row my-2">
													<label class="col-lg-3 col-form-label">Area Size</label>
													<div class="col-lg-9">
														<input type="text" class="form-control" name="asize" required value="<?php echo $row['12']; ?>">
													</div>
												</div>
												<div class="form-group row my-2">
													<label class="col-lg-3 col-form-label">Address</label>
													<div class="col-lg-9">
														<input type="text" class="form-control" name="loc" required value="<?php echo $row['14']; ?>">
													</div>
												</div>
												
											</div>
										</div>
										
												
										<h5 class="text-secondary">Images</h5><hr>
										<div class="row">
											<div class="col-xl-6">
												
												<div class="form-group row">
													<label class="col-lg-3 col-form-label">Image</label>
													<div class="col-lg-9">
														<input class="form-control" name="aimage" type="file" required="">
														<img src="admin/property/<?php echo $row['18'];?>" alt="pimage" height="150" width="180">
													</div>
												</div>
												<div class="form-group row">
													<label class="col-lg-3 col-form-label">Image 2</label>
													<div class="col-lg-9">
														<input class="form-control" name="aimage2" type="file" required="">
														<img src="admin/property/<?php echo $row['20'];?>" alt="pimage" height="150" width="180">
													</div>
												</div>
												<div class="form-group row">
													<label class="col-lg-3 col-form-label">Image 4</label>
													<div class="col-lg-9">
														<input class="form-control" name="aimage4" type="file" required="">
														<img src="admin/property/<?php echo $row['22'];?>" alt="pimage" height="150" width="180">
													</div>
												</div>
										
												<div class="form-group row">
													<label class="col-lg-3 col-form-label">Image 6</label>
													<div class="col-lg-9">
														<input class="form-control" name="fimage1" type="file">
														<img src="admin/property/<?php echo $row['26'];?>" alt="pimage" height="150" width="180">
													</div>
												</div>
											</div>
											<div class="col-xl-6">
												
												<div class="form-group row">
													<label class="col-lg-3 col-form-label">Image 1</label>
													<div class="col-lg-9">
														<input class="form-control" name="aimage1" type="file" required="">
														<img src="admin/property/<?php echo $row['19'];?>" alt="pimage" height="150" width="180">
													</div>
												</div>
												<div class="form-group row">
													<label class="col-lg-3 col-form-label">image 3</label>
													<div class="col-lg-9">
														<input class="form-control" name="aimage3" type="file" required="">
														<img src="admin/property/<?php echo $row['21'];?>" alt="pimage" height="150" width="180">
													</div>
												</div>
												
												<div class="form-group row">
													<label class="col-lg-3 col-form-label">Image 5</label>
													<div class="col-lg-9">
														<input class="form-control" name="fimage" type="file">
														<img src="admin/property/<?php echo $row['25'];?>" alt="pimage" height="150" width="180">
													</div>
												</div>
												<div class="form-group row">
													<label class="col-lg-3 col-form-label">Image 7</label>
													<div class="col-lg-9">
														<input class="form-control" name="fimage2" type="file">
														<img src="admin/property/<?php echo $row['27'];?>" alt="pimage" height="150" width="180">
													</div>
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

										
								
											<input type="submit" value="Submit" class="btn btn-primary mx-auto"name="add" style="margin-left:200px;">
										
									</div>
								</form>
								
							<?php
								} 
							?>
                    </div>            
            </div>
       
</section>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
          
             
        
		  <script src="js/bootstrap.min.js"></script>
		  <script src="js/bootstrap.min.js.map"></script>
  <!-- jQuery -->
  <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha384-vtXRMe3mGCbOeY7l30aIg8H9p3GdeSe4IFlP6G8JMa7o7lXvnz3GFKzPxzJdPfGK" crossorigin="anonymous"></script>
  
  <!-- Popper.js -->
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js" integrity="sha384-eMNCOe7tC1doHpGoWe/6oMVemdAVTMs2xqW4mwXrXsW0L84Iytr2wi5v2QjrP/xp" crossorigin="anonymous"></script>
  
  <!-- Bootstrap -->
 
</body>
</html>