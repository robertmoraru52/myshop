<?php require "header.php"; ?>
<form method="post" action="../back_end/recover_pass_back.php">
    <div class="container">
        <div class="row justify-content-center m-5">
            <div class="col-xl-6 col-sm-8 col-md-8 col-lg-6">
                <div class="card shadow">
                    <div class="card-title text-center border-bottom">
                        <h2 class="p-3">Please Enter Email</h2>
                    </div>
                    <div class="card-body">
                        <div class="mb-4">
                            <label for="email" class="form-label">Email Adress</label>
                            <input type="text" class="form-control" id="email" name="email">
                        </div>
                        <div class="d-grid">
                            <button type="submit" class="btn btn-success" name="submit" id="submit">Recover Password</button>
                        </div>
                        <?php
                        $fullUrl = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

                        if (strpos($fullUrl, "error=success") == true) {
                            echo ' <div class="alert alert-success mt-4" role="alert">
                                    You will recieve an email with the next steps!
                                  </div>';
                            }
                            elseif(strpos($fullUrl, "error=fail") == true){
                                echo ' <div class="alert alert-danger mt-4" role="alert">
                                    There was an error! Please try again!
                                  </div>';
                            }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>
<?php require "footer.php"; ?>