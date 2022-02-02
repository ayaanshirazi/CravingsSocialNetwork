<?php


/**********************************************************************************
/*                    GET SPECIFIC RECIPE FOR USER TO SHOW ON
/*                           - Created Recipe List
/*       This page receives XHR from: "../scripts/created_recipe_list.js"        
***********************************************************************************/

//SET UP DATABASE CONNECTION
include "./includes/library.php";
$pdo = connectDB();

//HEADERS
header('Access-Control-Allow-Origin: *');
header("Content-Type:application/json");


$userID = $_GET['userID'] ?? null;

//PDO QUERY
$statement = $pdo->prepare("SELECT `recipe ID`,`recipe name`, `prep time` FROM `cois3420_cravings_recipes` WHERE `user ID` = ?");
$statement->execute([$userID]);

//Array for a single recipe
$getRecipe = array(); 
//Array for all recipes
$getAllRecipes = array(); 

//ADD QUERY RESULTS INTO ARRAYS
foreach($stmt as $row){
    $getRecipe['recipeId'] = $row['recipe ID'];
    $getRecipe['recipeName'] = $row['recipe name'];
    $getRecipe['prepTime'] = $row['prep time']; 

    $getAllRecipes[] = $getRecipe; 
}

//ENCODE ARRAY TO JSON
echo json_encode($getAllRecipes, JSON_PRETTY_PRINT);

?>
