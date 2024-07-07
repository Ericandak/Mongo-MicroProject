<?php
session_start();
error_reporting(E_ERROR | E_PARSE);
$user = $_SESSION['logData'];
// if ($user != null) echo "<script>location.href='Login.php'</script>";
?>
<html>
<head>
<link rel="stylesheet" href="Log.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.bundle.min.js">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css">
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <form action="" method="POST" class="box">
                    <h1>Login</h1>
                    <p class="text-muted"> Please enter your login and password!</p>
                     <input type="text" name="email" placeholder="Username">
                     <input type="password" name="pwd" placeholder="Password">
                     <a class="forgot text-muted" href="#">Forgot password?</a> 
                    <input type="submit" name="" value="Login" href="#">
                    
                    <div class="col-md-12">
                        <ul class="social-network social-circle">
                            <li><a href="#" class="icoFacebook" title="Facebook"><i class="fab fa-facebook-f"></i></a></li>
                            <li><a href="#" class="icoTwitter" title="Twitter"><i class="fab fa-twitter"></i></a></li>
                            <li><a href="#" class="icoGoogle" title="Google +"><i class="fab fa-google-plus"></i></a></li>
                        </ul>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
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

    if (!empty($user)) {
        $_SESSION['logData'] = $user;
        if($user['status']=='2')
        {
            header('Location: ./Admin/index.php');
        }
        else{
        echo "<script>alert('Login Success')</script>";
        echo "<script>location.href='Logindex.php'</script>";
        }    
    }
    else {
        echo "<script>alert('Invalid email or password')</script>";
        }
}
?>