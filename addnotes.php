<?php
session_start();

if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] != true)
{
header("location:main.php");
exit;

}
if ($_SERVER["REQUEST_METHOD"]=="POST") {
    
    include "config/dbconnect.php";

    $useremail = $_SESSION["useremail"];
    $title = $_POST["title"];
    $description = $_POST["description"];
            $sql = "INSERT INTO `store` (`user_email`, `title`, `description`, `created_date`) VALUES (".$useremail.", " .$title.", ".$description.", CURRENT_TIMESTAMP)";
            $result = mysqli_query($conn,$sql);
           
            
            if ($result) {
                header("location:index.php?insert=true");
            }
        }
        else {
            echo"Error description: " . mysqli_error($result);
    
        }




?>
