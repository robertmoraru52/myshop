<?php session_start(); ?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>My Shop</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <script src="https://kit.fontawesome.com/fb00eb3bce.js" crossorigin="anonymous"></script> 
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" integrity="sha512-PgQMlq+nqFLV4ylk1gwUOgm6CtIIXkKwaIHp/PAIWHzig/lKZSEGKEysh0TCVbHJXCLN7WetD8TFecIky75ZfQ==" crossorigin="anonymous"/>  
        <link rel="stylesheet" href="style.css">
    </head>
    <body>
    <div class="container">
    <nav class="navbar navbar-expand-lg navbar-light ">
        <div class="container-fluid pe-lg-2 p-0"> <a class="navbar-brand fw-bold fs-3" href="homepage.php">My Shop</a> <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"> <span class="navbar-toggler-icon"></span> </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                    <li class="nav-item"> <a class="nav-link pe-3 me-4 fw-bold active" aria-current="page" href="homepage.php">HOME</a> </li>
                    <?php if($_SESSION['loggedin'] == true && $_SESSION["email"] == 'admin@example.com'){
                        echo '<li class="nav-item"> <a class="nav-link pe-3 me-4 fw-bold" href="admin_users.php">Users</a> </li>
                        <li class="nav-item"> <a class="nav-link pe-3 me-4 fw-bold" href="admin_products.php">Products</a> </li>';}
                        else{
                            echo '<li class="nav-item"> <a class="nav-link pe-3 me-4 fw-bold" href="#">SHOP</a> </li>
                            <li class="nav-item"> <a class="nav-link pe-3 me-4 fw-bold" href="#">CONTACT</a> </li>';
                        }
                        if ($_SESSION['loggedin'] == true ) { 
                                echo '<li class="nav-item"> <a class="nav-link pe-3 me-4 fw-bold" href="account.php">'.$_SESSION["email"] .'</a> </li>
                                <li class="nav-item"> <a class="nav-link pe-3 me-4 fw-bold" href="../back_end/logout.php">LOGOUT</a> </li>';
                        }
                        else {
                            echo '<li class="nav-item"> <a class="nav-link pe-3 me-4 fw-bold" href="registration.php">SIGN UP</a> </li>
                            <li class="nav-item"> <a class="nav-link pe-3 me-4 fw-bold" href="login.php">SIGN IN</a> </li>';
                        } 
                    ?>
                </ul>
                <ul class="navbar-nav icons ms-auto mb-2 mb-lg-0">
                    <li class=" nav-item pe-3"> <a href="" class="fas fa-heart"> <span class="num rounded-circle">1</span> </a> </li>
                    <li class=" nav-item pe-3"> <a href="cart.php" class="fas fa-shopping-bag"> <span class="num rounded-circle">3</span> </a> </li>
                    <li class=" nav-item"> <span class="">items:</span> <span class="fw-bold">150.00 Lei</span> </li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="row">
        <div class="col-lg-3 mb-lg-0 mb-2">
            <p> <a class="btn btn-primary w-100 d-flex align-items-center justify-content-between" data-bs-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="Toggle Navigation"> <span class="fas fa-bars"><span class="ps-3">All department</span></span> <span class="fas fa-chevron-down"></span> </a> </p>
            <div class="collapse" id="collapseExample">
                <ul class="list-unstyled">
                    <li><a class="dropdown-item" href="#">Clothes</a></li>
                    <li><a class="dropdown-item" href="#">Shoes</a></li>
                    <li><a class="dropdown-item" href="#">House Items</a></li>
                    <li><a class="dropdown-item" href="#">Gadgets</a></li>
                </ul>
            </div>
        </div>
        <div class="col-xl-9 col-md-9 col-lg-9 col-sm-12 ">
            <div class="d-lg-flex">
                <div class="d-lg-flex align-items-center border">
                    <div class="dropdown w-100 my-lg-0 my-2"> <button class="btn btn-secondary d-flex justify-content-between align-items-center" type="button" id="dropdownMenu" data-bs-toggle="dropdown" aria-expanded="true"> <span class=" w-100 d-flex align-items-center"> <span class=" fw-lighter pe-2">ALL</span><span class="fw-lighter pe-3"> Categories</span> <span class="fas fa-chevron-down ms-auto"></span> </span> </button>
                        <ul class="dropdown-menu" aria-labelledby="dropdownMenu">
                            <li><a class="dropdown-item" href="#">T-shirts</a></li>
                            <li><a class="dropdown-item" href="#">Jeans</a></li>
                            <li><a class="dropdown-item" href="#">Shoes</a></li>
                            <li><a class="dropdown-item" href="#">House Items</a></li>
                        </ul>
                    </div>
                    <div class="d-flex align-items-center w-100 h-100 ps-lg-0 ps-sm-3" id="search-nav"> <input class=" ps-md-0 ps-3" type="text" placeholder="what do you need?" style="background-color: rgb(194, 194, 194);">
                        <div class="btn btn-primary d-flex align-items-center justify-content-center"> <i class="fas fa-search"></i></div>
                    </div>
                </div>
                <div class="d-flex align-items-center ms-lg-auto mt-lg-0 mt-3 pe-2"> <span class="me-2 fas fa-phone bg-light rounded-circle" id="phone"></span>
                    <div class="d-flex flex-column ps-2">
                        <p class="fw-bold">+04 0777.777.777</p>
                        <p class="text-muted">support 24/7</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>