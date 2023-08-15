<?php 
    // import config
    require_once("../config/config.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Dashboard</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
</head>
<body>
    <!-- Header -->
    <nav class="navbar navbar-expand-lg bg-light sticky-top">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Mart Admin</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="nav nav-pills">
                    <?php  // check and set page name 
                            if(isset($_GET['page'])){
                                $currentPage = $_GET['page'];
                            } else {
                                $currentPage = "dashboard";
                            } ?>
                    <li class="nav-item">
                        <a class="nav-link <?php echo $currentPage == "dashboard" ? "active" : null; ?>" aria-current="page" href="index.php?page=dashboard">Dashboard</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?php echo $currentPage == "prodAdd" ? "active" : null; ?>" aria-current="page" href="index.php?page=prodAdd">Add Products</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?php echo $currentPage == "prodList" ? "active" : null; ?>" aria-current="page" href="index.php?page=prodList">List Products</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?php echo $currentPage == "orders" ? "active" : null; ?>" aria-current="page" href="index.php?page=orders">Orders</a>
                    </li>
                </ul>
            </div>

            <div class="dropdown">
                <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                    Full Name
                </button>
                <ul class="dropdown-menu dropdown-menu-dark dropdown-menu-end">
                    <li><a class="dropdown-item active" href="#">Profile</a></li>
                    <li><a class="dropdown-item" href="#">Settings</a></li>
                    <li><hr class="dropdown-divider"></li>
                    <li><a class="dropdown-item" href="#">Logout</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Content -->
    <div class="p-5 m-auto w-80">
            <?php   if(isset($_GET['page']))
                        include("contents/".$_GET['page'].".php"); 
                    else 
                        include("contents/dashboard.php"); ?>
    </div>

    <!-- Footer -->
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
</body>
</html>