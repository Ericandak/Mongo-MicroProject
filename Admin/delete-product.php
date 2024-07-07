<?php
require "../vendor/autoload.php";

// MongoDB connection
$mongoClient = new MongoDB\Client("mongodb://localhost:27017", ['debug' => true]);
$collection = $mongoClient->Micro->Product_tbl;
session_start();
// error_reporting(E_ERROR | E_PARSE);
$user = $_SESSION['logData'];
if ($user['status']!= 2) {
    echo "<script>location.href='../Register.php'</script>";
}

if (isset($_GET["idi"]) &&!empty($_GET["idi"])) {
    $proId = $_GET['idi'];
    $product = $collection->findOne(['_id' => new MongoDB\BSON\ObjectId($proId)]);

    if ($product == null) {
        echo "<script>alert('Invalid Product ID')</script>";
        echo "<script>location.href='./index.php'</script>";
        exit();
    } else {
        try {
            $collection->deleteOne(['_id' => new MongoDB\BSON\ObjectId($proId)]);
            if ($collection->deleteOne(['_id' => new MongoDB\BSON\ObjectId($proId)])->getDeletedCount() > 0) {
                echo "<script>alert('Product Deleted')</script>";
                echo "<script>location.href='./index.php'</script>";
            } else {
                echo "<script>alert('Error Deleting Product')</script>";
            }
        } catch (MongoDB\Driver\Exception\Exception $e) {
            echo "Error: ". $e->getMessage();
        }
    }
}
?>