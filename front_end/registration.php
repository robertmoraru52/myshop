<?php require "header.php";?>
<form action="../back_end/registration_back.php" method="post">
    <div class="container">
        <div class="row justify-content-center m-5">
            <div class="col-xl-6 col-sm-8 col-md-8 col-lg-6">
                <div class="card shadow">
                    <div class="card-title text-center border-bottom">
                        <h2 class="p-3">Register</h2>
                    </div>
                    <div class="card-body">
                        <form action="./myshop/back_end/registration_back.php" method="post">
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
                            <div class="mb-4">
                                <input type="checkbox" class="form-check-input" id="remeber" name="remember">
                                <label for="remeber" class="form-label">Remember Me</label>
                            </div>
                            <div class="d-grid">
                                <button type="submit" class="btn btn-success" name="submit" id="submit">Register</button>
                            </div>
                            <div class="text-center text-muted justify-content-center">
                                <p class="mt-4 text-center text-muted">You can also login with:</p>
                                <a href="" class="me-4 text-reset"><i class="fab fa-facebook-f"></i></a>
                                <a href="" class="me-4 text-reset"><i class="fab fa-twitter"></i></a>
                                <a href="" class="me-4 text-reset"><i class="fab fa-google"></i></a>
                                <a href="" class="me-4 text-reset"><i class="fab fa-instagram"></i></a>
                                <a href="" class="me-4 text-reset"><i class="fab fa-linkedin"></i></a>
                                <a href="" class="me-4 text-reset"><i class="fab fa-github"></i></a>
                            </div>
                        </form>
                        <div class="card-footer mt-5 text-center">
                            <a class="link-success text-decoration-none" href="#">Already have an account?</a><br>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>

<?php require "footer.php";?>