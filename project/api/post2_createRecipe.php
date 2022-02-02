<?php

/***********************************************************************************
/*                            POST DATA TO RECIPE FORM                             */
/*          This page receives XHR from: "../scripts/create_recipe.js"             */
/***********************************************************************************/

//SET UP DATABASE CONNECTION
include "./includes/library.php";
$pdo = connectDB();

//HEADERS
header('Access-Control-Allow-Origin: *');
header("Content-Type:application/json");

//INITIALIZE AND DECLARE VARIABLES TAKEN FROM FORM
$id = $_POST['id'] ?? "";
$username = $_POST['username'] ?? ""; 
$recipeName = $_POST['recipeName'] ?? ""; 
$prepTime = $_POST['prepTime'] ?? ""; 
$ingredients = $_POST['ingredients'] ?? ""; 
$directions = $_POST['directions'] ?? ""; 

//USE PDO QUERY TO INSERT FORM VALUES INTO DATABASE
$query = "INSERT INTO `cois3420_cravings_recipes`(`recipe id`,`username`,`recipe name`,  `prep time`, `ingredients`, `directions`) VALUES(?,?,?,?,?,?)";
$stmt=$pdo->prepare($query) ->execute([$id, $username, $recipeName, $prepTime, $ingredients,$directions]);

?>
