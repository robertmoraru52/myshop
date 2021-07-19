<?php require "header.php"; ?>
<form method="post" action="#">
    <div class="container m-5" id="center">
        <h3 class="mb-3 fw-normal">Please Login</h3>
        <div class="row">
            <div class="col-6 col-sm-6 col-md-6 col-lg-6 form-floating">
                <input type="email" class="form-control" id="floatingInput" placeholder="name@example.com">
                <label for="floatingInput">Email Address</label>
            </div>
        </div>
        <div class="row">
            <div class="col-6 col-sm-6 col-md-6 col-lg-6 form-floating mb-4 mt-4">
                <input type="password" class="form-control" id="floatingPassword" placeholder="Password">
                <label for="floatingPassword">Password</label>
                <button class="mb-4 mt-4 w-100 btn btn-lg btn-primary" name="btn-login" type="submit">Login</button>
            </div>
        </div>
        <div class="row">
            <div class="checkbox mb-3 col-6 col-sm-6 col-md-6 col-lg-6">
                <label>
                    <input type="checkbox" value="remember-me"> Remember me
                </label>
            </div>
        </div>
    </div>
</form>

<?php require "footer.php"; ?>