<?php
session_start();
require("config.php");

if (!isset($_SESSION['admin_username'])) {
    header("Location: index.php");
    exit();
}

?>
<!DOCTYPE html>
<html lang="en">
    
<!DOCTYPE html>
         <html lang="en">
                <head>
                <meta charset="utf-8">
                <meta http-equiv="X-UA-Compatible" content="IE=edge">
                <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">


                <meta http-equiv="X-UA-Compatible" content="IE=edge">
                  <link rel="shortcut icon" href="../prop.png">
                 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-Sj16Gd2ZJQ3c3kKfkwKMijwmzKlcJ8RnBzH/gXnKxXYbAGmkN8sU0CO6dvwk0lLc6QKObXTCCqy0X1aJMBxTtw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
                <link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">


                <title>PropertyHub Administrator</title>

                </head>
                <body>
	
	
	




<div class="container">

    <div class="container text-center">
        
     
       
  
					<div class="row my-5 py-5">
						<div class="col-sm-12">
							<div class="card">
							     <h2 class="text-start">Welcome back Admin!<span class="text-uppercase"><?php echo $_SESSION['admin_username'];?> </span> <a href="logout.php" class="btn btn-danger">Logout</button></a></h2>
								<div class="card-header">
									<h4 class="card-title">Registered User</h4>
										<?php 
										if(isset($_GET['msg']))	
										echo $_GET['msg'];	
									?>
								</div>
								<div class="card-body">
             <div class="table-responsive">
    <table class="table table-bordered">
        <thead class="thead-dark">
            <tr>
                <th scope="col">Count</th>
                <th scope="col">Name</th>
                <th scope="col">Email</th>
                <th scope="col">Contact</th>
                <th scope="col">Image</th>
                <th scope="col">Actions</th>
                <th scope="col">Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $query=mysqli_query($con,"select * from user where utype='user'");
            $cnt=1;
            while($row=mysqli_fetch_row($query))
            {
            ?>
            <tr>
                <th scope="row"><?php echo $cnt; ?></th>
                <td><?php echo $row['1']; ?></td>
                <td><?php echo $row['2']; ?></td>
                <td><?php echo $row['3']; ?></td>
                <td><img src="user/<?php echo $row['6']; ?>" class="img-fluid rounded-circle" alt="<?php echo $row['1']; ?>" width="50px"></td>
                <td><a href="edituser.php?id=<?php echo $row['0'];?>"><button class="btn btn-sm btn-success">Edit</button></a></td>
                <td><a href="userdelete.php?id=<?php echo $row['0']; ?>"><button class="btn btn-sm btn-danger">Remove</button></a></td>
            </tr>
            <?php
            $cnt=$cnt+1;
            } 
            ?>
        </tbody>
    </table>
</div>

								</div>
							</div>
						</div>
					</div>
                </div>
			

		
					
					
					
				<div class="container">
					<div class="row my-5 py-5">
                            <div class="col-md">
                                <div class="card">
                                    <div class="card-body">

                                        <h4 class="header-title mt-0 mb-4">Available Property</h4>
									     <?php if (isset ($_GET['error'])) { ?>
                                            <div class="alert alert-danger" role="alert"> 
                                                <?php echo $_GET['error']; ?>
                                            </div>
                                        <?php } ?>

                                        <?php if (isset ($_GET['success'])) { ?>
                                            <div class="alert alert-success" role="alert"> 
                                                <?php echo $_GET['success']; ?>
                                            </div>
                                        <?php } ?>
                                   <div class="table-responsive">
    <table class="table table-bordered"">
        <thead>
            <tr>
                <!-- <th>P ID</th> -->
                <th>Title</th>
                <th>Type</th>
                <th>Sale/Rent</th>
                <th>Area</th>
                <th>Price</th>
                <th>Location</th>
                <th>Availability</th>
                <th>Added Date</th>
                <th>Actions</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php
                $query = mysqli_query($con, "select * from property");
                while ($row = mysqli_fetch_row($query)) {
            ?>
            <tr>
                <!-- <td><?php echo $row['0']; ?></td> -->
                <td><?php echo $row['1']; ?></td>
                <td><?php echo $row['3']; ?></td>
                <td><?php echo $row['5']; ?></td>
                <td><?php echo $row['12']; ?></td>
                <td><?php echo $row['13']; ?></td>
                <td><?php echo $row['14']; ?></td>
                <td><?php echo $row['24']; ?></td>
                <td><?php echo $row['29']; ?></td>
                <td><a href="editproperty?id=<?php echo $row['0']; ?>"><button class="btn btn-success">Edit</button></a></td>
                <td><a href="propertydelete.php?id=<?php echo $row['0']; ?>"><button class="btn btn-danger">Remove</button></a></td>
            </tr>
            <?php
                }
            ?>
        </tbody>
    </table>
