<?php
require "header.php";
require "../back_end/connect_db.php";
?>
<div class="container">
    <div class="mt-5 mb-5">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xl-12 mb-5 mt-5 text-center">
                <h1><?php echo $_SESSION["cat_header"]; ?></h1>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="row">
                    <?php
                    $stmt = $conn->prepare("SELECT * FROM Categories WHERE name = :n ;");
                    $stmt->bindParam(":n", $_SESSION["cat_header"]);
                    $stmt->execute();
                    $cat = $stmt->fetchAll(\PDO::FETCH_ASSOC);
                    foreach ($cat as $key => $catList) {

                        $stmt = $conn->prepare("SELECT * FROM Products_Categories WHERE category_id = :n ;");
                        $stmt->bindParam(":n", $catList["id"]);
                        $stmt->execute();
                        $prodId = $stmt->fetchAll(\PDO::FETCH_ASSOC);
                        foreach ($prodId as $key => $prodSelector) {

                            $stmt = $conn->prepare("SELECT * FROM Products WHERE id = :i ;");
                            $stmt->bindParam(":i", $prodSelector["product_id"]);
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
                                            <div class="modal-review__rating-order-wrap ms-5" >
                                        <span data-rating-value="1"  data-value="<?php echo $prodList["id"]; ?>"></span>
                                        <span data-rating-value="2"  data-value="<?php echo $prodList["id"]; ?>"></span>
                                        <span data-rating-value="3"  data-value="<?php echo $prodList["id"]; ?>"></span>
                                        <span data-rating-value="4"  data-value="<?php echo $prodList["id"]; ?>"></span>
                                        <span data-rating-value="5"  data-value="<?php echo $prodList["id"]; ?>"></span>
                                    </div>
                                    <br><br>
                                    <p class="text-white">Votes:<?php
                                    $stmt = $conn->prepare("SELECT * FROM Rating WHERE id_product = :i");
                                    $stmt->bindParam(":i", $prodList["id"]);
                                    $stmt->execute();
                                    printf($stmt->rowCount()) ;
                                    ?></p>
                                    <br><br>
                                    <p class="text-white" id="ratings"><?php
                                        $stmt = $conn->prepare("SELECT AVG(stars) FROM Rating WHERE id_product = :i");
                                        $stmt->bindParam(":i", $prodList["id"]);
                                        $stmt->execute();
                                        $round = $stmt->fetch();
                                        echo "Product Rating: " . round($round[0]);
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
                    <?php }
                        }
                    } ?>
                </div>
            </div>
        </div>
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
<?php require "footer.php"; ?>