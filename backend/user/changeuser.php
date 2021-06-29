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

      if(!$object = json_decode($postdata)) {
    return http_response_code(400);
  }

  $error = false;
  $empty = 0;

  if ($object->firstname == "") {
        
        $empty =  $empty  + 1;
        $user->firstname = $object->cfirstname;

}  else {
     

    if ($object->cfirstname == $object->firstname) {
    echo "please don't choose the same firstname as before<br>";
    $error = true;

  }elseif(is_numeric($object->firstname )){
    echo "your firstname can't include a number<br>";
    $error = true;

  }elseif (strlen($object->firstname) < 2) {
    echo "your firstname must be atleast 2 characters<br>";
    $error = true;

  }elseif (strlen($object->firstname) > 50) {
    echo "your firstname can't be longer than 50 characters<br>";
    $error = true;

  }elseif ($object->firstname == "" ) {
      echo "please fill out<br>";
      $error = true;

  }else{
    $user->firstname = $object->firstname;
  }
}

if ($object->lastname == "") {
         
            $empty = $empty + 1;
            $user->lastname = $object->clastname;
  }  else {

        if ($object->clastname == $object->lastname) {
        echo "please don't choose the same lastname as before<br>";
        $error = true;
    
      }elseif(is_numeric($object->lastname )){
        echo "your lastname can't include a number<br>";
        $error = true;
    
      }elseif (strlen($object->lastname) < 2) {
        echo "your lastname must be atleast 2 characters<br>";
        $error = true;
    
      }elseif (strlen($object->lastname) > 50) {
        echo "your lastname can't be longer than 50 characters<br>";
        $error = true;
    
      }else{
        $user->lastname = $object->lastname;
      }
  }


  
  if ($empty == 2) {
      echo "please fill out atleast 1 field<br>";
      return http_response_code(422);
  }
  
  if ($error) {
    return http_response_code(422);
  }
 /*  if ($object->firstname == $object->cfirstname) {
    $user->firstname = $object->firstname;
    
  } */

  
 
  $user->userid = $object->cuserid;

  $stmt = $user->updateUser();

  if (!$stmt) {
  
    return http_response_code(422);
  }
  else {
     foreach ($stmt as $row) {
      echo json_encode(
        array(
          "userid"    => $row["userid"],
          "firstname" => $row["firstname"],
          "lastname"  => $row["lastname"],
          "password"  => $row["password"],
          "email"     => $row["email"]
        )
      );
     
    } 


    //return http_response_code(200);
  }



}