<html>
    <body>
        <form method="post">
            username:<input type="text" name="username" />
            password:<input type="password" name="password" />
            <input type="submit" value="login" name="sub" />
        </form>
    </body>
</html>
<?php
if (isset($_POST["sub"]))
{
    $username = $_POST["username"];
    $password = $_POST["password"];
    require "./vendor/autoload.php";
    $client=new MongoDB\Client("mongodb://localhost:27017");
    $db=$client->admin;
    $collection=$db->demosam;
    $doc=["name"=>$username,"pass"=>$password];
    $result=$collection->insertOne($doc);
    if ($result)
    {
        echo "show inserted";
        $pr=$collection->find();
        foreach($pr as $prs)
        {
            ?>
            <p><?php echo $prs["name"] ?></p>
            <p><?php echo $prs["pass"] ?></p>
            <a href="roughedit.php?id=<?php echo $prs['_id']; ?>">Edit</a>
            <a href="roughdelete.php?idd=<?php echo $prs['_id']; ?>">Delete</a>


<?php
        } 
    }

}
?>

