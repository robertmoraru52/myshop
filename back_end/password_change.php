<?php
session_start();
require "connect_db.php";

$emailSession = $_SESSION["email"];
$old_psw = $_POST["old_pass"];
$psw = $_POST["new_pass"];
$confirm_new = $_POST["confirm_new"];
$pswHashed = password_hash($_POST["new_pass"], PASSWORD_DEFAULT);

if($psw == $confirm_new && $psw!=$old_psw){
    $sql = "SELECT * FROM Users WHERE email = :email;";
    if($stmt = $conn->prepare($sql)){
        $stmt->bindParam(":email", $emailSession, PDO::PARAM_STR);
        if($stmt->execute()){
            if($stmt->rowCount() == 1){
                if($row = $stmt->fetch()){
                    $hashed_password = $row["password"];
                    if(password_verify($old_psw, $hashed_password)){
                        $stmt = $conn->prepare("UPDATE Users SET password='$pswHashed' WHERE email='$emailSession';")->execute();
                        header("location: ../front_end/account.php?success=success");
                    } else{
                        header("location: ../front_end/account.php?error=userorpsw");
                    }
                }
            } else{
                header("location: ../front_end/account.php?error=userorpsw");
            }
        } else{
            header("location: ../front_end/account.php?error=error");
        }
        unset($stmt);
    }
    unset($conn);
    
}
else{
    header("location: ../front_end/account.php?error=error");
}
