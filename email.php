<?php

$headers = 'From: webmaster@example.com' . "\r\n" .
    'Reply-To: webmaster@example.com' . "\r\n" .
    'X-Mailer: PHP/' . phpversion();

mail('my.worktest94@gmail.com', 'the subject', 'hello', $headers);
?>