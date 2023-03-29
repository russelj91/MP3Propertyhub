<?php 
include("config.php");
$error="";
$msg="";
if(isset($_REQUEST['reg']))
{
	$name=$_REQUEST['name'];
	$email=$_REQUEST['email'];
	$phone=$_REQUEST['phone'];
	$pass=$_REQUEST['pass'];
	$utype=$_REQUEST['utype'];
	
	$uimage=$_FILES['uimage']['name'];
	$temp_name1 = $_FILES['uimage']['tmp_name'];
	$pass= sha1($pass);
	
	$query = "SELECT * FROM user where uemail='$email'";
	$res=mysqli_query($con, $query);
	$num=mysqli_num_rows($res);
	
	if($num == 1)
	{
		$error = "<p class='alert alert-danger'>Email Id already Exist</p> ";
	}
	else
	{
		
		if(!empty($name) && !empty($email) && !empty($phone) && !empty($pass) && !empty($uimage))
		{
			
			$sql="INSERT INTO user (uname,uemail,uphone,upass,utype,uimage) VALUES ('$name','$email','$phone','$pass','$utype','$uimage')";
			$result=mysqli_query($con, $sql);
			move_uploaded_file($temp_name1,"user/$uimage");
			   if($result){
				   $msg = "<p class='alert alert-success'>Register Successfully</p> ";
			   }
			   else{
				   $error = "<p class='alert alert-danger'>Register Not Successfully</p> ";
			   }
		}else{
			$error = "<p class='alert alert-warning'>Please Fill all the fields</p>";
		}
	}
	
}
?>




		

		 
		 
		 
		<div class="container my-5 py-5">
			<div class="row text-center d-flex justify-content-center">
		 	<div class="col-md-8 my-5 py-5 rounded shadow">
								 <h2>Add new user account</h2>
								<?php echo $error; ?><?php echo $msg; ?>
						
								<form method="post" enctype="multipart/form-data">
									<div class="form-group">
										<input type="text"  name="name" class="form-control" placeholder="User complete Full name">
									</div><br>
									<div class="form-group">
										<input type="email"  name="email" class="form-control" placeholder="User email">
									</div><br>
									<div class="form-group">
										<input type="text"  name="phone" class="form-control" placeholder="User 11 Digits number" maxlength="11">
									</div><br>
									<div class="form-check form-switch"  style="display: none;">
										<input class="form-check-input" type="checkbox" id="sellerSwitch" name="utype" value="user" checked>
										<label class="form-check-label" for="sellerSwitch">Seller</label>
										</div><br>
									<div class="form-group">
										<input type="password" name="pass"  class="form-control" placeholder="User password">
									</div>

						
									
									<div class="form-group">
										<label class="col-form-label"><b>User Image</b></label>
										<input class="form-control" name="uimage" type="file">
									</div>
									
									<button class="btn btn-success my-2" name="reg" value="Register" type="submit" >Add</button>
									
								</form>
								
							
								
							
								
							
			</div>
			</div>
		</div>

        
        
