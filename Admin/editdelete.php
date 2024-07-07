<?php
require "../vendor/autoload.php";

// MongoDB connection
$mongoClient = new MongoDB\Client("mongodb://localhost:27017");
session_start();
error_reporting(E_ERROR | E_PARSE);
$user = $_SESSION['logData'];
if ($user['status'] != 2) {
    echo "<script>location.href='../Register.php'</script>";
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Product Admin - Dashboard HTML Template</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:400,700">
    <!-- https://fonts.google.com/specimen/Roboto -->
    <link rel="stylesheet" href="css/fontawesome.min.css">
    <!-- https://fontawesome.com/ -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- https://getbootstrap.com/ -->
    <link rel="stylesheet" href="css/templatemo-style.css">
    <!--
	Product Admin CSS Template
	https://templatemo.com/tm-524-product-admin
	-->
</head>

<body id="reportsPage">
    <div class="" id="edit">
        <nav class="navbar navbar-expand-xl">
            <div class="container h-100">
                <a class="navbar-brand" href="index.php">
                    <h1 class="tm-site-title mb-0">Product Admin</h1>
                </a>
                <button class="navbar-toggler ml-auto mr-0" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="fas fa-bars tm-nav-icon"></i>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav mx-auto h-100">
                        <li class="nav-item">
                            <a class="nav-link" href="index.php">
                                <i class="fas fa-tachometer-alt"></i> Dashboard
                                <span class="sr-only">(current)</span>
                            </a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-shopping-cart"></i>
                                <span> products <i class="fas fa-angle-down"></i> </span>
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="add-product.php">add product</a>
                                <a class="dropdown-item" href="editdelete.php">edit/delete product</a>
                            </div>
                        </li>
                        <!-- <li class="nav-item">
              <a class="nav-link active" href="products.html">
                <i class="fas fa-shopping-cart"></i> Products
              </a>
            </li> -->

                        <li class="nav-item">
                            <a class="nav-link" href="">
                                <i class="far fa-user"></i> Accounts
                            </a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-cog"></i>
                                <span> Settings <i class="fas fa-angle-down"></i> </span>
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="#">Profile</a>
                                <a class="dropdown-item" href="#">Billing</a>
                                <a class="dropdown-item" href="#">Customize</a>
                            </div>
                        </li>
                    </ul>
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link d-block" href="Logout.php">
                                <b><?= $user['status'] ?></b> <b>Logout</b>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <div class="container">
            <div class="row">
                <div class="col">
                    <p class="text-white mt-5 mb-5">Welcome back, <b>Admin</b></p>
                </div>
            </div>
            <div class="col-12 tm-block-col">
                <div class="tm-bg-primary-dark tm-block tm-block-taller tm-block-scroll">
                    <h2 class="tm-block-title">Product List</h2>
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">Product Id.</th>
                                <th scope="col">Product Name</th>
                                <th scope="col">Price</th>
                                <th scope="col">Category</th>
                                <th scope="col">Image</th>
                                <th scope="col">Actions</th> <!-- New column for edit/delete options -->
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $collection = $mongoClient->Micro->Product_tbl; // Assuming your products are stored in the "Products" collection
                            $products = $collection->find();
                            foreach ($products as $product) {
                            ?>
                                <tr>
                                    <th scope="row"><b><?= $product['_id'] ?></b></th>
                                    <td><b><?= $product['Name'] ?></b></td>
                                    <td><b><?= $product['Price'] ?></b></td>
                                    <td><b><?= $product['Category'] ?></b></td>
                                    <td><b><?= $product['Image'] ?></b></td>
                                    <td>
                                        <!-- Edit button -->
                                        <a type="button" class="btn btn-primary" href="edit-product.php?id=<?= $product['_id'] ?>">Edit</button>
                                        <!-- Delete button -->
                                        <a type="button" class="btn btn-danger" href="delete-product.php?idi=<?= $product['_id'] ?>">Delete</button>
                                    </td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</body>