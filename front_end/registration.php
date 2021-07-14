<?php require "header.php";?>
<form action="action_page.php">
    <div class="container">
            <h1>Register</h1>
            <p>Please fill in this form to create an account.</p>
            <label for="email"><b>Email</b></label>
            <input type="text" placeholder="Enter Email" id="email" name="email" required>
            <label for="psw"><b>Password</b></label>
            <input type="password" placeholder="Enter Password" class="psw" name="psw" required>
            <label for="psw-repeat"><b>Repeat Password</b></label>
            <input type="password" placeholder="Repeat Password" class="psw" name="psw-repeat" required>
            <label>
            <input type="checkbox" checked="checked" name="remember"> Remember me
            </label>
            <div class="clearfix">
                <button type="button" class="cancelbtn">Cancel</button>
                <button type="submit" class="signupbtn">Register</button>
            </div>
    </div>
</form>
<?php require "footer.php";?>