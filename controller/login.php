<?php

// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
  
// get database connection
include_once 'config.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST')
{

    $email              = $_POST['email'];
    $password           = $_POST['password'];


    $sqls    = "SELECT * FROM auth WHERE email='$email' AND password='$password'";
    $results = mysqli_query($con,$sqls);
    $rows    = mysqli_fetch_array($results,MYSQLI_ASSOC);
    $count   = mysqli_num_rows($results);
    
   
     if($count == '1'){
         
        $account_id     = $rows['id'];

        setcookie('id', $account_id, time()+(86400 * 7), '/');
        setcookie('email', $email, time()+(86400 * 7), '/');

        $response = array(

                "status" => "success",

                "response" => "Success!"

                 );
         
         

        }

else{
     $response = array(

        "status" => "error",

        "response" => "Email or Password Does not Match!"

         );
    }

    
  
  }


else{
  
     $response = array(

        "status" => "error",

        "response" => "Access Denied Method Not Allowed!"

         );
        
   
   }

//send data in json

echo json_encode($response);


?>

