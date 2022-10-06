<?php

require("../../db/db.php");

$id = $_GET['id'];
$sql = "UPDATE orders
SET remark = 'Cancelled', stat= '100'
WHERE id = '$id';";
$add = $conn->query($sql);
header("Location: /admin/home.php");
die();



?>