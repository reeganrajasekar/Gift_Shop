<?php

require("../../db/db.php");

$id = $_GET['id'];
$sql = "delete from user
WHERE id = '$id';";
$add = $conn->query($sql);
header("Location: /admin/users.php");
die();



?>