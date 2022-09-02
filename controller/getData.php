 <?php

require_once('config.php'); 
// database file 

$get = mysqli_query($con,"SELECT * FROM `cms` ORDER BY id ASC");
//get data from cms table 

//loop for get data
while($data = mysqli_fetch_array($get)){ 

echo ucwords($data['content']) . "</br>";

 }

?>