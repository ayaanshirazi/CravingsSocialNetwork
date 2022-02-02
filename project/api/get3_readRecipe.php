<?php


/***********************************************************************************/
/*                       GET SPECIFIC RECIPE FOR USER TO SHOW                        
/*                            - When Recipe is Opened
/*              This page receives XHR from: "../scripts/read_recipe.js"           */
/***********************************************************************************/

//SET UP DATABASE CONNECTION
include "./includes/library.php";
$pdo = connectDB();

//HEADERS
header('Access-Control-Allow-Origin: *');
header("Content-Type:application/json");


$username = $_GET['username'] ?? null;

//PDO QUERY
$statement = $pdo->prepare("SELECT `recipe name`, `prep time`, `ingredients` , `directions` FROM `cois3420_cravings_recipes` WHERE `username` = ?");
$statement->execute([$username]);

//CREATE ARRAY AND ENTER VALUES
$getRecipe = array(); 
foreach($stmt as $row){
    $data['recipeName'] = $row['recipe name'];
    $data['prepTime'] = $row['prep time']; 
    $data['ingredients'] = $row['ingredients'];
    $data['directions'] = $row['directions'];
}

//ENCODE ARRAY TO JSON
echo json_encode($getRecipe, JSON_PRETTY_PRINT);

?>
