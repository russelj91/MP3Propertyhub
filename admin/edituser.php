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
	$id=$_REQUEST['id'];
	
	$query = "SELECT * FROM user where uemail='$email' AND uid!='$id'";
	$res=mysqli_query($con, $query);
	$num=mysqli_num_rows($res);
	
	if($num == 1)
	{
		$error = "<p class='alert alert-danger'>Email Id already Exist</p> ";
	}
	else
	{
        if(!empty($name) && !empty($email) && !empty($phone) && !empty($utype))
        {
            $pass_hash = '';
            if(!empty($pass)) {
                $pass_hash = sha1($pass);
            }
            $sql="UPDATE user SET uname='$name',uemail='$email',uphone='$phone',upass='$pass_hash',utype='$utype' WHERE uid='$id'";
            $result=mysqli_query($con, $sql);
            if($result){
                $msg = "<p class='alert alert-success'>User updated successfully</p>";
                header("Location:dashboard.php?msg=$msg");
            }
            else{
                $error = "<p class='alert alert-danger'>User not updated</p> ";
            }
        }
    }
}        

if(isset($_REQUEST['id']))
{
	$id=$_REQUEST['id'];
	$query="SELECT * FROM user WHERE uid='$id'";
	$res=mysqli_query($con, $query);
	$row=mysqli_fetch_assoc($res);
	$name=$row['uname'];
	$email=$row['uemail'];
	$phone=$row['uphone'];
	$pass=$row['upass'];
	$utype=$row['utype'];
}
?>
        
        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Edit User</title>
            <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
        </head>
        <body>
        <div class="container">
            <div class="row">
                <div class="col-md-6 mx-auto mt-5">
                    <div class="card">
                        <div class="card-header">
                            <h4>Edit User</h4>
                        </div>
                        <div class="card-body">
                        <?php echo isset($msg)?$msg:""; ?>

                        <form method="post" enctype="multipart/form-data">
	<div class="form-group">
		<input type="text" name="name" class="form-control" placeholder="User complete Full name" value="<?php echo $name; ?>">
	</div><br>
	<div class="form-group">
		<input type="email" name="email" class="form-control" placeholder="User email" value="<?php echo $email; ?>">
	</div><br>
	<div class="form-group">
		<input type="text" name="phone" class="form-control" placeholder="User 11 Digits number" maxlength="11" value="<?php echo $phone; ?>">
	</div><br>
	<div class="form-check form-switch" style="display: none;">
		<input class="form-check-input" type="checkbox" id="sellerSwitch" name="utype" value="user" <?php if($utype=="user"){echo "checked";} ?>>
		<label class="form-check-label" for="sellerSwitch">Seller</label>
	</div><br>
	<div class="form-group">
		<input type="password" name="pass" class="form-control" placeholder="User password" value="<?php echo $pass; ?>">
	</div>
	<input type="hidden" name="id" value="<?php echo $id; ?>">
	<button class="btn btn-success my-2" name="reg" value="Update" type="submit">Update</button>
</form>
</div>
</div>
</div>
</div>

</div>
</body>
</html>
