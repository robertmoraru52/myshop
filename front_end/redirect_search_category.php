<?php require "header.php"; ?>
<div class="container my-5">
    <div class="row">
        <form action="../back_end/search_category.php" method="post" class="d-md-flex d-sm-block justify-content-between">
            <div class="btn-group align-self-center col-12 col-sm-12 col-md-8 col-lg-6">
                <input type="search" name="searchBy" class="col-8 col-sm-8 col-lg-8 col-md-8 col-xl-8">
                <input type="submit" name="submit_search" value="Search" class="btn btn-outline-dark col-2 col-sm-2 col-lg-2 col-md-2 col-xl-2">
            </div>
            <div class="col-2 col-xl-2 col-sm-2 col-md-2 col-lg-2 ">
                <a class="btn btn-success" href="add_category.php">Add Category <i class="fas fa-plus mx-2"></i></a>
            </div>
            <div class="col-2 col-xl-2 col-sm-2 col-md-2 col-lg-2 ">
                <a class="btn btn-success" href="assign_category.php">Assign Product <i class="fas fa-plus mx-2"></i></a>
            </div>
        </form>
        <?php
        require "../back_end/connect_db.php";

        $stmt = $conn->prepare("SELECT * FROM Products_Categories WHERE category_id = :q");
        $stmt->bindParam(":q", $_SESSION["cat_id"]);
        $stmt->execute();
        $rowList = $stmt->fetchAll(\PDO::FETCH_ASSOC);
        ?>
        <div class='container mt-5'>
            <div class='row-fluid'>
                <div class='col-xs-6'>
                    <div class='table-responsive'>
                        <table class='table table-hover table-inverse table-dark'>
                            <tr>
                                <th>Category ID</th>
                                <th>Category Name</th>
                                <th>Products</th>
                                <th>Delete Category</th>
                            </tr>
                            <?php
                            foreach ($rowList as $key => $value) {
                                echo "<tr>";
                                echo "<td>" . $value["category_id"] . "</td>";
                                $stmt = $conn->prepare("SELECT * FROM Categories WHERE name = :p");
                                $stmt->bindParam(":p", $_SESSION["search_cat"]);
                                $stmt->execute();
                                $list_cat = $stmt->fetchAll(\PDO::FETCH_ASSOC);
                                foreach ($list_cat as $key => $valC) {
                                    echo "<td>" . $valC["name"] . "</td>";
                                }
                                $stmt = $conn->prepare("SELECT * FROM Products WHERE id = :i");
                                $stmt->bindParam(":i", $value["product_id"]);
                                $stmt->execute();
                                $list_prod = $stmt->fetchAll(\PDO::FETCH_ASSOC);
                                foreach ($list_prod as $key => $valP) {
                                    echo "<td>" . $valP["name"] . "</td>";
                                }
                                $_SESSION["delete_cat"] = $value["category_id"];
                                echo "<td>
                            <form action='../back_end/delete_assoc.php'>
                            <button type='submit' class='btn btn-danger'>Delete</button></td>
                            </form>";
                                echo "</tr>";
                            } ?>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php require "footer.php" ?>