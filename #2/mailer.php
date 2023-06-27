<?php

namespace App\Services\User;

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;

//require '../../../vendor/autoload.php';

class SendMailService
{
    public function __construct()
    {
    }

    public function send($user)
    {
        $mail = new PHPMailer();
        $mail->isSMTP();
        $mail->SMTPDebug = SMTP::DEBUG_SERVER;
        $mail->Host = 'ssl://smtp.yandex.ru'; // Укажите smtp-сервер, например, smtp.yandex.ru
        $mail-> Port = 465;
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
        $mail->SMTPAuth = true;
        $mail->Username = 'instantremember@yandex.ru'; // Укажите ваш email для отправки
        $mail->Password = 'tlcrnokrstrrfpfp'; // Укажите пароль от вашего email
        $mail->setFrom('instantremember@yandex.ru', 'Instant Remember');
        
        $mail->AddAddress('user08@yandex.ru'); // Укажите email получателя
        $mail->Subject = 'subject';
        $mail->Body = 'body';

        if (!$mail-> send()) {
            echo 'Mailer Error: '. $mail->ErrorInfo;
        } else {
            echo 'Message sent!';
        }
    }
}
