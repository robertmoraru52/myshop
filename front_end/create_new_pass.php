<?php require "header.php" ?>
<?php
$selector = $_GET["selector"];
$validator = $_GET["validator"];

if(ctype_xdigit($selector) !== false && ctype_xdigit($validator)){
    ?>
<form method="post" action="../back_end/create_new_pass_back.php">
    <div class="container">
        <div class="row justify-content-center m-5">
            <div class="col-xl-6 col-sm-8 col-md-8 col-lg-6">
                <div class="card shadow">
                    <div class="card-title text-center border-bottom">
                        <h2 class="p-3">Enter A New Password</h2>
                    </div>
                    <div class="card-body">
                        <input type="hidden" name="selector" value="<?php echo $selector; ?>">
                        <input type="hidden" name="validator" value="<?php echo $validator; ?>">
                        <div class="mb-4">
                            <label for="psw" class="form-label">New Password</label>
                            <input type="password" class="form-control" id="psw" name="psw">
                        </div>
                        <div class="mb-4">
                            <label for="psw-repeat" class="form-label">Confirm New Password</label>
                            <input type="password" class="form-control" id="psw-repeat" name="psw-repeat">
                        </div>
                        <div class="d-grid">
                            <button type="submit" class="btn btn-success" name="submit" id="submit">Reset Password</button>
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>
<?php
}
else{
    echo ' <div class="alert alert-danger mt-4" role="alert">
            There was an error! Please try again!
           </div>';
}
?>
<?php require "footer.php" ?>