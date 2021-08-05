<?php require "header.php";?>
<form action="../back_end/add_products_back.php" method="post">
    <div class="container">
        <div class="row justify-content-center m-5">
            <div class="col-xl-6 col-sm-8 col-md-8 col-lg-6">
                <div class="card shadow">
                    <div class="card-title text-center border-bottom">
                        <h2 class="p-3">Add New Product</h2>
                    </div>
                    <div class="card-body">
                        <form action="./myshop/back_end/add_products_back.php" method="post">
                            <div class="mb-4">
                                <label for="name" class="form-label">Name</label>
                                <input type="text" class="form-control" id="name" name="name" required>
                            </div>
                            <div class="mb-4">
                                <label for="stock" class="form-label">Stock</label>
                                <input type="text" class="form-control" id="stock" name="stock" required>
                            </div>
                            <div class="mb-4">
                                <label for="price" class="form-label">Price</label>
                                <input type="text" class="form-control" id="price" name="price" required>
                            </div>
                            <div class="d-grid">
                                <button type="submit" class="btn btn-success" name="submit" id="submit">Add Product</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>
<?php require "footer.php";?>