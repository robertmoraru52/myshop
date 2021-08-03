<?php require "header.php"; ?>
<div class="container my-5">
    <form action="controller" method="get" class="d-md-flex d-sm-block justify-content-between">
        <input type="hidden" name="command" value="select-orders">
        <h1 class="h5 align-self-center col-3">Search Product</h1>
        <div class="btn-group align-self-center col-12 col-sm-12 col-md-8 col-lg-6">
            <select name="searchType" class="btn btn-outline-dark col-3 col-sm-3">
                <option value="orderId">User ID</option>
                <option value="created">Created</option>
                <option value="customer">User Email</option>
            </select>
            <input type="search" name="searchBy" class="col-6 col-sm-6">
            <input type="submit" value="Search" class="btn btn-outline-dark col-3 col-sm-3">
        </div>
    </form>
    <div class="d-md-flex d-none justify-content-md-between justify-content-sm-center align-content-center border-bottom border-2 my-2 bg-dark text-light p-3 rounded-3">
        <div class="col-2 text-sm-center text-md-start align-self-center">
            <h1 class="h5 fw-bold">User ID</h1>
        </div>
        <div class="col-2 align-self-center">
            <h1 class="h5 fw-bold">Created</h1>
        </div>
        <div class="col-3 align-self-center">
            <h1 class="h5 fw-bold">User Email</h1>
        </div>
        <div class="col-2 align-self-center">
            <h1 class="h5 fw-bold">Show details</h1>
        </div>
        <div class="col-2 align-self-center">
            <h1 class="h5 fw-bold">Action</h1>
        </div>
    </div>
    <div class="d-md-flex d-sm-block justify-content-md-around justify-content-sm-center text-center border-bottom border-2 my-2 bg-light p-2 rounded-3">
        <div class="col-md-2 text-sm-center text-md-start align-self-center my-2">
            <h1 class="h6">2F456DA</h1>
        </div>
        <div class="col-md-2 text-sm-center text-md-start align-self-center my-2">
            <h1 class="h6">04/12/2021 3:15:23</h1>
        </div>
        <div class="col-md-3 text-sm-center text-md-start align-self-center my-2">
            <h1 class="h6">T-Shirt Black</h1>
        </div>
        <div class="col-md-2 text-sm-center text-md-start align-self-center my-2">
            <a class="btn btn-outline-dark w-100" href="#">Details</a>
        </div>
        <div class="col-md-2 text-sm-center text-md-start align-self-center my-2">
            <form method="get" action="controller" class="d-flex btn-group">
                <input type="hidden" name="command" value="refresh-order-status">
                <select name="status" class="btn btn-outline-dark">
                    <option value="Delete" class="form-select-button">Delete</option>
                    <option value="Change" class="form-select-button">Change</option>
                </select>
                <input type="submit" class="btn btn-outline-dark" value="OK"> </form>
        </div>
    </div>
    <div class="col-4 col-xl-4 col-sm-4 col-md-4 col-lg-4">
        <button class="btn btn-danger">Block User</button>
    </div>
</div>
<?php require "footer.php" ?>