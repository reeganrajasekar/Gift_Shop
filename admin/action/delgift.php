<?php

require("../../db/db.php");

$id = $_GET['id'];
$sql = "delete from gift
WHERE id = '$id';";
$add = $conn->query($sql);
header("Location: /admin/gift.php");
die();



?>