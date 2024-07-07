<?php
require "./vendor/autoload.php";

// MongoDB connection
$mongoClient = new MongoDB\Client("mongodb://localhost:27017", ['debug' => true]);
$collection = $mongoClient->Micro->tbl_cart;
session_start();
// error_reporting(E_ERROR | E_PARSE);
$user = $_SESSION['logData'];
if ($user['status']!= 1) {
    echo "<script>location.href='../Registeration.php'</script>";
}

if (isset($_GET["cart"]) &&!empty($_GET["cart"])) {
    $proId = $_GET['cart'];
    $product = $collection->findOne(['_id' => new MongoDB\BSON\ObjectId($proId)]);

    if ($product == null) {
        echo "<script>alert('Invalid Product ID')</script>";
        echo "<script>location.href='./Logindex.php'</script>";
        exit();
    } else {
        try {
            $collection->deleteOne(['_id' => new MongoDB\BSON\ObjectId($proId)]);
            if ($collection->deleteOne(['_id' => new MongoDB\BSON\ObjectId($proId)])->getDeletedCount() > 0) {
                echo "<script>alert('Product Deleted')</script>";
                echo "<script>location.href='./Logindex.php'</script>";
            } else {
                echo "<script>alert(' Deleting Product')</script>";
                echo "<script>location.href='./Logindex.php'</script>";
            }
        } catch (MongoDB\Driver\Exception\Exception $e) {
            echo "Error: ". $e->getMessage();
        }
    }
}
?>