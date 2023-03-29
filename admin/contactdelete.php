<?php
include("config.php");
$cid = $_GET['id'];
$sql = "DELETE FROM contact WHERE cid = {$cid}";
$result = mysqli_query($con, $sql);
if($result == true)
{
	$msg2="<p class='alert alert-success'>Deleted Successfully</p>";
	header("Location:dashboard.php?msg1=$msg");
}
else{
	$msg2="<p class='alert alert-warning'>Contact Not Deleted</p>";
	header("Location:dashboard.php?msg1=$msg");
}
mysqli_close($con);
?>
