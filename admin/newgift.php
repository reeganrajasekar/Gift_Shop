<?php require("../db/db.php");
session_start();


$statusMsg = '';


$name = $_POST["name"];
$rate = $_POST["price"];
$stock= $_POST["stock"];
$dis = $_POST["dis"];



$status = $statusMsg = ''; 
if(isset($_POST["submit"])){ 
    $status = 'error'; 
    if(!empty($_FILES["image"]["name"])) { 
        // Get file info 
        $fileName = basename($_FILES["image"]["name"]); 
        $fileType = pathinfo($fileName, PATHINFO_EXTENSION); 
        echo($fileType);
        // Allow certain file formats 
        $allowTypes = array('jpg','png','jpeg','gif'); 
        if(in_array($fileType, $allowTypes)){ 
            $image = $_FILES['image']['tmp_name']; 
            $imgContent = addslashes(file_get_contents($image)); 
         
            // Insert image content into database 
            $sql  = "INSERT into gift (name,rate,stack,img,disc)
             VALUES ('$name','$rate','$stock','$imgContent','$dis')"; 
             
            if($conn->query($sql) === TRUE){ 
                $status = 'success'; 
                $statusMsg = "File uploaded successfully.";
                header("Location: /admin/gift.php");
            }else{ 
                echo "Error: " . $sql . "<br>" . $conn->error;
                $statusMsg = "File upload failed, please try again."; 
            }  
        }else{ 
            $statusMsg = 'Sorry, only JPG, JPEG, PNG, & GIF files are allowed to upload.'; 
        } 
    }else{ 
        $statusMsg = 'Please select an image file to upload.'; 
    } 
} 
 
// Display status message 
echo $statusMsg; 
?>