<?php
session_start();

if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
    header("location: ../front_end/homepage.php");
    exit;
}
 
require "connect_db.php";

$sql = "SELECT id, email, password FROM Users WHERE email = :email";
$email = trim($_POST["email"]);
$psw = trim($_POST["psw"]);
        
if($stmt = $conn->prepare($sql)){
    $stmt->bindParam(":email", $email, PDO::PARAM_STR);
    if($stmt->execute()){
        if($stmt->rowCount() == 1){
            if($row = $stmt->fetch()){
                $id = $row["id"];
                $email = $row["email"];
                $hashed_password = $row["password"];
                if(password_verify($psw, $hashed_password)){
                    session_start();
                    $_SESSION["loggedin"] = true;
                    $_SESSION["id"] = $id;
                    $_SESSION["email"] = $email;                            
                    header("location: ../front_end/homepage.php");
                } else{
                    header("location: ../front_end/login.php?error=userorpsw");
                }
            }
        } else{
            header("location: ../front_end/login.php?error=userorpsw");
        }
    } else{
        header("location: ../front_end/login.php?error=error");
    }
    unset($stmt);
}
unset($conn);
