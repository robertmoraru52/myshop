<?php require "header.php"; ?>

<form method="post" action="../back_end/login_back.php">
    <div class="container">
        <div class="row justify-content-center m-5">
            <div class="col-xl-6 col-sm-8 col-md-8 col-lg-6">
                <div class="card shadow">
                    <div class="card-title text-center border-bottom">
                        <h2 class="p-3">Login</h2>
                    </div>
                    <div class="card-body">
                        <div class="mb-4">
                            <label for="email" class="form-label">Email Adress</label>
                            <input type="text" class="form-control" id="email" name="email">
                        </div>
                        <div class="mb-4">
                            <label for="psw" class="form-label">Password</label>
                            <input type="password" class="form-control" id="psw" name="psw">
                        </div>
                        <div class="mb-4">
                            <input type="checkbox" class="form-check-input" id="remeber" name="remember">
                            <label for="remeber" class="form-label">Remember Me</label>
                        </div>
                        <div class="d-grid">
                            <button type="submit" class="btn btn-success" name="submit" id="submit">Login</button>
                        </div>
                        <?php
                        $fullUrl = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

                        if (strpos($fullUrl, "error=userorpsw") == true) {
                            echo ' <div class="alert alert-danger mt-4" role="alert">
                                    The email or password is invalid!
                                  </div>';
                        } else if (strpos($fullUrl, "email=error") == true) {
                            echo ' <div class="alert alert-danger mt-4" role="alert">
                                    This email is already taken!
                                  </div>';
                        } else if (strpos($fullUrl, "error=error") == true) {
                            echo ' <div class="alert alert-danger mt-4" role="alert">
                                    There was an error! Please try again!
                                  </div>';
                        }
                        ?>
                        <div class="text-center text-muted justify-content-center">
                            <p class="mt-4 text-center text-muted">You can also login with:</p>
                            <a href="" class="me-4 text-reset"><i class="fab fa-facebook-f"></i></a>
                            <a href="" class="me-4 text-reset"><i class="fab fa-twitter"></i></a>
                            <a href="" class="me-4 text-reset"><i class="fab fa-google"></i></a>
                            <a href="" class="me-4 text-reset"><i class="fab fa-instagram"></i></a>
                            <a href="" class="me-4 text-reset"><i class="fab fa-linkedin"></i></a>
                            <a href="" class="me-4 text-reset"><i class="fab fa-github"></i></a>
                        </div>
                        <div class="card-footer mt-5 text-center">
                            <a class="link-success text-decoration-none" href="#">Forgot the password?</a><br>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>

<?php require "footer.php"; ?>