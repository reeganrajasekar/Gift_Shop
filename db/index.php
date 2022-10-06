<?php 
require("./db.php");

// Student
$sql = "CREATE TABLE user (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
name VARCHAR(125) NOT NULL,
email VARCHAR(30) NOT NULL,
passwd VARCHAR(30) NOT NULL,
mob VARCHAR(30) NOT NULL,
addr VARCHAR(500) NOT NULL
)";

if ($conn->query($sql) === TRUE) {
    echo "Setup Finished";
} else {
    echo "Setup Faild " . $conn->error;
}

$sql = "CREATE TABLE gift (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
name VARCHAR(125) NOT NULL,
rate VARCHAR(30) NOT NULL,
img LONGBLOB NOT NULL,
stack VARCHAR(30) NOT NULL,
disc VARCHAR(500) NOT NULL
)";

if ($conn->query($sql) === TRUE) {
    echo "Setup Finished";
} else {
    echo "Setup Faild " . $conn->error;
}

$sql = "CREATE TABLE orders (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
userid VARCHAR(30) NOT NULL,
giftid VARCHAR(30) NOT NULL,
stat VARCHAR(30) NOT NULL,
remark VARCHAR(30) NOT NULL,
payment VARCHAR(30) NOT NULL
)";

if ($conn->query($sql) === TRUE) {
    echo "Setup Finished";
} else {
    echo "Setup Faild " . $conn->error;
}
?>