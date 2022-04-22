<?php
if (isset($_POST["submit"])) {
    include "config/dbconnect.php";

    $showError="true";
    $login="false";
    $email = $_POST["email"];
    $password = $_POST["psw"];
    // echo $email;
        $sql = "SELECT * FROM  users where u_email='$email' AND u_password='$password'";
        $result = mysqli_query($conn,$sql);
        $num= mysqli_num_rows($result);
        // var_dump($result);
        // print_r($result);
        // echo $result;
        // die();

    

        if ($num>=1) {
            $login="true";
            session_start();
            $_SESSION["loggedin"] = true;
            $_SESSION["useremail"] =$email;
            header("location:index.php?login=".$login);
        }
        else {
        $showError="false"; 
        header("location:main.php?login=".$showError);

    }
}




?>