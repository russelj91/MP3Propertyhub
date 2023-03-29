<?php 
session_start();
include("config.php");
$error = "";

if (isset($_POST['login'])) {
    $user = $_REQUEST['admin_username'];
    $pass = $_REQUEST['admin_password'];
    $pass = sha1($pass);
    
    if (!empty($user) && !empty($pass)) {
        $query = "SELECT admin_username, admin_password FROM administrator WHERE admin_username='$user' AND admin_password='$pass' AND active=1";
        $result = mysqli_query($con, $query) or die(mysqli_error($con));
        $num_row = mysqli_num_rows($result);
        if ($num_row == 1) {
            $_SESSION['admin_username'] = $user;
            header("Location: dashboard.php");
            exit();
        } else {
            $error = '* Invalid Admin Username and Password';
        }
    } else {
        $error = "* Please fill in all the fields!";
    }
}
 
	
?>
<!DOCTYPE html>
<html lang="en">
    
<head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
        <title>Admin</title>
		<link rel="stylesheet" href="../css/bootstrap.min.css">
		<!-- Favicon -->
        <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.png">

    </head>
    <body>
	
<div class="container">
	<div class="row"></div>
	<div class="col-md-5 text-center mx-auto my-5 py-5 rounded shadow">
								<h1>Administrator Login</h1>
								<p class="account-subtitle">Access to our dashboard</p>
								<p style="color:red;"><?php echo $error; ?></p>
								<!-- Form -->
								<form method="post">
								<div class="form-group mx-5">
									<input class="form-control" name="admin_username" type="text" placeholder="Admin Username">
								</div><br>
								<div class="form-group mx-5">
									<input class="form-control" type="password" name="admin_password" placeholder="Admin Password">
								</div><br>
								<div class="form-group">
									<button class="btn btn-primary btn-block" name="login" type="submit">Login</button>
								</div>
							</form>

					</div>
			</div>
	</div>
		
    </body>

</html>