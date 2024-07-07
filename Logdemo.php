<html>
    <body>
        <form action="" method="POST">
            <input type="text"  name="email"/><br/>
            <input type="password"  name="pwd"/><br/>
            <button type="submit">
        </form>
</body>
</html>
<?php
require "./vendor/autoload.php";

// MongoDB connection
$mongoClient = new MongoDB\Client("mongodb://localhost:27017");
$collection = $mongoClient->Micro->Register;

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data
    $email = $_POST["email"];
    $password = $_POST["pwd"];

    // Check if user exists in the database
    $user = $collection->findOne(["email" => $email, "password" => $password]);

    if ($user) {
        // User found, redirect to success page or perform other actions
        echo "Login successful!";
        // Redirect to success page
        // header("Location: success.php");
        // exit();
    } else {
        // User not found or password incorrect
        echo "Invalid email or password.";
    }
}
?>
