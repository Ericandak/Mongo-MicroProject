<?php
require "./vendor/autoload.php";
$client = new MongoDB\Client("mongodb://localhost:27017");

// Select a database and collection
$collection = $client->admin->demosam;
if (isset($_GET['idd']))
{
    $userid=$_GET['idd'];
    $user=$collection->deleteOne([
        '_id'=>new MongoDB\BSON\ObjectId($userid)
    ]);
    if($user->getDeletedCount()>0)
    {
        echo "deleted successfully";
        echo " <a href='rough.php'>go back</a>";
    }
    else
    {
        echo "no deletion occured";
    }
}