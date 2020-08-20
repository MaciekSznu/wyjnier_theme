<?php
 $imie = $_POST['imie'];
 $formemail = $_POST['email'];
 $formtelefon = $_POST['telefon'];
 $formmessage = $_POST['message'];
 $to = 'msznurawa@gmail.com';
 $subject = 'Wiadomość z formularza kontaktowego Wyjątkowe Nieruchomości';
 $from = '-f form@wyjatkowenieruchomosci.pl';
 $message = "Imię: $imie\n Email: $formemail\n Telefon: $formtelefon\n Wiadomość: $formmessage";
 $headers = ['From' => $from, 'Reply-To' => $formemail, 'Content-type' => 'text/html; charset=iso-8859-1'];
 if ($_POST['submit']) {
   if (mail($to, $subject, $message, $headers, $from)) {
     echo '<p>Twoja wiadomośc została wysłana</p>';
   } else {
     echo '<p>Coś poszło nie tak, spróbuj raz jeszcze</p>';
   }
 }
?>