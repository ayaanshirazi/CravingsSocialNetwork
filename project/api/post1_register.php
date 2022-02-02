<?php

/***********************************************************************************
/*         POST REGISTRATION FORM DATA TO COIS_CRAVINGS_USERS DATABASE TABLE       */
/*              This page receives XHR from: "../scripts/register.js"              */
/***********************************************************************************/

//SET UP DATABASE CONNECTION
include "./includes/library.php";
$pdo = connectDB();

//HEADERS
header('Access-Control-Allow-Origin: *');
header("Content-Type:application/json");

//GET VALUES FROM POST ARRAY
$id = $_POST['id'] ?? "";
$name = $_POST['name'] ?? "";
$email = $_POST['email'] ?? "";
$username = $_POST['username'] ?? "";
$password = $_POST['password'] ?? "";

//HASH PASSWORD
$hashedPass = password_hash($password, PASSWORD_DEFAULT);

//USE PDO QUERY TO INSERT FORM VALUES INTO DATABASE
$query = "INSERT INTO `cois3420_cravings_users`(`ID`,`name`,  `email`, `username`, `password`) VALUES(?,?,?,?,?)";
$stmt=$pdo->prepare($query) ->execute([$id, $name, $email, $username, $hashedPass]);

?>
