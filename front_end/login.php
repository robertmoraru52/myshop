<?php require "header.php"; ?>
<div class="container">
            <h1>Login</h1>
            <label for="email"><b>Email</b></label>
            <input type="text" placeholder="Enter Email" id="email" name="email" required>
            <label for="psw"><b>Password</b></label>
            <input type="password" placeholder="Enter Password" class="psw" name="psw" required>
            <label>
            <input type="checkbox" checked="checked" name="remember"> Remember me
            </label>
            <div class="clearfix">
                <button type="button" class="cancelbtn">Cancel</button>
                <button type="submit" class="signupbtn">Login</button>
            </div>
    </div>
<?php require "footer.php"; ?>