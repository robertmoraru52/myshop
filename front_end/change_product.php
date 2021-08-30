<?php
session_start();
require "header.php";
require "../back_end/connect_db.php";
?>
<div class="container rounded bg-white mt-5 mb-5">
    <div class="row">
        <div class="col-md-5 border-right">
            <div class="p-3 py-5">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h4 class="text-right">Product Info</h4>
                </div>
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <p class="text-right"><?php 
                        $_SESSION["change_prod_id"] = $_GET["id"];
                        $stmt = $conn->prepare("SELECT * FROM Products WHERE id = :i");
                        $stmt->bindParam(":i", $_GET["id"]);
                        $stmt->execute();
                        $prod = $stmt->fetch(\PDO::FETCH_ASSOC);
                        echo $prod["name"] . "</br>" . "In Stock: " . $prod["stock"] . "</br>" . $prod["price"]." Lei </br>" . $prod["description"] ;
                    ?></p>
                </div>
                <form action="../back_end/change_product_back.php" method="POST"> 
                    <div class="row mt-2">
                        <div class="col-md-4">
                            <label class="labels">Name: </label>
                            <input type="text" class="form-control" placeholder="change name" id="name" name="name">
                        </div>
                        <div class="col-md-4">
                            <label class="labels">Stock: </label>
                            <input type="text" class="form-control" name="stock" id="stock" placeholder="change stock">
                        </div>
                        <div class="col-md-4">
                            <label class="labels">Price: </label>
                            <input type="text" class="form-control" placeholder="change price" id="price" name="price">
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-md-12">
                            <label class="labels">Description: </label>
                            <textarea type="text" class="form-control" placeholder="change description" name="desc" rows="3"></textarea>
                        </div>
                    </div>
                    <div class="mt-5 text-center">
                        <button class="btn btn-primary profile-button" type="submit" id="submit" name="submit">Save Changes</button>
                    </div>
                </form>
            </div>
        </div>
        </div>
    </div>
</div>
<?php require "footer.php" ?>