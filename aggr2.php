<?php
use MongoDB\Operation\InsertOne;
require "./vendor/autoload.php";
$con=new MongoDB\Client("mongodb://localhost:27017");
$db=$con->admin;
echo "connection success";
$collection=$db->aggregate;
$doc = [[
    'student_id' => "P0001",
    'class' => 101,
    'section' => "A",
    'course_fee' => 12
    ], 
    [
    'student_id' => "P0002",
    'class' => 102,
    'section' => "A",
    'course_fee' => 8
    ], 
    [
    'student_id' => "P0002",
    'class' => 101,
    'section' => "A",
    'course_fee' => 12
    ],
    [
    'student_id' => "P0004",
    'class' => 103,
    'section' => "B",
    'course_fee' => 19
    ]];
$collection->insertMany($doc);
echo "inserted successfully";
?>