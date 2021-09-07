<?php 
require "header.php"; 
require "../back_end/connect_db.php";
$stmt = $conn->prepare("SELECT * FROM Products WHERE name = :g ;");
$stmt->bindParam(":g", $_SESSION["search_prod_nav"]);
$stmt->execute();
$prod = $stmt->fetch(\PDO::FETCH_ASSOC);
$_SESSION["product_cart_price"] = $prod["price"];
$_SESSION["product_cart_name"] = $prod["name"];
$_SESSION["product_cart_id"] = $prod["id"];
?>
<span id="mini-header"><h1><?php echo $prod["name"]; ?></h1></span>
<div class="container">
    <div class="row">
        <div class="col-lg-6 col-md-6 col-sm-6 col-xl-6 text-center">
            <div class="card border-0 bg-dark mb-2">
                <img src="./img/t-shirt.jpeg" class="img-fluid" alt="t-shirt">
                <div class="card-body">
                    <span style="color: white" class="card-title"><h5><?php echo $prod["name"]; ?></h5></span>
                    <span style="color: white" class="card-text"><p><?php echo $prod["description"]; ?></p></span>
                    <div class="modal-review__rating-order-wrap ms-5" >
                                        <span data-rating-value="1"  data-value="<?php echo $prod["id"]; ?>"></span>
                                        <span data-rating-value="2"  data-value="<?php echo $prod["id"]; ?>"></span>
                                        <span data-rating-value="3"  data-value="<?php echo $prod["id"]; ?>"></span>
                                        <span data-rating-value="4"  data-value="<?php echo $prod["id"]; ?>"></span>
                                        <span data-rating-value="5"  data-value="<?php echo $prod["id"]; ?>"></span>
                                    </div>
                                    <br><br>
                                    <p class="text-white">Votes:<?php
                                    $stmt = $conn->prepare("SELECT * FROM Rating WHERE id_product = :i");
                                    $stmt->bindParam(":i", $prod["id"]);
                                    $stmt->execute();
                                    printf($stmt->rowCount()) ;
                                    ?></p>
                                    <br><br>
                                    <p class="text-white" id="ratings"><?php
                                        $stmt = $conn->prepare("SELECT AVG(stars) FROM Rating WHERE id_product = :i");
                                        $stmt->bindParam(":i", $prod["id"]);
                                        $stmt->execute();
                                        $round = $stmt->fetch();
                                        echo "Product Rating: " . round($round[0]);
                                        ?>
                                    </p>
                    <span style="color: rgb(240, 43, 48);"><h6><?php echo $prod["price"]; ?> Lei</h6></span> 
                    <span style="color: green;"><h6><?php echo $prod["stock"]; ?> In Stock</h6></span> 
                </div>
            </div>
        </div>    
        <div class="col-lg-6 col-md-6 col-sm-6 col-xl-6 text-center">
            <div class="card border-0 bg-dark mb-2">
                <div class="card-body">
                    <span class="text-white">
                        <h2 class="card-title"><?php echo $prod["name"]; ?></h1><br>
                        <h5>Comments:</h5>
                        <?php 
                            $stmt = $conn->prepare("SELECT * FROM Products_Comments WHERE product_id = :p");
                            $stmt->bindParam(":p", $prod["id"]);
                            $stmt->execute();
                            $commId = $stmt->fetchAll(\PDO::FETCH_ASSOC);

                            foreach($commId as $key => $comments){
                                $stmt = $conn->prepare("SELECT * FROM Comments WHERE id = :p");
                                $stmt->bindParam(":p", $comments["comment_id"]);
                                $stmt->execute();
                                $showComm = $stmt->fetch(\PDO::FETCH_ASSOC);
                                echo "<ul>
                                        <li><p>".$showComm["user"]." : ". $showComm["comments"] ."</p></li>
                                    </ul>";
                            }
                        ?>
                        <p class="card-text"></p>
                    </span>
                </div>
            </div>   
            <div class="mt-4">
                <form action="../back_end/cart_back_search.php" method="POST">
                    <button type="submit" name="add-to-cart" class="btn btn-success">Add to cart <i class="fas fa-shopping-cart"></i></button>
                </form>
                <?php
                    if(isset($_GET["action"]) && $_GET["action"] == "already"){
                        echo ' <div class="alert alert-danger mt-4" role="alert">
                                    Item already in shopping cart!
                                </div>';
                    }
                    else if($_GET["error"] == "nolog"){
                        echo ' <div class="alert alert-danger mt-4" role="alert">
                                  You need to be logged in for this action !
                                </div>';
                    }
                ?>
            </div> 
    </div>
    <div class="row">
        <div class="col-lg-12 text-center mt-4">
           <h4>Description</h4>
           <p><?php echo $prod["description"]; ?></p>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12 text-center mt-4">
           <h4>Leave A Comment</h4>
           <form action="../back_end/comment.php" method="post">
            <div class="form-group mt-3">
                <textarea class="form-control mt-3" id="comment" name="comment" rows="3"></textarea>
                <input type="submit" name="submit" class="mt-3 mb-5 btn btn-success" value="Comment">
            </div>
           </form>
        </div>
    </div>
</div>
<?php require "footer.php"; ?>
<script>
    window.onload = function() {
    if(!window.location.hash) {
        window.location = window.location + '#loaded';
        window.location.reload();
    }
}
</script>