<?php
//Req headers
header('Access-Control-Allow-Origin: *');
header("Content-Type: application/json; charset: UTF-8");
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
  if(!$loginObj = json_decode($postdata)) {
    return http_response_code(400);
  }

  $loginObj->cogid = intval($loginObj->cogid);

  if($loginObj->cogid < 100000 ||
  $loginObj->cogid > 999999) {
     return http_response_code(400);
  }

  $user->cogid        = $loginObj->cogid;

  if ($user->updateDeputy($deputyid)) {
    echo json_encode("");
    return http_response_code(200);
  } else {
    return http_response_code(400);
  }
} else {
    return http_response_code(400);
}
