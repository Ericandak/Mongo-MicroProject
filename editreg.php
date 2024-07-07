<html>
<style>
        .form-container {
            max-width: 400px;
            margin: 0 auto;
            padding: 15px;
            border: 1px solid #ccc;
            border-radius: 5px;
            position: inherit;
        }
        .form-group {
            margin-bottom: 15px;
        }
        .form-group label {
            display: block;
            margin-bottom: 5px;
        }
        .form-group input {
            width: 50%;
            padding: 5px;
            border: 1px solid #ccc;
            border-radius: 3px;
        }
        .form-group input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            cursor: pointer;
        }
        .form-group input[type="submit"]:hover {
            background-color: #45a049;
        }
    </style>
    </html>
<?php
require "./vendor/autoload.php";

// Establish a connection to MongoDB
$client = new MongoDB\Client("mongodb://localhost:27017");

// Select a database and collection
$collection = $client->admin->sample;

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $userId = $_POST["user_id"];
    $newUsername = $_POST["new_username"];
    $newEmail = $_POST["new_email"];
    $updateResult = $collection->updateOne(
        ["_id" => new MongoDB\BSON\ObjectId($userId)],
        ['$set' => ['name' => $newUsername, 'email' => $newEmail]]
    );

    if ($updateResult->getModifiedCount() > 0) {
        echo "User updated successfully.";
    } else {
        echo "No changes made to the user.";
    }
}

// Display the edit form
if (isset($_GET['id'])) {
    $userId = $_GET['id'];
    echo $userId;
    $user = $collection->findOne(['_id' => new MongoDB\BSON\ObjectId($userId)]);
    if ($user) {
        ?>
        <h2>Edit User</h2>
        <form method="post" action="">
            <input type="hidden" name="user_id" value="<?php echo $userId; ?>">
            <div class="form-group">
                <label for="new_username">New Username:</label>
                <input type="text" name="new_username" value="<?php echo $user['name']; ?>" required>
            </div>
            <div class="form-group">
                <label for="new_email">New Email:</label>
                <input type="email" name="new_email" value="<?php echo $user['email']; ?>" required>
            </div>
            <div class="form-group">
                <input type="submit" value="Update">
            </div>
        </form>
        <?php
    } else {
        echo "User not found.";
    }
} else {
    echo "User ID not provided.";
}
?>
