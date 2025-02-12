<?php
require "../vendor/autoload.php";

// MongoDB connection
$mongoClient = new MongoDB\Client("mongodb://localhost:27017", ['debug' => true]);
$collection = $mongoClient->Micro->Product_tbl;
session_start();
// error_reporting(E_ERROR | E_PARSE);
$user = $_SESSION['logData'];
if ($user['status'] != 2) {
    echo "<script>location.href='../Registration.php'</script>";
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta http-equiv="X-UA-Compatible" content="ie=edge" />
  <title>Add Product - Dashboard HTML Template</title>
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:400,700" />
  <!-- https://fonts.google.com/specimen/Roboto -->
  <link rel="stylesheet" href="css/fontawesome.min.css" />
  <!-- https://fontawesome.com/ -->
  <link rel="stylesheet" href="jquery-ui-datepicker/jquery-ui.min.css" type="text/css" />
  <!-- http://api.jqueryui.com/datepicker/ -->
  <link rel="stylesheet" href="css/bootstrap.min.css" />
  <!-- https://getbootstrap.com/ -->
  <link rel="stylesheet" href="css/templatemo-style.css">
  <!--
	Product Admin CSS Template
	https://templatemo.com/tm-524-product-admin
	-->
</head>

<body>
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
              <i class="fsr fa-shopping-cart"></i>
              <span> products <i class="fas fa-angle-down"></i> </span>
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
              <a class="dropdown-item" href="#">add product</a>
              <a class="dropdown-item" href="edit-product.php">edit product</a>
              <a class="dropdown-item" href="delete-product.php">remove product</a>
            </div>
          </li>
          <!-- <li class="nav-item">
              <a class="nav-link active" href="add-product.php">
                <i class="fas fa-shopping-cart"></i> Products
              </a>
            </li> -->

          <li class="nav-item">
            <a class="nav-link" href="accounts.html">
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
            <a class="nav-link d-block" href="logout.php">
              Admin, <b>Logout</b>
            </a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
  <div class="container tm-mt-big tm-mb-big">
    <div class="row">
      <div class="col-xl-9 col-lg-10 col-md-12 col-sm-12 mx-auto">
        <div class="tm-bg-primary-dark tm-block tm-block-h-auto">
          <div class="row">
            <div class="col-12">
              <h2 class="tm-block-title d-inline-block">Add Product</h2>
            </div>
          </div>
          <div class="row tm-edit-product-row">
            <div class="col-xl-6 col-lg-6 col-md-12">
              <form action="addpro.php" class="tm-edit-product-form" method="POST" enctype="multipart/form-data">
                <div class="form-group mb-3">
                  <label for="name">Product Name
                  </label>
                  <input id="name" name="name" type="text" class="form-control validate" required />
                </div>
                <div class="form-group mb-3">
                  <label for="description">Description</label>
                  <textarea name="desc" class="form-control validate" rows="3" required></textarea>
                </div>
                <div class="form-group mb-3">
                  <label for="category">Category</label>
                  <select class="custom-select tm-select-accounts" id="category" name="category">
                    <option selected>Select category</option>
                    <option value="1">New Arrival</option>
                    <option value="2">Most Popular</option>
                    <option value="3">Trending</option>
                  </select>
                </div>
                <div class="row">
                  <div class="form-group mb-3 col-xs-12 col-sm-6">
                    <label for="price">price
                    </label>
                    <input id="price" name="price" type="number" min='0' max='100000' class="form-control validate" data-large-mode="true" required/>
                  </div>
                  <div class="form-group mb-3 col-xs-12 col-sm-6">
                    <label for="stock">Units In Stock
                    </label>
                    <input id="stock" name="stock" min="5" max="100" type="number" class="form-control validate" required />
                  </div>
                  <div class="form-group mb-3 col-xs-12 col-sm-6">
                    <label for="seller">Seller
                    </label>
                    <input id="seller" name="seller" type="text" class="form-control validate" required />
                  </div>
                </div>

            </div>
            <div class="col-xl-6 col-lg-6 col-md-12 mx-auto mb-4">
              <div class="tm-product-img-dummy mx-auto">
                <i class="fas fa-cloud-upload-alt tm-upload-icon" onclick="document.getElementById('fileInput').click();"></i>
              </div>
              <div class="custom-file mt-3 mb-3">
                <input id="fileInput" type="file" name="fileim" style="display:none;" />
                <!-- <input
                    type="button"
                    class="btn btn-primary btn-block mx-auto"
                    value="UPLOAD PRODUCT IMAGE"
                    onclick="document.getElementById('fileInput').click();"
                  />
                </div> -->
              </div>
              <div class="col-12">
                <input type="submit" name="sub" class="btn btn-primary btn-block text-uppercase">
              </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
    <footer class="tm-footer row tm-mt-small">
      <div class="col-12 font-weight-light">
        <p class="text-center text-white mb-0 px-4 small">
          Copyright &copy; <b>2018</b> All rights reserved.

          Design: <a rel="nofollow noopener" href="https://templatemo.com" class="tm-footer-link">Template Mo</a>
        </p>
      </div>
    </footer>

    <script src="js/jquery-3.3.1.min.js"></script>
    <!-- https://jquery.com/download/ -->
    <script src="jquery-ui-datepicker/jquery-ui.min.js"></script>
    <!-- https://jqueryui.com/download/ -->
    <script src="js/bootstrap.min.js"></script>
    <!-- https://getbootstrap.com/ -->
    <script>

    </script>
</body>

</html>