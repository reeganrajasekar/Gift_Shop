<?php
$giftid = $_GET['id'];
$userid = $_COOKIE['id'];

require("../db/db.php");

$sql = "SELECT * from gift where id='$giftid'";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
      $sql = "INSERT INTO orders (userid, giftid, stat,remark,payment)
      VALUES ('$userid','$giftid','0','','null')";
      $add=$conn->query($sql);
      header("Location: /user");
    die();
    }
}



?>