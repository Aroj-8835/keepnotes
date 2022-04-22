<?php
// session_start();
// if(isset($_SESSION['loggedin']) || $_SESSION['loggedin']=true)
// {
//   header("location:index.php");
// }
// else {
//   header("location:main.php");
// }

?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/css/login.css">
    <title>Login page</title>
  </head>
  <body>
    

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light  py-2">
    <div class="container-fluid">
    <span class="navbar-brand mb-0 "><h3>KeepNotes</h3></span>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav me-auto mb-2 mb-lg-0 text-sm">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="index.php">About us</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Info</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Contact</a>
        </li>
      </ul>
      <form class="d-flex" action="login.php" method="post">
      <input class="form-control me-2" type="email" placeholder="Enter your email" name="email">
        <input class="form-control me-2" type="password" placeholder="password" name="psw">
        <button class="btn btn-outline-primary " type="submit" name="submit">SignIn</button>
      </form>

    </div>
  </div>
  </nav>
   <?php 
   
     if (isset($_GET['alert']) && ($_GET['alert']=='true')) {
        echo'<div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Success!</strong>Registration successful, you can login now.
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>';
        unset($_POST["username"]);
        unset($_POST["email"]);
        unset($_POST["password"]);
        unset($_POST["cpassword"]);

     }
     elseif (isset($_GET['alert']) && ($_GET['alert']=='false')) {
      echo'<div class="alert alert-danger alert-dismissible fade show" role="alert">
      <strong>Failed!</strong>Registration failed!.
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>';
     }
   
     if(isset($_GET['error']) && ($_GET['error']=='true')) {
        echo'<div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Failed!</strong>Passwords donot match!.
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>';
    }
   
     if(isset($_GET['exists']) && ($_GET['exists']=='1')) {
        echo'<div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Failed!</strong>Email already exists!.
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>';
        unset($_GET["exists"]);
    }
    if (isset($_GET['login']) && ($_GET['login']=='false')) {
      echo'<div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Failed!</strong>Invalid credentials!.
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>';
    }

?>

  <div class="container vh-100">    
<main class="form-signin text-center">
  <form action="signup.php" method="post">
    <img class="mb-4" src="assets/images/note.svg" alt="" width="72" height="57">
    <h1 class="h3 mb-3 fw-normal">Please sign Up</h1>
    <div class="form-floating">
      <input type="text" class="form-control" id="floatingInput" name="username" placeholder="Harry Potter">
      <label for="floatingInput">Username</label>
    </div>

    <div class="form-floating">
      <input type="email" class="form-control" id="floatingInput" name="email" placeholder="name@example.com">
      <label for="floatingInput">Email address</label>
    </div>
    <div class="form-floating">
      <input type="password" class="form-control" id="floatingPassword" name="password" placeholder="Password">
      <label for="floatingPassword">Password</label>
    </div>
    <div class="form-floating">
      <input type="password" class="form-control" id="floatingPassword" name="cpassword" placeholder="Password">
      <label for="floatingPassword">Confirm Password</label>
    </div>

    <!-- <div class="checkbox mb-3">
      <label>
        <input type="checkbox" value="remember-me"> Remember me
      </label>
    </div> -->
    <div class="form-floating">
    <button class="w-100 btn btn-lg btn-primary" type="submit">Sign Up</button>
    </div>
  </form>
</main></div>
    
<div class="container-fluid bg-light py-2">
  <footer class="d-flex flex-wrap justify-content-between align-items-center py-2 my-3">
    <div class="col-md-4 d-flex align-items-center">
    <img src=assets/images/note.svg>
    <span>KeepNotes</span>
      <span class="text-muted"> &nbsp; &nbsp; &nbsp; © 2021 Company, Inc</span>
    </div>
    <ul class="nav col-md-4 justify-content-end list-unstyled d-flex">
      <li class="ms-3"><a class="text-muted" href="#"><img src=assets/images/github.svg></a></li>
      <li class="ms-3"><a class="text-muted" href="#"><img src=assets/images/facebook.svg></a></li>
      <li class="ms-3"><a class="text-muted" href="#"><img src=assets/images/instagram.svg></a></li>
      <li class="ms-3"><a class="text-muted" href="#"><img src=assets/images/twitter.svg></a></li>
    </ul>
  </footer>
  </body>
</div>
</html>