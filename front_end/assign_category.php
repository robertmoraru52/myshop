<?php require "header.php";?>
<form action="../back_end/category_assign_back.php" method="post">
    <div class="container">
        <div class="row justify-content-center m-5">
            <div class="col-xl-6 col-sm-8 col-md-8 col-lg-6">
                <div class="card shadow">
                    <div class="card-title text-center border-bottom">
                        <h2 class="p-3">Assign Product To Category</h2>
                    </div>
                    <div class="card-body">
                            <div class="mb-4">
                                <label for="category" class="form-label">Category(id)</label>
                                <input type="text" class="form-control" id="category" name="category" required>
                            </div>
                            <div class="mb-4">
                                <label for="category" class="form-label">Product(id)</label>
                                <input type="text" class="form-control" id="product" name="product" required>
                            </div>
                            <div class="d-grid">
                                <button type="submit" class="btn btn-success" name="submit" id="submit">Assign</button>
                            </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>
<?php require "footer.php";?>