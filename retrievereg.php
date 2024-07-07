<?php
require "./vendor/autoload.php";
$client=new MongoDB\Client("mongodb://localhost:27017");
$collection=$client->library->Bookdetails;
$cursor=$collection->find();
echo "<h2>Registered Books</h2>";
echo "<table border='1'>";
echo "<tr><th>BookName</th><th>Author</th><th>Genre</th><th>Price</th><th>Quantity</th><th>Action</th></tr>";
foreach ($cursor as $document) {
    echo "<tr>";
    echo "<td>" . $document['title'] . "</td>";
    echo "<td>" . $document['author'] . "</td>";
    echo "<td>" . $document[''] . "</td>";
    echo "<td><a href='editreg.php?id=" . $document['_id'] . "'>Edit</a> | <a href='delete.php?id=" . $document['_id'] . "'>Delete</a></td>";
    echo "</tr>";
}
echo "</table>";
?>