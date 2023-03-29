<?php
include('./config.php');
    $error = "";
    $msg = "";
    if(isset($_POST['send'])) {
        $name = $_POST['name'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $subject = $_POST['subject'];
        $message = $_POST['message'];
        if(!empty($name) && !empty($email) && !empty($phone) && !empty($subject) && !empty($message)) {
            $sql = "INSERT INTO contact (name,email,phone,subject,message) VALUES ('$name','$email','$phone','$subject','$message')";
            $result = mysqli_query($con, $sql);
            if($result) {
                $msg = "Message Sent Successfully";
            }
            else {
                $error = "Message Not Sent Successfully";
            }
        }
        else {
            $error = "Please fill all the fields";
        }
    }
    ?>