<?php
$imie = $_POST['imie'];
$formemail = $_POST['email'];
$formtelefon = $_POST['telefon'];
$formmessage = $_POST['message'];
$to = 'msznurawa@gmail.com';
$header = "From: $to \nContent-Type:".
          ' text/plain;charset="UTF-8"'.
          "\nContent-Transfer-Encoding: 8bit";
$subject = 'Wiadomość z formularza kontaktowego Wyjątkowe Nieruchomości';
$message = array(
  'imie: ' => $imie,
  'email: ' => $formemail,
  'telefon' => $formtelefon,
  'wiadomość' => $formmessage
);

mail($to, $subject, $message, $header);

?>