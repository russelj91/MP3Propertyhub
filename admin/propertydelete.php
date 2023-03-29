<?php
include("config.php");
$pid = $_GET['id'];
$sql = "DELETE FROM property WHERE pid = {$pid}";
$result = mysqli_query($con, $sql);
if($result == true)
{
	header("Location: dashboard.php?success=Property Deleted Successfully");
}
else{
	
	header("Location: dashboard.php?error=error");
}
mysqli_close($con);
?>