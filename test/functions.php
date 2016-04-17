<?php
function sendmail ($to, $subject, $message) {
// Pear Mail Library
require_once "Mail.php";

$from = '<from.gmail.com>';

$headers = array(
    'From' => $from,
    'To' => $to,
    'Subject' => $subject
);

$smtp = Mail::factory('smtp', array(
        'host' => 'ssl://smtp.gmail.com',
        'port' => '465',
        'auth' => true,
        'username' => 'espanolesenedimburgo@gmail.com',
        'password' => 'coco_1drilo'
    ));

$mail = $smtp->send($to, $headers, $body);

if (PEAR::isError($mail)) {
    echo('<p>' . $mail->getMessage() . '</p>');
} else {
    echo('<p>Message successfully sent!</p>');
}
}
?>