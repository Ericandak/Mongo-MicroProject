<?php
require "../vendor/autoload.php";

// MongoDB connection
$mongoClient = new MongoDB\Client("mongodb://localhost:27017");
if (isset($_POST['sub'])) {
  $proCategory = $_POST['category'];
  $proName = $_POST['name'];
  $proPrice = $_POST['price'];
  $proImage = $_FILES['fileim']['name'];;
  $proSeller = $_POST['seller'];
  $proDesc = $_POST['desc'];
  $proStock = $_POST['stock'];
  $collection = $mongoClient->Micro->Product_tbl;


  $targetdir = "../images/products/";
  $file_path = $targetdir . basename($proImage);
  move_uploaded_file($_FILES['fileim']['tmp_name'], $file_path);
  if (move_uploaded_file($_FILES['fileim']['tmp_name'], $file_path)) {
    echo "<script>alert('file Added')</script>";
  }


  $doc = ['Category' => $proCategory, 'Name' => $proName, 'Price' => $proPrice, 'Image' => $proImage, 'Seller' => $proSeller, 'Desc' => $proDesc, 'Stock' => $proStock];
  if ($collection->insertOne($doc)->getInsertedCount() > 0) {
    echo "<script>alert('Product Added')</script>";
    echo "<script>location.href='./index.php'</script>";
  } else {
    echo "<script>alert('Error Adding Product')</script>";
  }
}
