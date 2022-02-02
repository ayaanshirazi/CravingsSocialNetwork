<?php

/***********************************************************************************/
/*            GET ALL USER DETAILS FOR THE USERS ACCOUNT SETTINGS                  */
/***********************************************************************************/

//SET UP DATABASE CONNECTION
include "./includes/library.php";
$pdo = connectDB();

//HEADERS
header('Access-Control-Allow-Origin: *');
header("Content-Type:application/json");

//PDO QUERY
$query = "SELECT * FROM `cois3420_cravings_recipes` WHERE ID = 1";
$stmt = $pdo->query($query); 

//CREATE ARRAY AND ENTER VALUES
$userData = array(); 
foreach($stmt as $row){
    $userData['id'] = $row['id']; 
    $userData['username'] = $row['username']; 
    $userData['name'] = $row['name']; 
    $userData['email'] = $row['email']; 
    $userData['password'] = $row['password']; 
}

//ENCODE ARRAY TO JSON
echo json_encode($userData, JSON_PRETTY_PRINT);

?>
