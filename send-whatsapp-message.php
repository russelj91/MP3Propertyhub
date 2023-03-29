<?php
// Get the form data
$name = $_POST['name'];
$date = $_POST['date'];
$time = $_POST['time'];
$message = $_POST['message'];

// Retrieve the agent's phone number from the database
$phone = $row['uphone']; // Replace this with the database query to retrieve the agent's phone number

// Construct the WhatsApp message
$whatsapp_message = "Hi, I'd like to schedule a viewing for $name on $date at $time. $message";

// Construct the WhatsApp message URL
$whatsapp_url = "https://wa.me/$phone?text=" . urlencode($whatsapp_message);

// Redirect to the WhatsApp web interface
header("Location: $whatsapp_url");
exit;
?>
