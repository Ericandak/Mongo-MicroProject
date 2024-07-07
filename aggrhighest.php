<?php
use MongoDB\Operation\InsertOne;
require "./vendor/autoload.php";
$con=new MongoDB\Client("mongodb://localhost:27017");
$db=$con->admin;
echo "connection success";
$collection=$db->aggregate;
$cursor=$collection->aggregate([
    ['$group'=>['_id'=>'$class',
    "total"=>['$max'=>'$course_fee']
    ]]
]);
foreach ($cursor as $document) {
    echo "Class: " . $document["_id"] . ", Total : " . $document["total"] ."<br/>";
}
?>