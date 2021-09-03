<?php
require "header.php";
require "../back_end/connect_db.php";
?>
<!-- products start -->
<div class="container">
    <div class="mt-5 mb-5">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xl-12 mb-5">
                <div class="card text-white text-center" id="hero">
                    <div class="card-header">
                        Featured Products
                    </div>
                    <div class="card-body">
                        <h5 class="card-title text-uppercase">Our Hottest Products at the moment</h5>
                        <img src="./img/t-shirt.png" class="img-fluid" alt="t-shirt"><br><br>
                        <a href="#" class="btn btn-success">See the featured products</a>
                    </div>
                    <div class="card-footer text-white">
                        See More Products That May Interest You
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xl-12 mb-5 mt-5 text-center">
                <h1>-----Products-----</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="row">
                    <?php
                    $stmt = $conn->prepare("SELECT * FROM Products LIMIT 6 ;");
                    $stmt->execute();
                    $prod = $stmt->fetchAll(\PDO::FETCH_ASSOC);
                    foreach ($prod as $key => $prodList) {
                        $id = $prodList["id"];
                    ?>
                        <div class="col-lg-4 col-md-4 col-sm-4 col-xl-4 text-center">
                            <div class="card border-0 bg-dark mb-2 h-100">
                                <img src="./img/t-shirt.jpeg" class="img-fluid" alt="t-shirt">
                                <div class="card-body">
                                    <span style="color: white">
                                        <h5 class="card-title"><?php echo $prodList["name"]; ?></h5>
                                    </span>
                                    <span style="color: white">
                                        <p class="card-text"><?php echo $prodList["description"]; ?></p>
                                    </span>
                                    <div class="modal-review__rating-order-wrap ms-5" onclick="location.href='<?php echo 'homepage.php?id=' . $id ?>'">
                                        <span data-rating-value="1"></span>
                                        <span data-rating-value="2"></span>
                                        <span data-rating-value="3"></span>
                                        <span data-rating-value="4"></span>
                                        <span data-rating-value="5"></span>
                                    </div><br><br>
                                    <p class="text-white" id="ratings"><?php
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