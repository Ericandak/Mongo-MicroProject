


<?php
use MongoDB\Operation\Aggregate;
require "./vendor/autoload.php";
$con=new MongoDB\Client("mongodb://localhost:27017");
$db=$con->admin;
echo "connection success";
$collection=$db->aggregate;
$cursor=$collection->aggregate([
    ['$match' => ['section' => 'A']],
    ['$group' => ['_id' => 'student_id', 'total' => ['$sum' => '$course_fee']]]
    ]);
foreach($cursor as $doc){
    echo "Id:".$doc['_id']."\ntotal".$doc['total']."<br/>";
}
?>