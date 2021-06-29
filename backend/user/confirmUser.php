<?php
header('Access-Control-Allow-Origin: *');
header("Content-Type: application/json; charset:UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Allow-Credentials: true");
header("Access-Control-Allow-Headers: access");

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;


include_once '../config/database.php';
include_once '../objects/user.php';

ini_set('display_errors', 1);

//New instances
$database = new Database();
$db = $database->getConnection();
$user = new User($db);

    $verifciation = file_get_contents("php://input");
    $key = json_decode($verifciation);
    
    if (!isset($key->key) || $key->key == '') {
        return http_response_code(501);
    }
    
    $user->verificationkey      = $key->key;

    $stmt = $user->confirmUser();

    if ($stmt == false) {
      return http_response_code(502);
    }
    else {
      header("Location: /pinboard/dashboard/index.html");
      return http_response_code(200);
      
    }



$result = $getGuest->fetchAll();

require '../../resources/libraries/vendor/autoload.php';
    
    // Instantiation and passing `true` enables exceptions
    foreach($result as $row) {
        $mail = new PHPMailer(true);
        try {
            //Server settings
            $mail->SMTPDebug = 2;                                       // Enable verbose debug output
            $mail->isSMTP();                                            // Send using SMTP
            $mail->Host       = 'asmtp.mail.hostpoint.ch';              // Set the SMTP server to send through
            $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
            $mail->Username   = 'admin@ctsapprentice.ch';               // SMTP username
            $mail->Password   = 'FVPBv6nT';                             // SMTP password
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` also accepted
            $mail->Port       = 587;                                    // TCP port to connect to
            $mail->CharSet    = 'UTF-8';                                 // TCP port to connect to
        
            //Recipients
            $mail->setFrom('admin@ctsapprentice.ch', 'Apprentice Pinboard Team');
            $mail->addAddress($row["email"]);                 // Add a recipient
            //$mail->addReplyTo('');
        
        
            // Content
            $mail->isHTML(true);                                  // Set email format to HTML
            $mail->Subject = 'Pinboard Registration';
            $mail->Body    = '<p style="text-align: center;"><span style="font-size: 36px;"><strong><span style="color: red;">Registrierung erfolgreich abgeschlossen</span></strong></span></p>
            <p style="text-align: center;"><span style="font-size: 36px;"><strong><span style="color: red;">Cognizant Pinboard</span></strong></span></p>
            <p style="text-align: center;"><span style="font-size: 14px; color: blue;">Sie haben sich erfolgreich für das Cognizant Pinboard registriert</span></p>';
            $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
        
            $mail->send();
            echo 'Message has been sent';
        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }
    }