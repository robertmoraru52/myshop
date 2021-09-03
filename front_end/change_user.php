<?php
session_start();
require "header.php";
require "../back_end/connect_db.php";
?>
<div class="container rounded bg-white mt-5 mb-5">
    <div class="row">
        <div class="col-md-5 border-right">
            <div class="p-3 py-5">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h4 class="text-right">User Info</h4>
                </div>
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <p class="text-right"><?php 
                        $_SESSION["change_user_id"] = $_GET["id"];
                        $stmt = $conn->prepare("SELECT * FROM Users WHERE id = :i");
                        $stmt->bindParam(":i", $_GET["id"]);
                        $stmt->execute();
                        $user = $stmt->fetch(\PDO::FETCH_ASSOC);
                        echo $user["email"] . "</br>" . "Created At: " . $user["created_at"];
                    ?></p>
                </div>
                <form action="../back_end/change_user_back.php" method="POST"> 
                    <div class="row mt-2">
                        <div class="col-md-6">
                            <label class="labels">Email: </label>
                            <input type="text" class="form-control" placeholder="change email" name="email">
                        </div>
                    </div>
                    <div class="row mt-5">
                        <div class="col-md-6">
                            <button class="btn btn-primary profile-button" type="submit" id="submit" name="submit">Save Changes</button>
                        </div>
                        <div class="col-md-6">
                            <button class="btn btn-success profile-button" type="submit" name="admin">Give Admin Function</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
</div>
<?php require "footer.php" ?>