<?php
use MongoDB\Operation\InsertOne;
require "./vendor/autoload.php";
$con=new MongoDB\Client("mongodb://localhost:27017");
$db=$con->admin;
echo "connection success";
$collection=$db->aggregate;

$cursor=$collection->aggregate([
    [
        '$group' => [
            '_id' => '$class',
            'totalCourseFee' => ['$sum' => '$course_fee'] 
        ]
    ],
    [
        '$sort' => ['totalCourseFee' => -1] 
    ],
    [
        '$limit' => 1
    ]
]);


foreach ($cursor as $document) {
    echo "Class with the highest total course fee: " . $document["_id"] . ", Total course fee: " . $document["totalCourseFee"] . "<br/>";
}
?>