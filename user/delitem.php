<?php
$id = $_GET['id'];
$userid = $_COOKIE['id'];

require("../db/db.php");

$sql = "delete from orders where id='$id'";
$result = $conn->query($sql);
header("Location: /user");
die();


?>