<?php
session_start();
require "header.php"
?>
<div class="container rounded bg-white mt-5 mb-5">
    <div class="row">
        <div class="col-md-5 border-right">
            <div class="p-3 py-5">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h4 class="text-right">Product Info</h4>
                </div>
                <form action="../back_end/change_product_back.php" method="POST">
                     <div class="row mt-2">
                        <div class="col-md-6">
                            <label class="labels">Enter Product Id</label>
                            <input type="text" class="form-control" placeholder="Product Id" id="id" name="id">
                        </div>
                    </div>   
                    <div class="row mt-2">
                        <div class="col-md-6">
                            <label class="labels">Name: <?php echo $_SESSION["name"]; ?></label>
                            <input type="text" class="form-control" placeholder="change name" id="name" name="name">
                        </div>
                        <div class="col-md-6">
                            <label class="labels">Stock: <?php echo $_SESSION["stock"]; ?></label>
                            <input type="text" class="form-control" name="stock" id="stock" placeholder="change stock">
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-md-12">
                            <label class="labels">Price: <?php echo $_SESSION["price"]; ?></label>
                            <input type="text" class="form-control" placeholder="change price" id="price" name="price">
                        </div>
                    </div>
                    <div class="mt-5 text-center">
                        <button class="btn btn-primary profile-button" type="submit" id="submit" name="submit">Save Changes</button>
                    </div>
                </form>
            </div>
        </div>
        </div>
    </div>
</div>
<?php require "footer.php" ?>