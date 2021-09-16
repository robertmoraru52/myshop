<?php require "header.php";
require "../back_end/connect_db.php";
?>
<div class="container pb-5 mb-2 mt-5">
    <?php
    if (!$_SESSION["cart"]) {
        echo '<div class="alert alert-danger alert-dismissible fade show text-center mb-5"><span class="alert-close" data-dismiss="alert"></span>You have no items in your shopping cart !</div>';
    } else {
    ?>
        <div class="alert alert-info alert-dismissible fade show text-center mb-5"><span class="alert-close" data-dismiss="alert"></span>These are the items in your shopping cart:</div>
    <?php
    }
    $total = 0;
    if (isset($_GET["action"]) && $_GET["action"] == "delete") {
            unset($_SESSION["cart"][$_GET["id"]]);
            header("location: cart.php");
            echo ' <div class="alert alert-danger text-center mt-4" role="alert">
                                    Item removed from shopping cart!
                    </div>';
        
    }
    $q = array_keys($_SESSION['cart']);
    foreach(array_keys($_SESSION['cart']) as $key => $value){
        $stmt = $conn->prepare("SELECT * FROM Products WHERE id = :i");
        $stmt->bindParam(":i",$value);
        $stmt->execute();
        $prod = $stmt->fetchAll(\PDO::FETCH_ASSOC);
        foreach($prod as $value){
    ?>
        <div class="cart-item d-md-flex justify-content-between">
            <span class="remove-item"><a class="text-reset" href="cart.php?action=delete&id=<?php echo $value["id"]; ?>"><i class="fa fa-times"></i></a></span>
            <div class="px-3 my-3">
                <a class="cart-item-product" href="details.php?product_id=<?php echo $value["id"]; ?>">
                    <div class="cart-item-product-thumb"><img src="img/t-shirt.png" alt="Product"></div>
                    <div class="cart-item-product-info">
                        <h4 class="cart-item-product-title"> <?php echo $value["name"];  ?> </h4><span><strong>Type:</strong> Short Sleeve</span><span><strong>Color:</strong> Black</span>
                    </div>
                </a>
            </div>
            <div class="px-3 my-3 text-center">
                <div class="cart-item-label">Quantity</div>
                <div class="count-input">
                    <select class="form-control" data-id="<?php echo $_SESSION["cart_total"]*$_SESSION["cart"][$_POST["id"]]; ?>" id="quantity-cart" onChange="getComboCart(this);">
                        <?php 
                        for($i = 1;$i<=$value["stock"];$i++){
                            echo  "<option value='".$value["id"]. "'>".$i."</option>";
                        }
                        ?>
                        <option selected><?php     print_r($_SESSION["cart"][$value["id"]]); ?></option>
                    </select>
                </div>
            </div>
            <div class="px-3 my-3 text-center">
                <div class="cart-item-label">Price</div><span class="text-xl font-weight-medium">
                    <?php
                        echo $value["price"] . " Lei "; 
                    ?>
                </span>
            </div>
        </div>
    <?php
        $_SESSION["cart"][$_POST["id"]] = $_POST["quantity"];
        $total = $total + $value["price"] * $_SESSION["cart"][$value["id"]];
        }
    }
    ?>
        <div class="row">
            <div class="offset-md-10 col-md-2">
                <div class="py-2"><span class="d-inline-block align-middle text-sm text-muted font-weight-medium text-uppercase mr-2">Subtotal:</span><span class="d-inline-block align-middle text-xl font-weight-medium">
                        <?php
                        $totalItems = count(array_filter($_SESSION["cart"]) );
                        echo $total;
                        $_SESSION["cart_total"] = $total;
                        $_SESSION["items_total"] = $totalItems;
                        ?>
                        Lei</span>
                </div>
            </div>    
        </div>
    <hr class="my-2">
    <div class="row pt-3 pb-5 mb-2">
        <div class="col-sm-6 mb-3 text-center">
            <a class="btn btn-style-1 btn-secondary btn-block" href="homepage.php"><i class="fe-icon-refresh-ccw"></i>Continue Shopping</a>
        </div>
        <div class="col-sm-6 mb-3 text-center"><a class="btn btn-style-1 btn-primary btn-block" href="checkout.php"><i class="fe-icon-credit-card"></i>Checkout</a></div>
    </div>
</div>
<?php require "footer.php"; ?>