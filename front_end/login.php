<?php require "header.php"; ?>
<form action="action_page.php">
    <div class="container">
            <h1>Login</h1>
            <label for="email"><b>Email</b></label>
            <input type="text" placeholder="Enter Email" id="email" name="email" required>
            <label for="psw"><b>Password</b></label>
            <input type="password" placeholder="Enter Password" class="psw" name="psw" required>
            <label>
            <input type="checkbox" checked="checked" name="remember" style="margin-bottom:15px"> Remember me
            </label>
            <div class="clearfix">
                <button type="button" class="cancelbtn">Cancel</button>
                <button type="submit" class="signupbtn">Login</button>
            </div>
    </div>
</form>
<?php require "footer.php"; ?>