</div>
 
                                    </div> 
                                </div> 
                            </div>
                        </div>
                        </div>
					
			
	
		
			
			<div class="container my-5 py-5">	
					<div class="row">
						<div class="col-sm-12">
							<div class="card">
								<div class="card-header">
									<h4 class="card-title">Inbox</h4>
									<?php 
											if(isset($_GET['msg']))	
											echo $_GET['msg2'];
											
										?>
								</div>
								<div class="card-body">
  <div class="table-responsive">
									<table class="table table-bordered table-hover">
                                            <thead>
                                                <tr>
                                                    <th>Count</th>
                                                    <th>Name</th>
                                                    <th>Email</th>
                                                    <th>Phone</th>
													<th>Subject</th>
                                                    <th>Message</th>
                                                    <th>Remove</th>
                                                </tr>
                                            </thead>
                                        
                                        
                                            <tbody>
											<?php
													
												$query=mysqli_query($con,"select * from contact");
												$cnt=1;
												while($row=mysqli_fetch_row($query))
													{
											?>
                                                <tr>
                                                    <td><?php echo $cnt; ?></td>
                                                    <td><?php echo $row['1']; ?></td>
                                                    <td><?php echo $row['2']; ?></td>
                                                    <td><?php echo $row['3']; ?></td>
                                                    <td><?php echo $row['4']; ?></td>
													<td><?php echo $row['5']; ?></td>
                                                    <td><a href="contactdelete.php?id=<?php echo $row['0']; ?>"><button class="btn btn-danger">Delete</button></a></td>
                                                </tr>
                                                <?php
												$cnt=$cnt+1;
												} 
												?>
                                               
                                            </tbody>
                                        </table>
                                        </div>
								</div>
							</div>
						</div>
					</div>
                    </div>
				</div>			
				
				                <div class="container">
				                    
<?php
                $query = "SELECT * FROM schedule";
$result = mysqli_query($con, $query);

?>
<div class="card-header">
<h2>List of Schedules</h2>
</div>
  <div class="table-responsive">
<table class="table table-bordered table-hover table-responsive">
  <thead>
    <tr>
      <th>Name</th>
      <th>Email</th>
      <th>Phone</th>
      <th>Date</th>
      <th>Time</th>
      <th>Message</th>
      <th>Property</th>
      <th>Seller</th>
    </tr>
  </thead>
  <tbody>
    <?php while($row = mysqli_fetch_array($result)): ?>
      <tr>
        <td><?php echo $row['name']; ?></td>
        <td><?php echo $row['email']; ?></td>
        <td><?php echo $row['phone']; ?></td>
        <td><?php echo $row['date']; ?></td>
        <td><?php echo $row['time']; ?></td>
        <td><?php echo $row['message']; ?></td>
        <td><?php echo $row['property']; ?></td>
        <td><?php echo $row['seller']; ?></td>
      </tr>
    <?php endwhile; ?>
  </tbody>
</table>
</div
<?php mysqli_close($con); ?>
</div>
			
                <?php
// Include the registration form from register.php
include("register.php");
?>


<script src="../js/bootstrap.min.js"></script> 
 
		
    </body>

</html>
