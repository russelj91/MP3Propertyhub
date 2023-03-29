<?php
include("config.php");
$error="";
$msg="";
if(isset($_POST['submit']))
{
  $name = $_POST['name'];
  $email = $_POST['email'];
  $phone = $_POST['phone'];
  $date = $_POST['date'];
  $time = $_POST['time'];
  $message = $_POST['message'];
  $property = $_POST['property'];
  $seller = $_POST['seller'];

  $query = "INSERT INTO schedule (name, email, phone, date, time, message, property, seller) VALUES ('$name', '$email', '$phone', '$date', '$time', '$message', '$property', '$seller')";

  $result = mysqli_query($con, $query);

  if($result){
    $msg = "Schedule successfully saved!";
    echo "<div style='background-color: #4CAF50; color: white; padding: 10px;'><i class='fa fa-check-circle'></i> $msg</div>";
    echo "<script>setTimeout(function(){ window.location.replace('index.php'); }, 2000);</script>";
  } else {
    $error = "Error saving schedule: " . mysqli_error($con);
    echo "<div style='background-color: #f44336; color: white; padding: 10px;'><i class='fa fa-exclamation-circle'></i> $error</div>";
    echo "<script>setTimeout(function(){ window.location.replace('propertydetail.php'); }, 2000);</script>";
  }

}

mysqli_close($con);
?>
