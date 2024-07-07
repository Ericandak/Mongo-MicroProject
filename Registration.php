<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Form</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <!-- Font Awesome CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.0.3/css/font-awesome.css">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="Reg.css">
    <!-- jQuery -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <!-- jQuery Validation plugin -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.3/jquery.validate.min.js"></script>
    <!-- Custom script for validation -->
    <script>
       $(document).ready(function() {
        $.validator.addMethod("strongPassword", function(value, element) {
            return this.optional(element) || /^(?=.*[A-Z])(?=.*\d).{8,}$/.test(value);
        }, "Password must contain at least one uppercase letter and one number");
    // Define validation rules
    $("#registrationForm").validate({
        rules: {
            email: {
                required: true,
                email: true
            },
            psw: {
                required: true,
                minlength: 8,
                strongPassword:true
                
            },
            confirmPsw: {
                required: true,
                equalTo: "#psw"
            },
            phone: {
                required: true,
                digits: true,
                minlength: 10,
                maxlength: 10
            },
            pin: {
                required: true,
                digits: true,
                minlength: 6,
                maxlength: 6
            },
            hname: {
                required: true
            },
            city: {
                required: true
            }
        },
        messages: {
            email: {
                required: "Please enter an email address",
                email: "Please enter a valid email address"
            },
            psw: {
                required: "Please enter a password",
                minlength: "Password must be at least 8 characters long"
            },
            confirmPsw: {
                required: "Please confirm your password",
                equalTo: "Passwords do not match"
            },
            phone: {
                required: "Please enter a phone number",
                digits: "Please enter only digits",
                minlength: "Phone number must be 10 digits long",
                maxlength: "Phone number must be 10 digits long"
            },
            pin: {
                required: "Please enter a pin number",
                digits: "Please enter only digits",
                minlength: "Pin number must be 6 digits long",
                maxlength: "Pin number must be 6 digits long"
            },
            hname: {
                required: "Please enter your house name"
            },
            city: {
                required: "Please enter your city"
            }
        },
        errorElement: "div",
        errorPlacement: function(error, element) {
            // Add the `help-block` class to the error element
            error.addClass("invalid-feedback");
            if (element.prop("type") === "checkbox") {
                error.insertAfter(element.parent("label"));
            } else {
                error.insertAfter(element);
            }
        },
        highlight: function(element, errorClass, validClass) {
            // Add `is-invalid` class to the parent div.form-group if the input is invalid
            $(element).addClass("is-invalid").removeClass("is-valid");
        },
        unhighlight: function(element, errorClass, validClass) {
            // Remove the `is-invalid` class from the parent div.form-group if the input is valid
            $(element).removeClass("is-invalid").addClass("is-valid");
        }
    });
});

    </script>
</head>
<body style="background-image: linear-gradient(to right, #dc3545, #004085);">
<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <!-- Bootstrap JS bundle -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js"></script> -->
<div class="container px-4 py-5 mx-auto">
    <div class="card card0">
        <div class="d-flex flex-lg-row flex-column-reverse">
            <div class="card card1">
                <div class="row justify-content-center my-auto">
                    <div class="col-md-8 col-10 my-5">
                        <div class="row justify-content-center px-3 mb-3">
                            <img id="logo" src="https://i.imgur.com/PSXxjNY.png">
                        </div>
                        <h3 class="mb-5 text-center heading">We are AScot</h3>

                        <h6 class="msg-info"> Create Your account</h6>

                        <form id="registrationForm" method="POST" action="">
                                <div class="form-group">
                                    <label class="form-control-label text-muted">Email</label>
                                    <input type="text" id="email" name="email" placeholder="Email" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label class="form-control-label text-muted">Password</label>
                                    <input type="password" id="psw" name="psw" placeholder="Password" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label class="form-control-label text-muted"> Confirm Password</label>
                                    <input type="password" id="confirmPsw" name="confirmPsw" placeholder="Confirm Password" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label class="form-control-label text-muted">Phone number</label>
                                    <input type="text" id="phone" name="phone" placeholder="Phone number" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label class="form-control-label text-muted">Pin number</label>
                                    <input type="text" id="pin" name="pin" placeholder="Pin number" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label class="form-control-label text-muted">House Name</label>
                                    <input type="text" id="hname" name="hname" placeholder="House Name" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label class="form-control-label text-muted">City</label>
                                    <input type="text" id="city" name="city" placeholder="City" class="form-control">
                                </div>
                                <div class="row justify-content-center my-3 px-3">
                                    <button type="submit"  class="btn-block btn-color">Register to Ascot</button>
                                </div>
                            </form>

                        <div class="row justify-content-center my-2">
                            <!-- <a href="#"><small class="text-muted">Forgot Password?</small></a> -->
                        </div>
                    </div>
                </div>
                <div class="bottom text-center mb-5">
                    <p  class="sm-text mx-auto mb-3">Already have an account?<a href="Login.php" class="btn btn-white ml-2">Sign in</a></p>
                </div>
            </div>
            <div class="card card2" style="background-image: linear-gradient(to right,#dc3545, #004085);">
                <div class="my-auto mx-md-5 px-md-5 right">
                    <h3 class="text-white">We are more than just a company</h3>
                    <small class="text-white"></small>
                </div>
            </div>
        </div>
    </div>
</div>
</body>

</html>
<?php
use MongoDB\Operation\InsertOne;
require "./vendor/autoload.php";
use MongoDB\Client;
// MongoDB connection
$mongoClient = new MongoDB\Client("mongodb://localhost:27017");
$collection = $mongoClient->Micro->Register;

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data
    $email = $_POST["email"];
    $password = $_POST["psw"];
    $phone = $_POST["phone"];
    $pin = $_POST["pin"];
    $hname = $_POST["hname"];
    $city = $_POST["city"];

    // Insert data into MongoDB
    $document = [
        "email" => $email,
        "password" => $password, // Note: It's recommended to hash the password before storing it in the database
        "phone" => $phone,
        "pin" => $pin,
        "hname" => $hname,
        "city" => $city,
        "status"=>1
    ];
    $insertOneResult = $collection->insertOne($document);

    // Check if insertion was successful
    if ($insertOneResult->getInsertedCount() > 0) {
        echo "Registration successful!";
        echo "<script>location.href= 'Login.php';</script>";
    } else {
        echo "Error occurred while registering.";
    }
}
?>
