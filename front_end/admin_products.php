<?php require "header.php"; ?>
<div class="container my-5">
    <div class="row">
        <form action="../back_end/search_product.php" method="post" class="d-md-flex d-sm-block justify-content-between" id="table">
            <input type="hidden" name="command" value="select-orders">
            <div class="btn-group align-self-center col-12 col-sm-12 col-md-8 col-lg-6">
                <input type="search" name="searchBy" class="col-8 col-sm-8 col-lg-8 col-md-8 col-xl-8">
                <input type="submit" name="submit_search" value="Search" class="btn btn-outline-dark col-2 col-sm-2 col-lg-2 col-md-2 col-xl-2">
            </div>
            <div class="col-2 col-xl-2 col-sm-2 col-md-2 col-lg-2 ">
                <a class="btn btn-success" href="add_products.php">Add Product <i class="fas fa-plus mx-2"></i></a>
            </div>
        </form>
    </div class="row">
    <?php
    require "../back_end/connect_db.php";

    $stmt = $conn->prepare("SELECT * FROM Products");
    $stmt->execute();
    $rowList = $stmt->fetchAll(\PDO::FETCH_ASSOC);?>
    <div class='container mt-5'>
        <div class='row-fluid'>
            <div class='col-xs-6'>
                <div class='table-responsive'>
                    <table class='table table-hover table-inverse table-dark'>
                        <tr>
                            <th>Product ID</th>
                            <th>Name</th>
                            <th>Stock</th>
                            <th>Price</th>
                            <th>Category</th>
                            <th>Delete Product</th>
                        </tr>
                        <?php
                        foreach ($rowList as $key => $value) {
                            echo "<tr>";
                            echo "<td>" . $value["id"] . "</td>";
                            echo "<td>" . $value["name"] . "</td>";
                            echo "<td>" . $value["stock"] . "</td>";
                            echo "<td>" . $value["price"] . "</td>"; 
                        ?>
                            <td>
                                <div class='form-group'>
                                    <select multiple class='form-control-sm text-white bg-dark' id="select-cat" onchange="getComboA(this)">
                                        <?php
                                            $stmt = $conn->prepare("SELECT * FROM Categories");
                                            $stmt->execute();
                                            $cat = $stmt->fetchAll(\PDO::FETCH_ASSOC);
                                            foreach($cat as $key => $category){
                                                echo "<option >" . $category["name"] . "</option>";
                                            }
                                            echo "<option >" . $value["id"] . "</option>";
                                            $stmt = $conn->prepare("UPDATE Products_Categories SET category_id = :cat_name WHERE product_id = :prod_id");
                                            $stmt->bindParam(":cat_name", $_SESSION["category_id"]);
                                            $stmt->bindParam(":prod_id", $value["id"]);
                                            $stmt->execute();
                                        ?>
                                    </select>
                                </div>
                            </td>
                        <?php 
                        $_SESSION["delete_prod"] = $value["id"];
                            echo "<td>
                            <form action='../back_end/delete_prod.php'>
                            <button type='submit' class='btn btn-danger'>Delete</button>
                            </form></td>";
                            echo "</tr>";
                        } ?>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<div id="salam"></div>
<?php require "footer.php" ?>