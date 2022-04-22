<?php
session_start();
if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin']!=true)
{
  header("location:main.php");
  exit;

}
include "config/dbconnect.php";

// edit notes


if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    if (isset( $_POST['snoEdit'])){
      // Update the record
        $sno = $_POST["snoEdit"];
        $title = $_POST["titleEdit"];
        $description = $_POST["descriptionEdit"];
    
      // Sql query to be executed
      $sql = "UPDATE `store` SET `title` = '$title' , `description` = '$description' WHERE `store`.`sn` = '$sno'";
    //   echo $sql;
    //   die();
      $result = mysqli_query($conn, $sql);
      if($result){
        header("location:notes.php");
        }
        else {
            echo "data cannot be updated";
        }
    }
    }

?>