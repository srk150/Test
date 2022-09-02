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

    $content       = $_POST['content'];
    $created_at    = date('Y-m-d h:i');

  if(empty($content)){


        $response = array(

        "status" => "error",

        "response" => "Content is Empty!"

         );

    }else{

    

         $sql = mysqli_query($con,"INSERT INTO cms(content,created_at) VALUES('$content','$created_at')");

     
        // set response code - 201 
        
         $response = array(

        "status" => "success",
        "response" => "Successfully Added!"

         );
  
}
  
 }


else{
  
     $response = array(

        "status" => "error",

        "response" => "Access Denied Method Not Allowed!"

         );
   
   }
   
   echo json_encode($response);

?>

