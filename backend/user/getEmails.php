<?php

//Req headers
header('Access-Control-Allow-Origin: *');
header("Content-Type: application/json; charset=UTF-8");

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

  $loginObj->admincogid = intval($loginObj->admincogid);

  //Query users
  $stmt = $user->getEmails();
  $num = $stmt->rowCount();

  if($num != 0) {
    //user array
    $email_array = array();
    //fetch result content
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
      //extract row
      extract($row);
      array_push($email_array, $email);
    }

    echo json_encode($email_array);
    return http_response_code(200);

  } else {
    return http_response_code(404);
  }
} else {
  return http_response_code(400);
}
