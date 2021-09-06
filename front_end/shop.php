<?php
require "header.php";
require "../back_end/connect_db.php";
?>
<!-- products start -->
<div class="container">
    <div class="mt-5 mb-5">
        <div class="row">
            <div class="col-md-3">
                <div class="card shadow bg-dark text-white">
                    <div class="card-title text-center border-bottom">
                        <h4 class="p-3">Filter Products By Price</h4>
                    </div>
                    <div class="card-body">
                        <form action="" method="GET">
                            <label for="price-min">Price Min</label>
                            <input type="text" value="0" name="price-min"><br><br>
                            <label for="price-max">Price Max</label>
                            <input type="text" value="2000" name="price-max">
                            <div class="d-grid">
                                <button type="submit" class="btn btn-success mt-4" name="submit" id="submit">Search</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-9 text-center">
                <h1 class="mb-5">Browse Products</h1>
                <div class="card text-white text-center" id="hero">
                    <div class="card-header">
                        Featured Products
                    </div>
                    <div class="card-body mt-2">
                        <h5 class="card-title text-uppercase">Our Hottest Products at the moment</h5>
                        <h6>Check Out Our Top of The Line T-Shirt</h6>
                        <a href="#" class="btn btn-success">See the featured products</a>
                    </div>
                    <div class="card-footer text-white">
                        See More Products That May Interest You
                    </div>
                </div>
            </div>
        </div>

        <div class="row mt-3">
            <div class="col-lg-12">
                <div class="row">
                    <?php
                    if (isset($_GET["price-min"]) && isset($_GET["price-max"])) {
                        $stmt = $conn->prepare("SELECT * FROM Products WHERE price BETWEEN :mi AND :ma");
                        $stmt->bindParam(":mi", $_GET["price-min"]);
                        $stmt->bindParam(":ma", $_GET["price-max"]);
                    } else {
                        $stmt = $conn->prepare("SELECT * FROM Products;");
                    }
                    $stmt->execute();
                    $prod = $stmt->fetchAll(\PDO::FETCH_ASSOC);
                    foreach ($prod as $key => $prodList) {
                        $id = $prodList["id"];
                    ?>
                        <div class="col-lg-4 col-md-4 col-sm-4 col-xl-4 text-center">
                            <div class="card border-0 bg-dark  mb-2 h-100">
                                <img src="./img/t-shirt.jpeg" class="img-fluid" alt="t-shirt">
                                <div class="card-body">
                                    <span style="color: white">
                                        <h5 class="card-title"><?php echo $prodList["name"]; ?></h5>
                                    </span>
                                    <span style="color: white">
                                        <p class="card-text"><?php echo $prodList["description"]; ?></p>
                                    </span>
                                    <div class="modal-review__rating-order-wrap ms-5" onclick="location.href='<?php echo 'shop.php?id=' . $id ?>'">
                                        <span data-rating-value="1"></span>
                                        <span data-rating-value="2"></span>
                                        <span data-rating-value="3"></span>
                                        <span data-rating-value="4"></span>
                                        <span data-rating-value="5"></span>
                                    </div><br><br>
                                    <p class="text-white" id="ratings">
                                        <?php
                                            $_SESSION["prod_id_rating"] = $_GET["id"];

                                            $stmt = $conn->prepare("SELECT AVG(stars) FROM Rating WHERE id_product = :i");
                                            $stmt->bindParam(":i", $prodList["id"]);
                                            $stmt->execute();
                                            $round = $stmt->fetch();
                                            echo "Product Rating: " . round($round[0]);;
                                        ?>
                                    </p>
                                    <span style="color: rgb(240, 43, 48);">
                                        <h6><?php echo $prodList["price"]; ?></h6>
                                    </span>
                                    <?php
                                    echo "<a href='details.php?product_id=" . $prodList["id"] . "'" . "class='btn btn-success'>See More Details</a>";
                                    ?>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- products end -->
<?php require "footer.php"; ?>
<script>
    window.onload = function() {
        if (!window.location.hash) {
            window.location = window.location + '#loaded';
            window.location.reload();
        }
    }
</script>