<?php
require __DIR__ . '/PHPMailer/src/Exception.php';
require __DIR__ . '/PHPMailer/src/PHPMailer.php';
require __DIR__ . '/PHPMailer/src/SMTP.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

$mail = new PHPMailer(true);

try {
    // Ρυθμίσεις SMTP
    $mail->isSMTP();
    $mail->Host       = 'YOUR_EMAIL';
    $mail->SMTPAuth   = true;
    $mail->Username   = 'YOUR_EMAIL';
    $mail->Password   = 'YOUR_PASSWORD';
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    $mail->Port       = 587;

    // Ελληνικοί χαρακτήρες (UTF-8)
    $mail->CharSet = 'UTF-8';
    $mail->Encoding = 'base64';

    // Από / Προς
    $mail->setFrom('YOUR_EMAIL', 'YOUR_NAME');
    $mail->addAddress('EMAIL THAT YOU WANT TO SEND', 'Παραλήπτης');

    // Επισύναψη PDF
    $mail->addAttachment(__DIR__ . '/mailSend.pdf');

    // Περιεχόμενο email
    $mail->isHTML(true);
    $mail->Subject = 'Αυτόματο email με PDF';
    $mail->Body    = 'Καλησπέρα,<br><br>Σας επισυνάπτω το PDF αρχείο.<br><br>Με εκτίμηση,<br><b>E-Avenue</b>';
    $mail->AltBody = 'Καλησπέρα, Σας επισυνάπτω το PDF αρχείο. Με εκτίμηση, E-Avenue.';

    // Αποστολή
    $mail->send();
    echo '<p style="color:green;">✅ Το μήνυμα στάλθηκε επιτυχώς!</p>';
} catch (Exception $e) {
    echo '<p style="color:red;">❌ Σφάλμα: ' . $mail->ErrorInfo . '</p>';
}
?>
