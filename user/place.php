<?php 
require("../db/db.php");

    $id = $_COOKIE['id'];
    $sql = "SELECT * from orders where userid='$id' and payment='null'";
    $result = $conn->query($sql);

    
    if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        $id = $row['id'];
        $sql = "UPDATE orders
        SET remark = 'Ordered', payment= 'Yes'
        WHERE id = '$id';";
        $add = $conn->query($sql);
    }
    header("Location: /user?data=Orders placed Successfully !");
    die();
}
?>