<?php
if ($_SERVER["REQUEST_METHOD"]=="POST") {
    
    include "config/dbconnect.php";

    $showError="true";
    $showAlert="false";
    $username = $_POST["username"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $cpassword = $_POST["cpassword"];

    //check whether the emailaddress exists or not..
    $existsql = "SELECT * FROM users WHERE u_email = '$email'";
    $result = mysqli_query($conn,$existsql);
    $existrows = mysqli_num_rows($result);

    if ($existrows > 0) {
        header("location:main.php?exists=".true);
    }
    else {
        if ($password==$cpassword ) {
            $sql = "INSERT INTO `users` (`u_name`, `u_email`, `u_password`, `date`) VALUES ('$username', '$email', '$cpassword ', CURRENT_TIMESTAMP)";
    
            $result = mysqli_query($conn,$sql);
    
            if ($result) {
                $showAlert="true";
                header("location:main.php?alert=".$showAlert);
            }
        }
        else {
            $showError="true"; 
            header("location:main.php?error=".$showError);
    
        }
    }


    
}




?>
