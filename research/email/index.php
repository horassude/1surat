<?php

    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;

    $name = "Chandra";
    $email = "chandrasianipar@gmail.com";
    $subject = "second Test";
    $message = "Hello world for three times";

    $mail = new PHPMailer(true);
    $mail->SMTPDebug = SMTP::DEBUG_SERVER;

    $mail->isSMTP();
    $mail->SMTPAuth = true;

    $mail->Host = "smtp.gmail.com";
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    $mail->Port = 587;

    $mail->Username = "chandrasianipar.php@gmail.com";
    $mail->Password = 'vcrk lick nosk kyjx';

    $mail->setFrom($email, $name);
    $mail->addAddress("chandrasianipar@gmail.com", "Chandra");

    $mail->Subject = $subject;
    $mail->Body = $message;

    $mail->send();

    echo "email sent";
?>