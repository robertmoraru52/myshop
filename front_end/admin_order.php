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
        </form>
    </div class="row">
    <?php
    require "../back_end/connect_db.php";

    if(isset($_GET["action"]) && $_GET["action"] == "delete"){
            $stmt = $conn->prepare("DELETE FROM Orders WHERE user_email = :e");
            $stmt->bindParam(":e", $_GET["email"]);
            $stmt->execute();
            echo ' <div class="alert alert-danger text-center mt-4" role="alert">
                            Order removed !
                    </div>';
        }
    $stmt = $conn->prepare("SELECT * FROM Orders");
    $stmt->execute();
    $rowList = $stmt->fetchAll(\PDO::FETCH_ASSOC); ?>
    <div class='container mt-5'>
        <div class='row-fluid'>
            <div class='col-xs-6'>
                <div class='table-responsive'>
                    <table class='table table-hover table-inverse table-dark'>
                        <tr>
                            <th>Product List(And Quantity)</th>
                            <th>Ordered At At</th>
                            <th>User Email</th>
                            <th>Delete Order</th>
                        </tr>
                        <?php
                        foreach ($rowList as $key => $value) {
                            $stmt = $conn->prepare("SELECT * FROM Products WHERE id = :s");
                            $stmt->bindParam(":s",$value['product_id']);
                            $stmt->execute();
                            $prodname = $stmt->fetch();
                            echo "<tr>";
                            echo "<td>" . $prodname["name"] ."(". $value["product_q"].")"."</td>";
                            echo "<td>" . $value["orderd_at"] . "</td>";
                            echo "<td>" . $value["user_email"] . "</td>";
                        ?>
                        <td>
                            <div class="dropdown">
                                <button class="btn btn-success dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">Select Action</button>
                                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                    <li class="text-white"><a class="dropdown-item" href="admin_order.php?action=delete&<?php echo "email=". $value["user_email"]; ?>">DELETE <i class="fa fa-times"></i></a></li>
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