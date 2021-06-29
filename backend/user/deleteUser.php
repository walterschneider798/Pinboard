<?php
//Req headers
header('Access-Control-Allow-Origin: *');
header("Content-Type: application/json; charset:UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Allow-Credentials: true");
header("Access-Control-Allow-Headers: access");

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

  

  

  if (strlen($object->email) < 1) {
    echo "email can't be emtpy<br>";
    $error = true;
  } else if (strlen($object->email) > 100) {
    echo "email is too long<br>";
    $error = true;
  }elseif(!preg_match("/^[-0-9a-zA-Z.+_]+@cognizant.com$/", $object->email) && !preg_match("/^[-0-9a-zA-Z.+_]+@netcentric.biz$/", $object->email)){
    echo "your email has to be a Cognizant or Netcentric email address<br>";
    $error = true;
  }
  elseif($object->email !== $object->cemail){
    echo "You're not allowed to delete this account<br>";
    $error = true;

  }else if (strlen($object->password) < 8) {
    echo "password must be more than 8 characters<br>";
    $error = true;
  } elseif(md5($object->password) !== $object->cpassword){
    echo "wrong password<br>";
    $error = true;

  }

  if ($object->userid > 10000000 || $object->userid < 1) {
    echo "unable to delete your Account";
    $error = true;
  }

  if (!is_numeric($object->userid)) {
    echo "unable to delete your account";
    $error = true;
  }

  if ($error == true) {
    return http_response_code(422);
  }


  $user->userid = $object->userid;
  $user->password = md5($object->password);
  $user->email = $object->email;

  if ($user->delete()) {
   
    
    return http_response_code(200);

  } else {
    return http_response_code(400);
  }
} else {
  return http_response_code(400);
}
