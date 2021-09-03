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
                    <h4 class="text-right">Category Info</h4>
                </div>
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <p class="text-right"><?php
                                            $_SESSION["change_category_id"] = $_GET["id"];
                                            $stmt = $conn->prepare("SELECT * FROM Categories WHERE id = :i");
                                            $stmt->bindParam(":i", $_GET["id"]);
                                            $stmt->execute();
                                            $cat = $stmt->fetch(\PDO::FETCH_ASSOC);
                                            echo $cat["name"] . "</br>" . "Created At: ";
                                            ?></p>
                </div>
                <form action="../back_end/change_category_back.php" method="POST">
                    <div class="row mt-2">
                        <div class="col-md-6">
                            <label class="labels">Category Name: </label>
                            <input type="text" class="form-control" placeholder="change category name" name="name">
                        </div>
                    </div>
                    <div class="row mt-5">
                        <div class="col-md-6">
                            <button class="btn btn-primary profile-button" type="submit" id="submit" name="submit">Save Changes</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
</div>
<?php require "footer.php" ?>