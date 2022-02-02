<?php


/**********************************************************************************
/*                    GET SPECIFIC RECIPE FOR USER TO SHOW ON
/*                           - Saved Recipe List
/*       This page receives XHR from: "../scripts/saved_recipe_list.js"        
***********************************************************************************/

//SET UP DATABASE CONNECTION
include "./includes/library.php";
$pdo = connectDB();

//HEADERS
header('Access-Control-Allow-Origin: *');
header("Content-Type:application/json");

//GET USER ID FROM GET ARRAY
$userID = $_GET['userID'] ?? null;

//QUERY THE SAVED RECIPE ID'S FROM THE USER'S DATABASE TABLE USING THE USER ID
$statement = $pdo->prepare("SELECT `saved recipe ID's` FROM `cois3420_cravings_users` WHERE `userID` = ?");
$statement->execute([$userID]);

//PUT QUERY RESULTS INTO A STRING
foreach($stmt as $row){
    $recipeIDs =  $row[`saved recipe ID's`];
}

//TURN STRING INTO ARRAY : Contains all ID's of the recipes saved
$savedRecIDs = explode("", $recipeIDs); 


//Array for details of a single recipe
$getRecipe = array();

//Array to store all the recipes and their details
$getAllRecipes = array();

//FOR EACH RECIPE ID RETURNED
foreach($savedRecIDs as $i):

    //Query the recipe details from the Recipe table
    $statement = $pdo->prepare("SELECT `username`,`recipe name`, `prep time` FROM `cois3420_cravings_recipes` WHERE `recipe ID` = ?");
    $statement->execute([$i]);

    //Put query results into arrays
    foreach($stmt as $row) { 
        $getRecipe['recipeId'] = $row['recipe ID'];
        $getRecipe['recipeName'] = $row['recipe name'];
        $getRecipe['prepTime'] = $row['prep time']; 

        $getAllRecipes[] = $getRecipe;
    } 

endforeach; 

//ENCODE ARRAY TO JSON
echo json_encode($getAllRecipes, JSON_PRETTY_PRINT);

?>
