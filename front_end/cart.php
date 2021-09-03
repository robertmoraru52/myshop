<?php require "header.php";
require "../back_end/connect_db.php";
?>
<div class="container pb-5 mb-2 mt-5">
    <?php
    $stmt = $conn->prepare("SELECT * FROM Cart WHERE user_email = :u");
    $stmt->bindParam(":u", $_SESSION["email"]);
    $stmt->execute();
    if ($stmt->rowCount() == 0) {
        echo '<div class="alert alert-danger alert-dismissible fade show text-center mb-5"><span class="alert-close" data-dismiss="alert"></span>You have no items in your shopping cart !</div>';
    } else {
    ?>
        <div class="alert alert-info alert-dismissible fade show text-center mb-5"><span class="alert-close" data-dismiss="alert"></span>These are the items in your shopping cart:</div>
    <?php
    }
    $total = 0;
    if (isset($_GET["action"])) {
        if ($_GET["action"] == "delete") {
            $stmt = $conn->prepare("DELETE FROM Cart WHERE product_id = :g AND user_email = :u");
            $stmt->bindParam(":g", $_GET["id"]);
            $stmt->bindParam(":u", $_SESSION["email"]);
            $stmt->execute();
            header("location: cart.php");
            echo ' <div class="alert alert-danger text-center mt-4" role="alert">
                                    Item removed from shopping cart!
                            </div>';
        }
    }


    $stmt = $conn->prepare("SELECT * FROM Cart WHERE user_email = :u");
    $stmt->bindParam(":u", $_SESSION["email"]);
    $stmt->execute();
    $cart = $stmt->fetchAll(\PDO::FETCH_ASSOC);
    foreach ($cart as $key => $value) {
    ?>
        <div class="cart-item d-md-flex justify-content-between">
            <span class="remove-item"><a class="text-reset" href="cart.php?action=delete&id=<?php echo $value["product_id"]; ?>"><i class="fa fa-times"></i></a></span>
            <div class="px-3 my-3">
                <a class="cart-item-product" href="details.php?product_id=<?php echo $value["product_id"]; ?>">
                    <div class="cart-item-product-thumb"><img src="img/t-shirt.png" alt="Product"></div>
                    <div class="cart-item-product-info">
                        <h4 class="cart-item-product-title"> <?php echo $value["product_name"];  ?> </h4><span><strong>Type:</strong> Short Sleeve</span><span><strong>Color:</strong> Black</span>
                    </div>
                </a>
            </div>
            <div class="px-3 my-3 text-center">
                <div class="cart-item-label">Quantity</div>
                <div class="count-input">
                    <select class="form-control" id="quantity-cart" onChange="window.location.href=this.value;getComboCart(this)">
                        <option value="cart.php?prod_id=<?php echo $value["product_id"]; ?>">1</option>
                        <option value="cart.php?prod_id=<?php echo $value["product_id"]; ?>">2</option>
                        <option value="cart.php?prod_id=<?php echo $value["product_id"]; ?>">3</option>
                        <option value="cart.php?prod_id=<?php echo $value["product_id"]; ?>">4</option>
                        <option selected><?php echo $value["product_q"] ?></option>

                    </select>
                </div>
            </div>
            <div class="px-3 my-3 text-center">
                <div class="cart-item-label">Price</div><span class="text-xl font-weight-medium">
                    <?php
                    $_SESSION["multiply_id"] = $_GET["prod_id"];
                    echo $value["product_price"] . " Lei "; ?>
                </span>
            </div>
        </div>
    <?php
    }
    ?>
    <div class="d-sm-flex justify-content-between align-items-center text-center text-sm-left">
        <div class="py-2"><span class="d-inline-block align-middle text-sm text-muted font-weight-medium text-uppercase mr-2">Subtotal:</span><span class="d-inline-block align-middle text-xl font-weight-medium">
                <?php
                for ($i = 0; $i < count($cart); $i++) {
                    $total = $total + $cart[$i]["product_price"] * $cart[$i]["product_q"];
                }
                $totalItems = count($cart);
                echo $total;
                $_SESSION["cart_total"] = $total;
                $_SESSION["items_total"] = $totalItems;
                ?>
                Lei</span></div>
    </div>
    <hr class="my-2">
    <div class="row pt-3 pb-5 mb-2">
        <div class="col-sm-6 mb-3 text-center">
            <a class="btn btn-style-1 btn-secondary btn-block" href="homepage.php"><i class="fe-icon-refresh-ccw"></i>Continue Shopping</a>
        </div>
        <div class="col-sm-6 mb-3 text-center"><a class="btn btn-style-1 btn-primary btn-block" href="checkout-address.html"><i class="fe-icon-credit-card"></i>Checkout</a></div>
    </div>
</div>
<script>
    window.onload = function() {
        if (!window.location.hash) {
            window.location = window.location + '#loaded';
            window.location.reload();
        }
    }
</script>
<?php require "footer.php" ?>