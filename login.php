<?php 
session_start();
include("config.php");
$error="";
$msg="";
if(isset($_REQUEST['login']))
{
	$email=$_REQUEST['email'];
	$pass=$_REQUEST['pass'];
	$pass= sha1($pass);
	
	if(!empty($email) && !empty($pass))
	{
		$sql = "SELECT * FROM user where uemail='$email' && upass='$pass'";
		$result=mysqli_query($con, $sql);
		$row=mysqli_fetch_array($result);
		   if($row){
			   
				$_SESSION['uid']=$row['uid'];
				$_SESSION['uemail']=$email;
				header("location:index");
				
		   }
		   else{
			   $error = "<p class='alert alert-warning'>Email or Password doesnot match!</p> ";
		   }
	}else{
		$error = "<p class='alert alert-warning'>Please Fill all the fields</p>";
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
			<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css">
			<title>PropertyHub</title>
</head>
<body>


	
		<?php include("include/header.php");?>
					<div class="container my-5 py-5">
						<div class="row text-center d-flex justify-content-center">
						<div class="col-md-5 my-5 py-5 rounded shadow">
								<h2>Login</h2>
								<?php echo $error; ?><?php echo $msg; ?>
							
								<form method="post">
									<div class="form-group">
										<input type="email"  name="email" class="form-control" placeholder="Your Email*">
									</div><br>
									<div class="form-group">
										<input type="password" name="pass"  class="form-control" placeholder="Your Password">
									</div>
									
										<button class="btn btn-warning my-2" name="login" value="Login" type="submit">Login</button>					
								</form>	
			
							</div>
						</div>
					</div>
					
      
<script src="js/bootstrap.min.js"></script> 

</body>
</html>