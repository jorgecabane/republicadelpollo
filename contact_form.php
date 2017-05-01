<?php
// Fetching Values from URL.
$name = $_POST['name1'];
$email = $_POST['email1'];
$message = $_POST['message1'];
$email = filter_var($email, FILTER_SANITIZE_EMAIL); // Sanitizing E-mail.
// After sanitization Validation is performed
if (filter_var($email, FILTER_VALIDATE_EMAIL)) {

$subject = substr($message, 0, 25).'...';
// To send HTML mail, the Content-type header must be set.
$headers = 'MIME-Version: 1.0' . "\r\n";
$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
$headers .= 'From:' . $email. "\r\n"; // Sender's Email
$headers .= 'Cc:' . $email. "\r\n"; // Carbon copy to Sender
$template = '<div style="padding:50px; color:white;">Hola ' . $name . ',<br/>'
. '<br/>¡Gracias por contactarnos!<br/><br/>'
. 'Nombre: ' . $name . '<br/>'
. 'Email: ' . $email . '<br/>'
. 'Mensaje: ' . $message . '<br/><br/>'
. 'Este es tu correo de confirmación.'
. '<br/>'
. 'Te contactaremos pronto.</div>';
$sendmessage = "<div style=\"background-color:#7E7E7E; color:white;\">" . $template . "</div>";
// Message lines should not exceed 70 characters (PHP rule), so wrap it.
$sendmessage = wordwrap($sendmessage, 70);
// Send mail by PHP Mail Function.
mail("jorgecabane93@gmail.com", $subject, $sendmessage, $headers);
echo "1";
} else {
echo "0";
}
?>