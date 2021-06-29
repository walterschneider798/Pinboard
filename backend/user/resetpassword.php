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


  if (!$object = json_decode($postdata)) {
    return http_response_code(400);
  }

  $error = false;

  


  if ($object->resetemail == "" ) {
    echo "email can't be empty<br>";
    $error = true;
  }
  elseif (!preg_match("/^[-0-9a-zA-Z.+_]+@cognizant.com$/", $object->resetemail) && !preg_match("/^[-0-9a-zA-Z.+_]+@netcentric.biz$/", $object->resetemail)) {
    echo "your email has to be a Cognizant or Netcentric email address<br>";
    $error = true;
  }

  if ($error = true) {
    return http_response_code(422);
  }

  $user->email = $object->resetemail;

  $stmt = $user->getUser();

  if (!$stmt) {
      echo "login failed";
      return http_response_code(502);
  }  

  
}
