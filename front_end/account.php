<?php
session_start();
require "header.php";
require "../back_end/connect_db.php";
$stmt = $conn->prepare("SELECT * FROM Users WHERE email = :em");
$stmt->bindParam("em", $_SESSION["email"]);
$stmt->execute();
$row = $stmt->fetch(\PDO::FETCH_ASSOC);
?>
<div class="container rounded bg-white mt-5 mb-5">
    <div class="row">
        <div class="col-md-3 border-right">
            <div class="d-flex flex-column align-items-center text-center p-3 py-5">
                <img class="rounded-circle mt-5" width="150px" src="https://st3.depositphotos.com/15648834/17930/v/600/depositphotos_179308454-stock-illustration-unknown-person-silhouette-glasses-profile.jpg">
                <span class="text-black-50"><?php echo $_SESSION["email"]; ?></span>
            </div>
        </div>
        <div class="col-md-5 border-right">
            <div class="p-3 py-5">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h4 class="text-right">Profile Settings</h4>
                </div>
                <form action="../back_end/account_back.php" method="POST">
                    <div class="row mt-2">
                        <div class="col-md-6">
                            <label class="labels">First Name</label>
                            <input type="text" class="form-control" placeholder="<?php echo $row["first_name"] ?>" id="f_name" name="f_name">
                        </div>
                        <div class="col-md-6">
                            <label class="labels">Last Name</label>
                            <input type="text" class="form-control" name="l_name" id="l_name" placeholder="<?php echo $row["last_name"] ?>">
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-md-12">
                            <label class="labels">Mobile Number</label>
                            <input type="text" class="form-control" placeholder="<?php echo $row["mobile"] ?>" id="mobile" name="mobile">
                        </div>
                        <div class="col-md-12">
                            <label class="labels">Address</label>
                            <input type="text" class="form-control" placeholder="<?php echo $row["adress"] ?>" id="address" name="address">
                        </div>
                        <div class="col-md-12">
                            <label class="labels">Postcode</label>
                            <input type="text" class="form-control" placeholder="<?php echo $row["post_code"] ?>" id="post_code" name="post_code">
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-md-6">
                            <label class="labels">Country</label>
                            <input type="text" class="form-control" placeholder="<?php echo $row["country"] ?>" id="country" name="country">
                        </div>
                        <div class="col-md-6">
                            <label class="labels">State/Region</label>
                            <input type="text" class="form-control" name="region" id="region" placeholder="<?php echo $row["region"] ?>">
                        </div>
                    </div>
                    <div class="mt-5 text-center">
                        <button class="btn btn-primary profile-button" type="submit" id="submit" name="submit">Save Profile</button>
                    </div>
                </form>
            </div>
        </div>
        <div class="col-md-4">
            <div class="p-3 py-5">
                <div class="d-flex justify-content-between align-items-center experience"><span>Change Password</span></div><br>
                <form action="../back_end/password_change.php" method="POST">
                    <div class="col-md-12"><label class="labels">Old Password</label><input type="password" class="form-control" placeholder="Old Password" name="old_pass"></div> <br>
                    <div class="col-md-12"><label class="labels">New Password</label><input type="password" class="form-control" placeholder="New Password" name="new_pass"></div>
                    <div class="col-md-12"><label class="labels">Confirm New Password</label><input type="password" class="form-control" placeholder="Confirm New Password" name="confirm_new"></div>
                    <div class="col-md-12 mt-4"><button type="submit" class="btn btn-primary">Save New Password</button></div>
                </form>
                <?php
                $fullUrl = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

                if (strpos($fullUrl, "error=userorpsw") == true) {
                    echo ' <div class="alert alert-danger mt-4" role="alert">
                                    The password is invalid!
                                  </div>';
                } else if (strpos($fullUrl, "error=error") == true) {
                    echo ' <div class="alert alert-danger mt-4" role="alert">
                                    There was an error! Please try again!
                                  </div>';
                }
                else if (strpos($fullUrl, "success=success") == true) {
                    echo ' <div class="alert alert-success mt-4" role="alert">
                                    You changed the password successfuly !
                                  </div>';
                }
                ?>
            </div>
        </div>
    </div>
</div>
<?php require "footer.php" ?>