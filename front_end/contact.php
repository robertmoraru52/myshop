<?php require "header.php" ?>
<div class="container contact my-5">
    <div class="row">
        <div class="col-md-9">
            <div class="contact-info">
                <img src="https://image.ibb.co/kUASdV/contact-image.png" alt="image" />
                <h2>Contact Us</h2>
                <h4>We would love to hear from you !</h4>
            </div>
        </div>
        <div class="col-md-6">
            <div class="contact-form">
                <div class="form-group">
                    <?php 
                    $fullUrl = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

                    if (strpos($fullUrl, "success") == true) {
                        echo ' <div class="alert alert-success mt-4 col-sm-10" role="alert">
                                Your feedback is apreciated!
                                You can continue browsing our website!
                              </div>';}
                    ?>
                    <form action="../back_end/contact_back.php" method="POST">
                        <label class="control-label col-sm-2" for="fname">First Name:</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="fname" placeholder="Enter First Name" name="fname">
                        </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-2" for="lname">Last Name:</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="lname" placeholder="Enter Last Name" name="lname">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-2" for="email">Email:</label>
                    <div class="col-sm-10">
                        <input type="email" class="form-control" id="email" placeholder="Enter email" name="email">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-2" for="comment">Comment:</label>
                    <div class="col-sm-10">
                        <textarea class="form-control" rows="5" name="comment" id="comment"></textarea>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                        <button type="submit" name="submit" class="btn btn-success mt-4">Submit</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php require "footer.php" ?>