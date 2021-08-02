<?php
require "connect_db.php";

$email = trim($_POST["email"]);
$psw = trim($_POST["password"]);
$psw_confirm = trim($_POST["confirm_password"]);
$psw_p = password_hash($_POST["password"], PASSWORD_DEFAULT);

if($psw != $psw_confirm){
     header("location: ../front_end/registration.php?psw=error");
}
else{
        $sql = "SELECT id FROM Users WHERE email = :em";
        if($stmt = $conn->prepare($sql)){
                $stmt->bindParam(":em", $email, PDO::PARAM_STR);
                if($stmt->execute()){
                        if($stmt->rowCount() == 1){
                                header("location: ../front_end/registration.php?email=error");
                        }
                         else{
                                $sql = "INSERT INTO Users(email, password) VALUES(:em, :psw)";
                                $stmt = $conn->prepare($sql);
                                $stmt->bindParam(":em", $email, PDO::PARAM_STR);
                                $stmt->bindParam(":psw", $psw_p, PDO::PARAM_STR);
                                $stmt->execute();
                                header("location: ../front_end/redirect_login.php");
                        }
                }
        }
       
}
