<?php
require "./vendor/autoload.php";
$con=new MongoDB\client( "mongodb://localhost:27017");
$db=$con->admin;
$collection=$db->sample;
if($db)
{
    echo "connection successful";
}
?>
