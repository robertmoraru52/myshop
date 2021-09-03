<?php require "header.php"; ?>
<form action="../back_end/delete_user_back.php" method="post">
    <div class="container">
        <div class="row justify-content-center m-5">
            <div class="col-xl-6 col-sm-8 col-md-8 col-lg-6">
                <div class="card shadow">
                    <div class="card-title text-center border-bottom">
                        <h2 class="p-3">Delete User</h2>
                        <span style="color: red;">
                            <h6 class="p-3">Warning!This Action Can Not Be Undone!</h6>
                        </span>
                    </div>
                    <div class="card-body">
                        <div class="mb-4">
                            <label for="email" class="form-label">Email Adress</label>
                            <input type="email" class="form-control" id="email" name="email" required>
                        </div>
                        <div class="d-grid">
                            <button type="submit" class="btn btn-danger" name="submit" id="submit">Delete User</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>
<?php require "footer.php"; ?>