<?php
require "header.php";
require "../back_end/connect_db.php";
?>
<!-- products start -->
<p id="livesearch"></p>
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
                <h1>Products</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="row">
                    <?php
                     if (isset($_GET['pageno'])) {
                        $pageno = $_GET['pageno'];
                    } else {
                        $pageno = 1;
                    }
                    $no_of_records_per_page = 6;
                    $offset = ($pageno-1) * $no_of_records_per_page;
                    $total_pages_sql = "SELECT COUNT(*) FROM Products";
                    $stmt = $conn->prepare($total_pages_sql);
                    $stmt->execute();
                    $result = $stmt->fetch();
                    $total_rows = $result[0];
                    $total_pages = ceil($total_rows / $no_of_records_per_page);

                    $sql = "SELECT * FROM Products LIMIT $offset, $no_of_records_per_page";
                    $stmt = $conn->prepare($sql);
                    $stmt->execute();
                    $prod = $stmt->fetchAll();
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
                                        <h6><?php echo $prodList["price"]; ?> Lei</h6>
                                    </span>
                                    <?php
                                    echo "<a href='details.php?product_id=" . $prodList["id"] . "'" . "class='btn btn-success'>See More Details</a>";
                                    ?>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                    <div class="row">
                        <div class="col-md-12">
                            <nav aria-label="Page navigation example">
                                <ul class="pagination justify-content-center  mt-3 ">
                                    <li class="page-item"><a class="page-link bg-dark text-white" href="?pageno=1">First</a></li>
                                    <li class="<?php if($pageno <= 1){ echo 'disabled'; } ?>"><a class="page-link bg-dark text-white" href="<?php if($pageno <= 1){ echo '#'; } else { echo "?pageno=".($pageno - 1); } ?>">Previous</a></li>
                                    <li class="page-item"><a class="page-link bg-dark text-white" href="#"><?php echo $pageno; ?></a></li>
                                    <li class="<?php if($pageno >= $total_pages){ echo 'disabled'; } ?>"><a class="page-link bg-dark text-white" href="<?php if($pageno >= $total_pages){ echo '#'; } else { echo "?pageno=".($pageno + 1); } ?>">Next</a></li>
                                    <li class="page-item"><a class="page-link bg-dark text-white" href="?pageno=<?php echo $total_pages; ?>">Last</a></li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
   
            
       
</div>
<!-- products end -->
<?php require "footer.php"; ?>