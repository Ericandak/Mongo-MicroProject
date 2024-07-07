<?php
require "./vendor/autoload.php";
$con=new MongoDB\Client("mongodb://localhost:27017");
$db=$con->admin;
echo "connection successs";
$collecton=$db->aggregate;
$cursor=$collecton->aggregate([
    ['$group'=>['_id'=>'$class','total'=>['$sum'=>'$course_fee']]]
]);
foreach($cursor as $doc)
{
    echo "class:".$doc['_id'].",Total:".$doc['total']."<br/>";
}
$cursor3=$collecton->aggregate([
    ['$group'=>['_id'=>'$class','count'=>['$sum'=>1]]]
]);
foreach($cursor3 as $doc)
{
    echo "class:".$doc['_id'].",count:".$doc['count']."<br/>";
}
$cursor4=$collecton->aggregate(
    [
        ['$group'=>['_id'=>'$class','highest'=>['$sum'=>'$course_fee']]],
        ['$sort'=>[
            'highest'=>-1
        ]],
        [
            '$limit'=>3
        ]
        ]
        );
foreach($cursor4 as $doc)
{
    echo "class:".$doc['_id'].",highest:".$doc['highest']."<br/>";
}
$cursor5=$collecton->aggregate([
    ['$group'=>['_id'=>'$section','highesttot'=>['$sum'=>'$course_fee']]],
    ['$sort'=>['highesttot'=>-1]],
    ['$limit'=>2]
]);
foreach($cursor5 as $doc)
{
    echo "section:".$doc['_id'].",thighest:".$doc['highesttot']."<br/>";
}
?>