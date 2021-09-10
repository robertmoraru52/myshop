<?php require "header.php";
require "../back_end/connect_db.php";
?>
<div class="container pb-5 mb-2 mt-5">
    <?php
     $stmt = $conn->prepare("SELECT * FROM Orders WHERE user_email = :i");
     $stmt->bindParam(":i",$_SESSION["email"]);
     $stmt->execute();
    if ($stmt->rowCount() == 0) {
        echo '<div class="alert alert-danger alert-dismissible fade show text-center mb-5"><span class="alert-close" data-dismiss="alert"></span>You did not order any items !</div>';
    } else {
    ?>
        <div class="alert alert-info alert-dismissible fade show text-center mb-5"><span class="alert-close" data-dismiss="alert"></span>These are the items in your order:</div>
    <?php
    }    
       
        $prod = $stmt->fetchAll(\PDO::FETCH_ASSOC);
        foreach($prod as $value){
    ?>
        <div class="cart-item d-md-flex justify-content-between">
            <div class="px-3 my-3">
                <a class="cart-item-product" href="details.php?product_id=<?php echo $value["product_id"]; ?>">
                    <div class="cart-item-product-thumb"><img src="img/t-shirt.png" alt="Product"></div>
                    <div class="cart-item-product-info">
                        <h4 class="cart-item-product-title"> 
                        <?php 
                        $stmt = $conn->prepare("SELECT * FROM Products WHERE id = :v");
                        $stmt->bindParam(":v",$value["product_id"]);
                        $stmt->execute();
                        $name = $stmt->fetch();
                        echo $name['name'];
                        ?> </h4><span><strong>Type:</strong> Short Sleeve</span><span><strong>Color:</strong> Black</span>
                    </div>
                </a>
            </div>
            <div class="px-3 my-3 text-center">
                <div class="cart-item-label">Quantity</div>
                <div class="count-input">
                    <select class="form-control" id="quantity-cart">
                       <option selected> <?php echo $value["product_q"]; ?> </option>
                    </select>
                </div>
            </div>
            <div class="px-3 my-3 text-center">
                <div class="cart-item-label">Orderd At</div><span class="text-xl font-weight-medium">
                    <?php echo $value["orderd_at"]; ?>
                </span>
            </div>
        </div>
    <?php
        }
    ?>
    <hr class="my-2">
    <div class="row pt-3 pb-5 mb-2">
        <div class="col-sm-6 mb-3 text-center">
            <a class="btn btn-style-1 btn-secondary btn-block" href="homepage.php"><i class="fe-icon-refresh-ccw"></i>Continue Shopping</a>
        </div>
    </div>
</div>
<?php require "footer.php" ?>