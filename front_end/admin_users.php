<?php require "header.php"; ?>
<div class="container my-5">
    <div class="row">
        <form action="../back_end/search_user.php" method="post" class="d-md-flex d-sm-block justify-content-between">
            <input type="hidden" name="command" value="select-orders">
            <div class="btn-group align-self-center col-12 col-sm-12 col-md-8 col-lg-6">
                <input type="search" name="searchBy" class="col-8 col-sm-8 col-lg-8 col-md-8 col-xl-8">
                <input type="submit" name="submit_search" value="Search" class="btn btn-outline-dark col-2 col-sm-2 col-lg-2 col-md-2 col-xl-2">
            </div>
            <div class="col-2 col-xl-2 col-sm-2 col-md-2 col-lg-2 ">
                <a class="btn btn-success" href="add_user.php">Add User <i class="fas fa-plus mx-2"></i></a>
            </div>
        </form>
    </div class="row">
    <?php
    require "../back_end/connect_db.php";


    if(isset($_GET["action"]) && $_GET["action"] == "delete"){
            $stmt = $conn->prepare("DELETE FROM Users WHERE id = :g");
            $stmt->bindParam(":g", $_GET["id"]);
            $stmt->execute();
            echo ' <div class="alert alert-danger text-center mt-4" role="alert">
                            User removed !
                    </div>';
        }
    


    $stmt = $conn->prepare("SELECT * FROM Users");
    $stmt->execute();
    $rowList = $stmt->fetchAll(\PDO::FETCH_ASSOC); ?>
    <div class='container mt-5'>
        <div class='row-fluid'>
            <div class='col-xs-6'>
                <div class='table-responsive'>
                    <table class='table table-hover table-inverse table-dark'>
                        <tr>
                            <th>User ID</th>
                            <th>Created At</th>
                            <th>E-Mail</th>
                            <th>Delete User</th>
                        </tr>
                        <?php
                        foreach ($rowList as $key => $value) {
                            echo "<tr>";
                            echo "<td>" . $value["id"] . "</td>";
                            echo "<td>" . $value["created_at"] . "</td>";
                            echo "<td>" . $value["email"] . "</td>";

                        ?>
                        <td>
                             <span class="text-white"><a class="text-reset text-decoration-none btn btn-danger" href="admin_users.php?action=delete&id=<?php echo $value["id"]; ?>">DELETE  <i class="fa fa-times"></i></a></span>
                        </td>
                        <?php } ?>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<?php require "footer.php" ?>