<?php require "header.php";?>
    <div class="container">
        <div class="row justify-content-center m-5">
            <div class="col-xl-6 col-sm-8 col-md-8 col-lg-6">
                <div class="card shadow">
                    <div class="card-title text-center border-bottom">
                        <h2 class="p-3">Add New User</h2>
                    </div>
                    <div class="card-body">
                        <form action="../back_end/add_user_back.php" method="post">
                            <div class="mb-4">
                                <label for="email" class="form-label">Email Adress</label>
                                <input type="email" class="form-control" id="email" name="email" required>
                            </div>
                            <div class="mb-4">
                                <label for="password" class="form-label">Password</label>
                                <input type="password" class="form-control" id="password" name="password" required>
                            </div>
                            <div class="mb-4">
                                <label for="psw_repeat" class="form-label">Reapeat Password</label>
                                <input type="password" class="form-control" id="confirm_password" name="confirm_password" required>
                            </div>
                            <div class="d-grid">
                                <button type="submit" class="btn btn-success" name="submit" id="submit">Add User</button>
                            </div>
                            <?php 
                                $fullUrl = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

                                if(strpos($fullUrl, "psw=error") == true){
                                    echo ' <div class="alert alert-danger mt-4" role="alert">
                                    The two passwords do not match!
                                  </div>';
                                }
                                else if(strpos($fullUrl, "email=error") == true){
                                    echo ' <div class="alert alert-danger mt-4" role="alert">
                                    This email is already taken!
                                  </div>';
                                }
                            ?>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php require "footer.php";?>