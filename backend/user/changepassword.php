<?php
//Req headers
header('Access-Control-Allow-Origin: *');
header("Content-Type: application/json; charset:UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Allow-Credentials: true");
header("Access-Control-Allow-Headers: access");

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
//Include db and object
include_once '../config/database.php';
include_once '../objects/user.php';

ini_set('display_errors', 1);

//New instances
$database = new Database();
$db = $database->getConnection();
$user = new User($db);

$postdata = file_get_contents("php://input");

if (isset($postdata) && !empty($postdata)) {

    $error = false;

  
    if(!$object = json_decode($postdata)) {
        return http_response_code(400);
    }


    if ($object->oldpassword == md5($object->newpassword)) {
        echo "New password cannot be the same as the old password<br>";
        $error = true;
    }


    if ($object->password && $object->newpassword && $object->confirmnewpassword == null) {
        echo "please fill out all fields<br>";
        $error = true;
    }

     if(strlen($object->newpassword) < 8 ) {
        echo "new password must be more than 8 characters<br>";
        $error = true;
    } 

    if(strlen($object->confirmnewpassword) < 8 ) {
        echo " confirmnewpassword must be more than 8 characters<br>";
        $error = true;
    } 

    
    if ($object->newpassword !== $object->confirmnewpassword) {
        echo "new passwords dont match<br>";
        $error = true;
    }elseif(md5($object->password) !== $object->oldpassword){
        echo "wrong password<br> ";
        $error = true;
    }else{
        if (trim($object->password) == trim($object->newpassword)) {
            echo "new password can't be the same as the current password";
            $error = true;
        }
    }

    /* if($object->password == $object->confirmnewpassword ||
        trim($object->password) == '') {
        echo"invalid password <br>";
        $error = true;
    } */



    if ($error == true) {
        return http_response_code(422);
    }

    $user->userid = $object->userid;
    $user->password = md5($object->password);
    $user->newpassword = md5($object->newpassword);


   if ($user->updatePassword() == false) {
       return http_response_code(423);
   } else {
     /* 
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
            $mail->addAddress("walter.schneider@cognizant.com");         // Add a recipient
            //$mail->addReplyTo('');
        
        
            // Content
            $mail->isHTML(true);                                  // Set email format to HTML
            $mail->Subject = 'Pinboard Registration';
            $mail->Body    = '<p style="text-align: center;"><span style="font-size: 36px;"><strong><span style="color: red;">Registrierung erfolgreich abgeschlossen</span></strong></span></p>
            <p style="text-align: center;"><span style="font-size: 36px;"><strong><span style="color: red;">Cognizant Pinboard</span></strong></span></p>
            <p style="text-align: center;"><span style="font-size: 14px; color: blue;">Ihr Passwort wurde geändert</span></p>';
            $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
        
            $mail->send();
            echo 'Message has been sent';
        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }
    } 
    */
        

   
        echo md5($object->newpassword);
        return http_response_code(200);
      

   }

}