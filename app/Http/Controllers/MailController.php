<?php

namespace App\Http\Controllers;

use App\Models\Integration;
use Illuminate\Http\Request;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

class MailController extends Controller
{
    public function sendMail($reciever, $subject, $body) {
        require base_path("vendor/autoload.php");
        $mail = new PHPMailer(true);     // Passing `true` enables exceptions

        $integeration = Integration::where('name','Smtp')->first();
        // Email server settings
        $mail->SMTPDebug = 0;
        $mail->isSMTP();
        $mail->Host = $integeration->host;             //  smtp host
        $mail->SMTPAuth = true;
        $mail->Username = $integeration->username;   //  sender username
        $mail->Password = $integeration->password;       // sender password
        $mail->SMTPSecure = $integeration->encryption;                  // encryption - ssl/tls
        $mail->Port = $integeration->port;                          // port - 587/465

        $mail->setFrom($reciever);
        $mail->addAddress($integeration->username);

        $mail->isHTML(true);                // Set email content format to HTML

        $mail->Subject = $subject;
        $mail->Body    = $body;
        $mail->send();
    }
}
