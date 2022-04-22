<?php
session_start();
if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin']!=true)
{
  header("location:main.php");
  exit;

}
include "config/dbconnect.php";


if(isset($_GET['delete'])){
    $sno = $_GET['delete'];
    $delete = true;
    $sql = "DELETE FROM `store` WHERE `sn` = $sno";
    $result = mysqli_query($conn, $sql);
    if (!$result) {
        echo "cannot be deleted";
    }
    else {
        header("location:notes.php");
    }
  }