<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $to = $_POST['to'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];

    $mail = new PHPMailer(true);

    try {
        //Server settings
        $mail->SMTPDebug = 0; // Enable verbose debug output (use 0 for no output)
        $mail->isSMTP(); // Set mailer to use SMTP
        $mail->Host = 'smtp.example.com'; // Specify main and backup SMTP servers
        $mail->SMTPAuth = true; // Enable SMTP authentication
        $mail->Username = 'your-email@example.com'; // SMTP username
        $mail->Password = 'your-email-password'; // SMTP password
        $mail->SMTPSecure = 'tls'; // Enable TLS encryption, ssl also accepted
        $mail->Port = 587; // TCP port to connect to

        //Recipients
        $mail->setFrom('your-email@example.com', 'Your Name');
        $mail->addAddress($to); // Add a recipient

        // Content
        $mail->isHTML(true); // Set email format to HTML
        $mail->Subject = $subject;
        $mail->Body    = $message;
        $mail->AltBody = strip_tags($message); // Plain text version for non-HTML mail clients

        $mail->send();
        echo 'Email sent successfully!';
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
}
?>