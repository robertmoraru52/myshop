<?php require "header.php"; 
    if($_SESSION['loggedin'] && $user["admin_f"] == 'true'){
        ?>
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
    


    $stmt = $conn->prepare("SELECT * FROM Users WHERE email = :e");
    $stmt->bindParam(":e", $_SESSION["search_user"]);
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
                            <th>Email</th>
                            <th>Admin</th>
                            <th>Delete User</th>
                        </tr>
                        <?php
                        foreach ($rowList as $key => $value) {
                            echo "<tr>";
                            echo "<td>" . $value["id"] . "</td>";
                            echo "<td>" . $value["created_at"] . "</td>";
                            echo "<td>" . $value["email"] . "</td>";
                            echo "<td>" . $value["admin_f"] . "</td>";

                        ?>
                        <td>
                            <div class="dropdown">
                                <button class="btn btn-success dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">Select Action</button>
                                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                    <li class="text-white"><a class="dropdown-item" href="admin_users.php?action=delete&id=<?php echo $value["id"]; ?>">DELETE <i class="fa fa-times"></i></a></li>
                                    <li class="text-white"><a class="dropdown-item" href="change_user.php?action=edit&id=<?php echo $value["id"]; ?>">EDIT <i class="fas fa-edit"></i></a></li>
                                </ul>
                            </div>
                        </td>
                        <?php } ?>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<?php 
}
else{
    echo "error";
}
require "footer.php" ?>