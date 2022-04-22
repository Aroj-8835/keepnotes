<?php
include 'database.php';
if (isset($_POST['login'])) {
	$user_email=$_POST['email'];
	$user_pass=$_POST['password'];
	$obj=new database();
	$obj->select("users","*",null,"email= '$user_email' AND password = '$user_pass'",null,null);
	$result=$obj->getResult();
// 	// $new_obj= new database();
// 	// $new_obj->select("admin","*",null,"admin_email= '$user_email' AND admin_password = '$user_pass'",null,null);
// 	// $new_result=$new_obj->getResult();
// 	// // print_r($result);
// 	// die();
	if ($result==true) 
	{
		session_start();
		
	    if ($result['0']['is_admin']==false)
	   {
		// session_start();
		$_SESSION['loggedin']=true;
		$_SESSION['username']=$result['0']['name'];
		// echo $_SESSION['username'];
		header("location:../index.php");

	   }

	    elseif ($result['0']['is_admin']==true) 
	   {
		// session_start();
		$_SESSION['loggedin']=true;
		// print_r($new_result);
		// die();
		$_SESSION['admin']=$new_result['0']['name']; 
	
		header("location:../index.php");
	   }
	}

	else{
		echo"The given credentials does'nt match.";
	}
}

?>