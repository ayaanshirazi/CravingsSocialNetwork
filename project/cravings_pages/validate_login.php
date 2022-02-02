<?php 
session_start(); 
include "db_conn.php";

if (isset($_POST['uname']) && isset($_POST['password'])) {

	function validate($data){
       $data = trim($data);
	   $data = stripslashes($data);
	   $data = htmlspecialchars($data);
	   return $data;
	}
	$pdo = connectDB();
	$uname = validate($_POST['uname']);
	$pass = validate($_POST['password']);

	if (empty($uname)) {
		header("Location: login.php?error=User Name is required");
	    exit();
	}else if(empty($pass)){
        header("Location: login.php?error=Password is required");
	    exit();
	}else{
		try{

			// hashing the password
			$pdo = connectDB();
            $newpass = password_verify($pass, $hashedPass);
			$query = "SELECT * FROM users WHERE user_name='$uname' AND password='$newpass'";
			$stmt = $pdo->query($query);
			$row=$stmt->fetch(PDO::FETCH_ASSOC);
	
			if ($stmt->rowCount() > 0) {
					if ($uname ==$row["username"]){
                        if($newpass==$row["password"])
                        {
                            $_SESSION['user_name'] = $row['user_name'];
						    $_SESSION['name'] = $row['name'];
						    $_SESSION['id'] = $row['id'];
						    header("Location: ../user_pages/user_homepage.php");
						    exit();
                        }						
					}else{
						header("Location: login.php?error=Incorect User name or password");
						exit();
					}
			}else{
				header("Location: login.php?error=Incorect User name or password");
				exit();
			}
		}
		catch(PDOException $e){
			$e->getMessage();
		}
		
	}
	
}else{
	header("Location: login.php");
	exit();
}