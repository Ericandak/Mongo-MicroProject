<?php
require "../vendor/autoload.php";

// MongoDB connection
$mongoClient = new MongoDB\Client("mongodb://localhost:27017", ['debug' => true]);
$collection = $mongoClient->Micro->Product_tbl;
session_start();
// error_reporting(E_ERROR | E_PARSE);
$user = $_SESSION['logData'];
if ($user['status'] != 2) {
    echo "<script>location.href='../Register.php'</script>";
}
$proId = $_GET['idd'];
$product = $collection->findOne(['_id' => new MongoDB\BSON\ObjectId($proId)]);
echo "$proId";
echo $product['_id'];

if ($product == null) {
  echo "<script>alert('Invalid Product ID')</script>";
  echo "<script>location.href='./admin.php'</script>";
  exit();
}
// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    echo "request approved";
    $proCategory = $_POST['category'];
    $proName = $_POST['name'];
    $proPrice = $_POST['price'];
    $proImage = $_FILES['fileim']['name'];
    $proSeller = $_POST['seller'];
    $proDesc = $_POST['desc'];
    $proStock = $_POST['stock'];

    $targetdir = "../images/products/";
    $file_path = $targetdir. basename($proImage);
    move_uploaded_file($_FILES['fileim']['tmp_name'], $file_path);
    $objectId = new MongoDB\BSON\ObjectId($proId);
    echo  $objectId;

    $updateObj = ['$set' =>
      ['Category' => $proCategory, 'Name' => $proName, 'Price' => $proPrice, 'Image' => $proImage, 'Seller' => $proSeller, 'Desc' => $proDesc, 'Stock' => $proStock]
    ];
    try {
        $result = $collection->updateOne(['_id' => new MongoDB\BSON\ObjectId($proId)], $updateObj);
        if ($result->getModifiedCount() > 0) {
          echo "<script>alert('Product Updated')</script>";
          echo "<script>location.href='./edit-product.php?id={$proId}'</script>";
        } else {
          echo "<script>alert('Error Updating Product')</script>";
        }
      } catch (MongoDB\Driver\Exception\Exception $e) {
        echo "Error: ". $e->getMessage();
      }
}

// Get product data for editing


?>