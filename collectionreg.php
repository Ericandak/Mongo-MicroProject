<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration</title>
    <!-- Add Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-6 offset-md-3">
                <h1 class="text-center">Register</h1>
                <form action="" method="POST">
                    <div class="form-group">
                        <label for="username">Username</label>
                        <input type="text" class="form-control" id="username" name="username" required>
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" id="email" name="email" required>
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" class="form-control" id="password" name="password" required>
                    </div>
                    <button type="submit" NAME="sub" class="btn btn-primary">Register</button>
                </form>
            </div>
        </div>
    </div>
    <!-- Add Bootstrap and jQuery JavaScript -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
</body>
</html>
<?php
use MongoDB\Operation\InsertOne;
require "./vendor/autoload.php";
use MongoDB\Client;
if (isset($_SERVER['REQUEST_METHOD'])) {

$user=$_POST['username'];
$mail=$_POST['email'];
$pass=hash('sha256',$_POST['password']);

$con=new MongoDB\Client("mongodb://localhost:27017");

$db=$con->admin->sample;
$db->insertOne([
    'name'=>$user,
    'email'=>$mail,
    'pass'=>$pass

]);
echo "registration successfull";
}
?>