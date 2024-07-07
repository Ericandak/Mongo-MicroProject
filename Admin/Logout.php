<?php
session_start();
session_destroy();
unset($_SESSION['LogData']);
$url = "../Login.php";
echo ("<script>location.href='$url'</script>");
?>