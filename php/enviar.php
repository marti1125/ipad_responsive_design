<?php

$asunto = $_POST['asunto'];
$mensaje = $_POST['mensaje'];

require_once '../lib/swift_required.php';

// Create the Transport
$transport = Swift_SmtpTransport::newInstance('mail.kybalion.net', 587)
  ->setUsername('waguirre@kybalion.net')
  ->setPassword('159Willy6')
  ;

/*
You could alternatively use a different transport such as Sendmail or Mail:

// Sendmail
$transport = Swift_SendmailTransport::newInstance('/usr/sbin/sendmail -bs');

// Mail
$transport = Swift_MailTransport::newInstance();
*/

// Create the Mailer using your created Transport
$mailer = Swift_Mailer::newInstance($transport);

// Create a message
$message = Swift_Message::newInstance('Wonderful Subject')
  ->setFrom(array('waguirre@kybalion.net' => 'Willy'))
  ->setTo(array('marti1003@hotmail.com', 'marti1003@hotmail.com' => 'Usuario'))
  ->setSubject($asunto)
  ->setBody($mensaje)
  ;

// Send the message
$result = $mailer->send($message);

?>