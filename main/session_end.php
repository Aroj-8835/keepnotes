<?php
//logout 
if (isset($_POST['logout']) || $_SESSION['loggedin']!=true) 
{
	session_unset();
	session_destroy();
	header("location:../login.php");
}
?>