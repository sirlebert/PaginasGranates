<?php
function sendmail ($to, $subject, $headers, $message) {
if ( mail($to,$subject,$message,$headers) ) {
   echo "<h2>Mensaje enviado!</h2>";
   } else {
   echo "<h2>No se ha podido enviar el email, pruebe mas tarde</h2>";
   }
}
?>