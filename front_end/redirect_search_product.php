<?php require "header.php"; ?>
<div class="container my-5">
    <div class="row">
        <form action="../back_end/search_product.php" method="post" class="d-md-flex d-sm-block justify-content-between">
            <input type="hidden" name="command" value="select-orders">
            <div class="btn-group align-self-center col-12 col-sm-12 col-md-8 col-lg-6">
                <input type="search" name="searchBy" class="col-8 col-sm-8 col-lg-8 col-md-8 col-xl-8">
                <input type="submit" name="submit_search" value="Search" class="btn btn-outline-dark col-2 col-sm-2 col-lg-2 col-md-2 col-xl-2">
            </div>
            <div class="col-2 col-xl-2 col-sm-2 col-md-2 col-lg-2 ">
                <a class="btn btn-success" href="add_user.php">Add User <i class="fas fa-plus mx-2"></i></a>
            </div>
        </form>
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
                                <th>Delete Product</th>
                            </tr>
                            <tr>
                                <td><?php echo $_SESSION["search_id_p"]; ?></td>
                                <td><?php echo $_SESSION["search_name"]; ?></td>
                                <td><?php echo $_SESSION["search_stock"]; ?></td>
                                <td><?php echo $_SESSION["search_price"]; ?></td>
                                <td>
                                    <form action='../back_end/delete_product_redirect.php'>
                                        <button type='submit' class='btn btn-danger'>Delete</button>
                                    </form>
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <?php require "footer.php" ?>