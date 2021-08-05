<?php
session_start();
require "header.php"
?>
<div class="container rounded bg-white mt-5 mb-5">
    <div class="row">
        <div class="col-md-5 border-right">
            <div class="p-3 py-5">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h4 class="text-right">Profile Settings</h4>
                </div>
                <form action="../back_end/change_user_back.php" method="POST">
                     <div class="row mt-2">
                        <div class="col-md-6">
                            <label class="labels">Enter Email</label>
                            <input type="text" class="form-control" placeholder="email" id="email" name="email">
                        </div>
                    </div>   
                    <div class="row mt-2">
                        <div class="col-md-6">
                            <label class="labels">First Name: <?php echo $_SESSION["fname"]; ?></label>
                            <input type="text" class="form-control" placeholder="change first name" id="f_name" name="f_name">
                        </div>
                        <div class="col-md-6">
                            <label class="labels">Last Name: <?php echo $_SESSION["lname"]; ?></label>
                            <input type="text" class="form-control" name="l_name" id="l_name" placeholder="change last name">
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-md-12">
                            <label class="labels">Mobile Number: <?php echo $_SESSION["mobile"]; ?></label>
                            <input type="text" class="form-control" placeholder="change phone number" id="mobile" name="mobile">
                        </div>
                        <div class="col-md-12">
                            <label class="labels">Address: <?php echo $_SESSION["address"]; ?></label>
                            <input type="text" class="form-control" placeholder="change address" id="address" name="address">
                        </div>
                        <div class="col-md-12">
                            <label class="labels">Postcode: <?php echo $_SESSION["post_code"]; ?></label>
                            <input type="text" class="form-control" placeholder="change post code" id="post_code" name="post_code">
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-md-6">
                            <label class="labels">Country: <?php echo $_SESSION["country"]; ?></label>
                            <input type="text" class="form-control" placeholder="change country" id="country" name="country">
                        </div>
                        <div class="col-md-6">
                            <label class="labels">State/Region: <?php echo $_SESSION["region"]; ?></label>
                            <input type="text" class="form-control" name="region" id="region" placeholder="change region">
                        </div>
                    </div>
                    <div class="mt-5 text-center">
                        <button class="btn btn-primary profile-button" type="submit" id="submit" name="submit">Save Profile</button>
                    </div>
                </form>
            </div>
        </div>
        </div>
    </div>
</div>
<?php require "footer.php" ?>