<?php
require "connect_db.php";

$name = trim($_POST["category"]);

$sql = "SELECT id FROM Categories WHERE name = :n";
        if($stmt = $conn->prepare($sql)){
                $stmt->bindParam(":n", $name, PDO::PARAM_STR);
                if($stmt->execute()){
                        if($stmt->rowCount() == 1){
                                header("location: ../front_end/admin_categories.php?name=error");
                        }
                         else{
                                $sql = "INSERT INTO Categories(name) VALUES(:name)";
                                $stmt = $conn->prepare($sql);
                                $stmt->bindParam(":name", $name, PDO::PARAM_STR);
                                $stmt->execute();
                                header("location: ../front_end/admin_categories.php");
                        }
                }
        }