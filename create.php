<?php
require("./db/db.php");
$name = $_POST["name"];
$mob = $_POST["mob"];
$addr = $_POST["addr"];
$email = $_POST["email"];
$passwd = $_POST["passwd"];

$sql = "INSERT INTO user (name,mob,addr,email,passwd)
VALUES ('$name','$mob','$addr','$email','$passwd')";

if ($conn->query($sql) === TRUE) {
  echo "New record created successfully";
  header("Location: /Login.php");
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
  header("Location: /");

}

$conn->close();



?>