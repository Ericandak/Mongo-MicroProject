<?php
require "./vendor/autoload.php";

// Establish a connection to MongoDB
$client = new MongoDB\Client("mongodb://localhost:27017");

// Select a database and collection
$collection = $client->admin->sample;

// Check if the delete request is made
if (isset($_GET['id']) && $_SERVER["REQUEST_METHOD"] == "GET") {
    $userId = $_GET['id'];
    $deleteResult = $collection->deleteOne(['_id' => new MongoDB\BSON\ObjectId($userId)]);

    if ($deleteResult->getDeletedCount() > 0) {
        echo "User deleted successfully.";
    } else {
        echo "No user found with the given ID.";
    }
} else {
    echo "User ID not provided.";
}

// Display the registered users
$cursor = $collection->find();
echo "<h2>Registered Users</h2>";
echo "<table border='1'>";
echo "<tr><th>Username</th><th>Email</th><th>Password</th><th>Action</th></tr>";
foreach ($cursor as $document) {
    echo "<tr>";
    echo "<td>" . $document['name'] . "</td>";
    echo "<td>" . $document['email'] . "</td>";
    echo "<td>" . $document['pass'] . "</td>";
    echo "<td><a href='editreg.php?id=" . $document['_id'] . "'>Edit</a> | <a href='delete.php?id=" . $document['_id'] . "' onclick=\"return confirm('Are you sure you want to delete this user?')\">Delete</a></td>";
    echo "</tr>";
}
echo "</table>";
?>