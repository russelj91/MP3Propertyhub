<?php
include("config.php");
$uid = $_GET['id'];

if($_SERVER['REQUEST_METHOD'] == "POST") {
    $name = $_POST['uname'];
    $email = $_POST['uemail'];
    $phone = $_POST['uphone'];
    $password = $_POST['upass'];
    $role = $_POST['utype'];
    
    //upload image
    $imgName = $_FILES['uimage']['name'];
    $imgSize = $_FILES['uimage']['size'];
    $tmpName = $_FILES['uimage']['tmp_name'];
    
    if(!empty($imgName)){
        $imgExt = strtolower(pathinfo($imgName, PATHINFO_EXTENSION));
        $validExt = array('jpeg', 'jpg', 'png');
        $uimage = rand(1000, 1000000).".".$imgExt;
        if(in_array($imgExt, $validExt)){
            if($imgSize < 5000000){
                move_uploaded_file($tmpName, "user/".$uimage);
                // Delete old image from folder
                $oldImg = $_POST['oldImage'];
                if(!empty($oldImg)){
                    unlink("user/".$oldImg);
                }
            }else{
                $msg = "<p class='alert alert-danger'>Image size should be less than 5MB.</p>";
            }
        }else{
            $msg = "<p class='alert alert-danger'>Only JPG, JPEG and PNG files are allowed.</p>";
        }
    }else{
        $uimage = $_POST['oldImage'];
    }

    $sql = "UPDATE user SET name='$name', email='$email', password='$password', role='$role', phone='$phone', uimage='$uimage' WHERE uid='$uid'";
    $result = mysqli_query($con, $sql);

    if($result) {
        $msg="<p class='alert alert-success'>User updated successfully</p>";
        header("Location:userlist.php?msg=$msg");
    } else {
        $msg="<p class='alert alert-warning'>User not updated</p>";
        header("Location:userlist.php?msg=$msg");
    }
}


?>

<!DOCTYPE html>
<html>
<head>
	<title>Edit User</title>
</head>
<body>
	<form method="post" enctype="multipart/form-data">
	    <div class="form-group">
	        <label>Name:</label>
	        <input type="text" name="uname" class="form-control" value="<?php echo $name; ?>" required>
	    </div>
	    <div class="form-group">
	        <label>Email:</label>
	        <input type="email" name="uemail" class="form-control" value="<?php echo $email; ?>" required>
	    </div>
	    <div class="form-group">
	        <label>Password:</label>
	        <input type="password" name="upass" class="form-control" value="<?php echo $password; ?>" required>
	    </div>
	    <div class="form-group">
	        <label>Phone:</label>
	        <input type="text" name="uphone" class="form-control" value="<?php echo $phone; ?>" required>
	    </div>
	    <div class="form-group">
	        <label>User Type:</label>
	        <select name="utype" class="form-control">
	            <option value="Admin" <?php if($role=='Admin') echo "selected"; ?>>Admin</option>
	            <option value="User" <?php if($role=='User') echo "selected"; ?>>User</option>
	        </select>
	    </div>
	    <div class="form-group">
	        <label>Profile Picture:</label>
	        <input type="file" name="uimage" class="form-control">
	        <img src="user/<?php echo $img; ?>" width="50" height="50">
	    </div>
	    <button type="submit" class="btn btn-primary">Update User</button>
	</form>
</body>
</html>
