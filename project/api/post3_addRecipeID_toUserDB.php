<?php

/***********************************************************************************
/*         POST REGISTRATION FORM DATA TO COIS_CRAVINGS_USERS DATABASE TABLE       */
/*              This page receives XHR from: "../scripts/create_recipe.js"              */
/***********************************************************************************/

//SET UP DATABASE CONNECTION
include "./includes/library.php";
$pdo = connectDB();

//HEADERS
header('Access-Control-Allow-Origin: *');
header("Content-Type:application/json");

//GET VALUES FROM POST ARRAY
$string = $_POST["sendObj"]; 
$data = json_decode($string); 
$postId = $string["postId"]; 
$userId = $string["userId"]; 


//GET ARRAY OF CREATED RECIPE ID'S FROM USER'S DATABASE TABLE
$query = "SELECT `created recipe id's` FROM `cois3420_cravings_users` WHERE ID = ";
$stmt = $pdo->query($query); 

foreach($stmt as $row){
    $idArray = $row[`created recipe id's`]; 
}

//ADD THE NEW POSTS ID TO THE ARRAY
$idArray[] = $postId;

//UPDATE DATABASE WITH UPDATED ARRAY CONTAINING THE NEW ID
$query = "UPDATE `cois3420_cravings_users` SET `created recipe id's`=[?] WHERE ID = "; 
$stmt=$pdo->prepare($query) ->execute([$postId]);

?>
