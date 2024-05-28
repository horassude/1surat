<?php

    namespace Core;

    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;

    class Email {
        public $name_to, $email_to, $subject, $message;
        private $mail_from, $name_from, $mail;

        public function __construct(private $id, private $email, private $token)
        {
            $this->name_to = "User ID : $id";
            $this->email_to = $email;
            $this->subject = "Activated MyApp";
            $this->message = "Hello, $this->name_to. Click this link to activate. " . HOME . '/user/activate?activated=1';

            $this->mail_from = "chandrasianipar.php@gmail.com";
            $this->name_from = APP_NAME;

            $this->mail = new PHPMailer(true);
        }


        public function send() {

            try {
                
                $this->setting();
                
                $this->recipients();

                $this->attachments();

                $this->content();
                
                $this->mail->send();

            } catch (Exception $e) {
                echo "Message could not be sent. Mailer Error: {$this->mail->ErrorInfo}";
            }

        }


        private function setting() {
           $this->mail->SMTPDebug = SMTP::DEBUG_SERVER;
    
           $this->mail->isSMTP();
           $this->mail->SMTPAuth = true;
        
           $this->mail->Host = "smtp.gmail.com";
           $this->mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
           $this->mail->Port = 587;
        
           $this->mail->Username = $this->mail_from;
           $this->mail->Password = 'vcrk lick nosk kyjx';
        }


        private function recipients() {
            $this->mail->setFrom($this->mail_from, $this->name_from);
            $this->mail->addAddress($this->email_to, $this->name_to);
            // $this->mail->addAddress('ellen@example.com');
            // $this->mail->addReplyTo('info@example.com', 'Information');
            // $this->mail->addCC('cc@example.com');
            // $this->mail->addBCC('bcc@example.com');
        }

        private function attachments() {
            // $this->mail->addAttachment('/var/tmp/file.tar.gz');
            // $this->mail->addAttachment('/tmp/image.jpg', 'new.jpg');
        }


        private function content() {
            $this->mail->isHTML(true);  
            $this->mail->Subject = $this->subject;
            $this->mail->Body = $this->message;
            $this->mail->Body .= "&id=$this->id";
            $this->mail->Body .= '&token=' . $this->token;
            $this->mail->Body .= '&email=' . $this->email;
            $this->mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

            dd($this->mail->Body);
        }

    }

?>