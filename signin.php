
<?php 
require("./db/db.php");
$email = $_POST['email'];
$passwd = $_POST['passwd'];
$sql = "select * from user where email='$email'";
$result = $conn->query($sql);
session_start();

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
            if($row["passwd"]==$passwd){
                setcookie("id", $row['id'], time() + (86400000 * 30), "/");
                header("Location: /user");
                die();
            }
            else{
                header("Location: /Login.php?r=Wrong Password");
                die();
            }
    }
}else{
    header("Location: /Login.php?r=Wrong Email");
    die();
}
?>