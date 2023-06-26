<? php
// composer require phpmailer/phpmailer

require '/phpmailer/PHPMailer.php';
require '/phpmailer/SMTP.php';
require '/phpmailer/Exception.php';

use phpmailer\PHPMailer;
use phpmailer\SMTP;
use phpmailer\Exception;

$mail = new PHPMailer(true);

$mail->isSMTP();
$mail->Host = 'smtp.example.com'; // Укажите smtp-сервер, например, smtp.gmail.com
$mail->SMTPAuth = true;
$mail->Username = 'your_email@example.com'; // Укажите ваш email для отправки
$mail->Password = 'your_password'; // Укажите пароль от вашего email
$mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
$mail->Port = 587;

$mail->setFrom('your_email@example.com', 'Your Name'); // Укажите ваш email и имя отправителя
$mail->addAddress($email, $name); // Укажите email и имя получателя

if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
  echo 'Введите корректный email';
  exit;
}

if (empty($email) || empty($name) || empty($text)) {
  echo 'Пожалуйста, заполните все поля';
  exit;
}

$mail->isHTML(true);
$mail->Subject = 'Заголовок письма';
$mail->Body = $text;

$mail->addAttachment('path/to/file.pdf');

try {
  $mail->send();
  echo 'Email отправлен';
} catch (Exception $e) {
  echo 'Ошибка при отправке email', $mail->ErrorInfo;
}
