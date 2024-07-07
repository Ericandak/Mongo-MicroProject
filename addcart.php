<?php
require "./vendor/autoload.php";
use MongoDB\Client;
use MongoDB\BSON\ObjectId;
$con = new MongoDB\Client("mongodb://localhost:27017");
$product_id = $_POST['id'];
$db = $con->Micro;
$collection = $db->tbl_cart;
session_start();
$userId = isset($_SESSION['logData']) ? $_SESSION['logData']->{'_id'} : null; // Assuming '_id' is the ObjectId field

if ($product_id != null && $userId != null) {
    try {
        // Ensure $userId is a string before passing it to ObjectId constructor
        $userId = (string) $userId;
        $doc = ['productId' => $product_id, 'userId' => new MongoDB\BSON\ObjectId($userId)];
        $collection->insertOne($doc);
        echo "Product Added successfully";
    } catch (Exception $e) {
        echo "Error: " . $e->getMessage();
    }
} else {
    echo "Error: Product ID or User ID is null";
}
?>

