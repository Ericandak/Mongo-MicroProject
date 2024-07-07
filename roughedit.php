
<?php
require "./vendor/autoload.php";
$client=new MongoDB\Client("mongodb://localhost:27017");
$collection=$client->admin->demosam;
if ($_SERVER["REQUEST_METHOD"]=="POST")
{
    $userid=$_POST["user_id"];
    $password=$_POST["password"];
    $name=$_POST["username"];
    $up=$collection->updateOne(
        ["_id"=>new MongoDB\BSON\ObjectId($userid)],
        ['$set'=>["password"=>$password,"name"=>$name]]


    );
    if($up->getModifiedCount()>0)
    {
        echo "updated";
    }
    else
    {
        echo "not updated";
    }
}
if(isset($_GET['id']))
{
    $id=$_GET['id'];
    echo $id;
    $user=$collection->findone(['_id'=>new MongoDB\BSON\ObjectId($id)]);
    if($user)
    {
        ?>
        <html>
    <body>
        <form method="POST">
        <input type="hidden" name="user_id" value="<?php echo $id; ?>">
            username:<input type="text" name="username" />
            password:<input type="password" name="password" />
            <input type="submit" value="login" name="sub" />
        </form>
    </body>
</html>
<?php
    }

}
?>