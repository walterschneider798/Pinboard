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

$error = false;

if (isset($postdata) && !empty($postdata)) {

  if (!$object = json_decode($postdata)) {
    return http_response_code(400);
  }


  if ($object->firstname = "") {
    echo "firstname can't be empty";
    $error = true;
  } else if (strlen($object->firstname) <= 1) {
    echo "firstname must be more than 1 Character<br>";
    $error = true;
  } else if (strlen($object->firstname) >= 35) {
    echo "Firstname must be less than 35 Characters<br>";
    $error = true;
  }

  if ($object->lastname = "") {
    echo "lastname can't be empty";
    $error = true;
  } else if (strlen($object->lastname) <= 1) {
    echo "Lastname must be more than 1 Character<br>";
    $error = true;
  } else if (strlen($object->lastname) >= 35) {
    echo "Lastname must be less than 35 Characters<br>";
    $error = true;
  }


  if ($object->email = "") {
    echo "email can't be empty";
    $error = true;
  } elseif (strlen($object->email) < 1) {
    echo "email cant be emtpy<br>";
    $error = true;
  } else if (strlen($object->email) > 100) {
    echo "email is too long<br>";
    $error = true;
  } elseif (!preg_match("/^(?!(?:(?:\x22?\x5C[\x00-\x7E]\x22?)|(?:\x22?[^\x5C\x22]\x22?)){255,})(?!(?:(?:\x22?\x5C[\x00-\x7E]\x22?)|(?:\x22?[^\x5C\x22]\x22?)){65,}@)(?:(?:[\x21\x23-\x27\x2A\x2B\x2D\x2F-\x39\x3D\x3F\x5E-\x7E]+)|(?:\x22(?:[\x01-\x08\x0B\x0C\x0E-\x1F\x21\x23-\x5B\x5D-\x7F]|(?:\x5C[\x00-\x7F]))*\x22))(?:\.(?:(?:[\x21\x23-\x27\x2A\x2B\x2D\x2F-\x39\x3D\x3F\x5E-\x7E]+)|(?:\x22(?:[\x01-\x08\x0B\x0C\x0E-\x1F\x21\x23-\x5B\x5D-\x7F]|(?:\x5C[\x00-\x7F]))*\x22)))*@(?:(?:(?!.*[^.]{64,})(?:(?:(?:xn--)?[a-z0-9]+(?:-[a-z0-9]+)*\.){1,126}){1,}(?:(?:[a-z][a-z0-9]*)|(?:(?:xn--)[a-z0-9]+))(?:-[a-z0-9]+)*)|(?:\[(?:(?:IPv6:(?:(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){7})|(?:(?!(?:.*[a-f0-9][:\]]){7,})(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){0,5})?::(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){0,5})?)))|(?:(?:IPv6:(?:(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){5}:)|(?:(?!(?:.*[a-f0-9]:){5,})(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){0,3})?::(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){0,3}:)?)))?(?:(?:25[0-5])|(?:2[0-4][0-9])|(?:1[0-9]{2})|(?:[1-9]?[0-9]))(?:\.(?:(?:25[0-5])|(?:2[0-4][0-9])|(?:1[0-9]{2})|(?:[1-9]?[0-9]))){3}))\]))$/", $object->email) && !preg_match("/^(?!(?:(?:\x22?\x5C[\x00-\x7E]\x22?)|(?:\x22?[^\x5C\x22]\x22?)){255,})(?!(?:(?:\x22?\x5C[\x00-\x7E]\x22?)|(?:\x22?[^\x5C\x22]\x22?)){65,}@)(?:(?:[\x21\x23-\x27\x2A\x2B\x2D\x2F-\x39\x3D\x3F\x5E-\x7E]+)|(?:\x22(?:[\x01-\x08\x0B\x0C\x0E-\x1F\x21\x23-\x5B\x5D-\x7F]|(?:\x5C[\x00-\x7F]))*\x22))(?:\.(?:(?:[\x21\x23-\x27\x2A\x2B\x2D\x2F-\x39\x3D\x3F\x5E-\x7E]+)|(?:\x22(?:[\x01-\x08\x0B\x0C\x0E-\x1F\x21\x23-\x5B\x5D-\x7F]|(?:\x5C[\x00-\x7F]))*\x22)))*@(?:(?:(?!.*[^.]{64,})(?:(?:(?:xn--)?[a-z0-9]+(?:-[a-z0-9]+)*\.){1,126}){1,}(?:(?:[a-z][a-z0-9]*)|(?:(?:xn--)[a-z0-9]+))(?:-[a-z0-9]+)*)|(?:\[(?:(?:IPv6:(?:(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){7})|(?:(?!(?:.*[a-f0-9][:\]]){7,})(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){0,5})?::(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){0,5})?)))|(?:(?:IPv6:(?:(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){5}:)|(?:(?!(?:.*[a-f0-9]:){5,})(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){0,3})?::(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){0,3}:)?)))?(?:(?:25[0-5])|(?:2[0-4][0-9])|(?:1[0-9]{2})|(?:[1-9]?[0-9]))(?:\.(?:(?:25[0-5])|(?:2[0-4][0-9])|(?:1[0-9]{2})|(?:[1-9]?[0-9]))){3}))\]))$/", $object->email)) {
    echo "your email has to be a Cognizant or Netcentric email address<br>";
    $error = true;
  }

  if (
    $object->password !== $object->repeatedpassword ||
    trim($object->password) == ''
  ) {
    echo "invalid password <br>";
    $error = true;
  }

  if (strlen($object->password) < 8 || strlen($object->repeatedpassword) < 8) {
    echo "password must be more than 8 characters<br>";
    $error = true;
  }



  if ($object->password !== $object->repeatedpassword) {
    echo "passwords dont match<br>";
    $error = true;
  }

  if ($error == true) {
    return http_response_code(422);
  }

  $emailUsedQuery = "SELECT * FROM user WHERE email = '$object->email'";
  $stmtUsedQuery = $user->con->prepare($emailUsedQuery);
  $stmtUsedQuery->execute();
  $usedMailCount = $stmtUsedQuery->rowCount();

  if ($usedMailCount !== 0) {
    echo "Email already used";
    return http_response_code(422);
  }



  $user->firstname        = $object->firstname;
  $user->lastname         = $object->lastname;
  $user->email            = $object->email;
  $user->password         = md5($object->password);
  $user->verificationkey  = md5($object->email);

  if ($user->create()) {

    // Load Composer's autoloader
    require '../../resources/libraries/vendor/autoload.php';

    // Instantiation and passing `true` enables exceptions
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
      $mail->addAddress($object->email);                 // Add a recipient
      // $mail->addReplyTo('Switzerland-HRSS@cognizant.com');


      // Content
      $mail->isHTML(true);                                  // Set email format to HTML
      $mail->Subject = 'Pinboard Registration';
      $mail->Body    = '<p style="text-align: center;"><span style="font-size: 36px;"><strong><span style="color: red;">Herzlich Willkommen!</span></strong></span></p>
          <p style="text-align: center;"><span style="font-size: 36px;"><strong><span style="color: red;">zum Cognizant Pinboard</span></strong></span></p>
          <p style="text-align: center;"><span style="font-size: 14px; color: blue;">Sie haben sich erfolgreich für das Cognizant Pinboard , doch um Ihre Registration abzuschliessen, müssen Sie noch ihre E-Mail adresse bestätigen.</span></p>
          <p style="text-align: center;"><span style="font-size: 14px; color: blue;">Tippen sie auf diesen Button, um Ihre Registration Vollständig abzuschliessen</span></p>
          <a class="btn btn-danger" href="localhost/pinboard/verification.html?k=' . $user->verificationkey . '">Verifizieren</a>';
      $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

      $mail->send();
      echo 'Message has been sent';
    } catch (Exception $e) {

      echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
      return http_response_code(422);
    }

    return http_response_code(200);
  } else {
    return http_response_code(402);
  }
} else {
  return http_response_code(403);
}
