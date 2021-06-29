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
  if(!$loginObj = json_decode($postdata)) {
      return http_response_code(400);
  }
  if($loginObj->cogid < 100000 ||
     $loginObj->cogid > 999999) {
       return http_response_code(400);
     }

    $user->cogid      = $loginObj->cogid;
    //Query users
    $stmt = $user->getUser();
    $num = $stmt->rowCount();

    if($num != 0) {
      //user array
      $user_array = array();
      //fetch result content
      while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        //extract row
        extract($row);
        $temp_user = array(
          "cogid" => $cogid,
          "firstname" => $firstname,
          "lastname" => $lastname,
          "email" => $email,
          "password" => $password,
          "teamid" => $teamid
        );
        array_push($user_array, $temp_user);
      }
      echo json_encode($user_array);
      return http_response_code(200);
    } else {
      return http_response_code(404);
    }
} else {
  return http_response_code(200);
}
