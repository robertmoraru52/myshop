<?php
  session_start();
  require "connect_db.php";

  if(isset($_POST["submit"])){
    foreach(array_keys($_SESSION['cart']) as $key => $value){
        $stmt = $conn->prepare("SELECT * FROM Products WHERE id = :i");
        $stmt->bindParam(":i",$value);
        $stmt->execute();
        $prod = $stmt->fetchAll(\PDO::FETCH_ASSOC);
        foreach($prod as $value){
            $stmt = $conn->prepare("INSERT INTO Orders (product_id, product_q, user_email) VALUES(:p, :pq, :u)");
            $stmt->bindParam(":p", $value["id"]);
            $stmt->bindParam(":pq", $_SESSION["cart"][$value["id"]]);
            $stmt->bindParam(":u", $_SESSION["email"]);
            $stmt->execute();

            $stock=$value["stock"]-$_SESSION["cart"][$value["id"]];
            $stmt = $conn->prepare("UPDATE Products SET stock = :s WHERE id = :i");
            $stmt->bindParam(":s", $stock);
            $stmt->bindParam(":i", $value["id"]);
            $stmt->execute();

        }
    }
    header("location: ../front_end/homepage.php");
    unset($_SESSION['cart']);
    unset($_SESSION["cart_total"]);
  }