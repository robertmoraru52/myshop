<?php require "header.php"; ?>
<div class="container my-5">
    <div class="row">
        <form action="../back_end/search_category.php" method="post" class="d-md-flex d-sm-block justify-content-between">
            <input type="hidden" name="command" value="select-orders">
            <div class="btn-group align-self-center col-12 col-sm-12 col-md-8 col-lg-6">
                <input type="search" name="searchBy" class="col-8 col-sm-8 col-lg-8 col-md-8 col-xl-8">
                <input type="submit" name="submit_search" value="Search" class="btn btn-outline-dark col-2 col-sm-2 col-lg-2 col-md-2 col-xl-2">
            </div>
            <div class="col-2 col-xl-2 col-sm-2 col-md-2 col-lg-2 ">
                <a class="btn btn-success" href="add_category.php">Add Category <i class="fas fa-plus mx-2"></i></a>
            </div>
            <div class="col-2 col-xl-2 col-sm-2 col-md-2 col-lg-2 ">
                <a class="btn btn-success" href="assign_category.php">Assign Product <i class="fas fa-plus mx-2"></i></a>
            </div>
        </form>
        
    </div class="row">
    <div class="d-md-flex d-none justify-content-md-between justify-content-sm-center align-content-center border-bottom border-2 my-2 bg-dark text-light p-3 rounded-3">
        <div class="col-2 text-sm-center text-md-start align-self-center">
            <h1 class="h5 fw-bold">ID</h1>
        </div>
        <div class="col-2 align-self-center">
            <h1 class="h5 fw-bold">Category Name</h1>
        </div>
        <div class="col-2 align-self-center">
            <h1 class="h5 fw-bold">Products</h1>
        </div>
        <div class="col-2 align-self-center">
            <h1 class="h5 fw-bold">Change Users</h1>
        </div>
        <div class="col-2 align-self-center">
            <h1 class="h5 fw-bold">Delete Users</h1>
        </div>
    </div>
    <div class="d-md-flex d-sm-block justify-content-md-around justify-content-sm-center text-center border-bottom border-2 my-2 bg-light p-2 rounded-3">
        <?php 
        
        require "../back_end/connect_db.php";

        $stmt = $conn->prepare("SELECT * FROM Categories ORDER BY id DESC");
        $stmt->execute();
        $rowList = $stmt->fetchAll();
        $br = "<br><br><br>";
       
        ?>
        <div class="col-md-2 text-sm-center text-md-start align-self-center my-2">
            <h1 class="h6 mx-3"><?php foreach($rowList as $row)echo $row["id"].$br ?></h1>
        </div>
        <div class="col-md-2 text-sm-center text-md-start align-self-center my-2">
            <h1 class="h6"><?php foreach($rowList as $row)echo $row["name"].$br ?></h1>
        </div>
        <div class="col-md-2 text-sm-center text-md-start align-self-center my-2">
            <h1 class="h6"><?php foreach($rowList as $row)echo $row["name"].$br ?></h1>
        </div>
        <div class="col-md-2 text-sm-center text-md-start align-self-center my-2">
            <a class="btn btn-outline-dark w-100" href="change_user.php">Change</a>
        </div>
        <div class="col-md-2 text-sm-center text-md-start align-self-center my-2">
            <div class="cv">
                <a class="btn btn-outline-dark w-100 my-1" href="delete_user.php">Delete</a>
            </div>
        </div>
    </div>
</div>
<?php require "footer.php" ?>