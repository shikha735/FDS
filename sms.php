<?php
/* watch the video for detailed instructions */
$to = "8978402279@airtelap.com";
$from = "shikha735@gmail.com";
$message = "This is a text message\nNew line...";
$headers = "From: $from\n";
mail($to, '', $message, $headers);
?>