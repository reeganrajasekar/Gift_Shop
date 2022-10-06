<?php

require("../../db/db.php");

$id = $_GET['id'];
$stat = $_GET['stat'];
$remark = $_GET['remark'];
$sql = "UPDATE orders
SET remark = '$remark', stat= '$stat'
WHERE id = '$id';";
$add = $conn->query($sql);
header("Location: /admin/home.php");
die();



?>