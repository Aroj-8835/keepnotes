<?php
session_start();
if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin']!=true)
{
  header("location:main.php");
  exit;
}
include "config/dbconnect.php";




?>


<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>NewsFeeds</title>
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
          <a class="nav-link active" aria-current="page" href="index.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="notes.php">MyNotes</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="feeds.php">Feeds</a>
        </li>
      </ul>
      <ul class="navbar-nav mb-2 mb-lg-0">
      <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
           Welcome <?php echo $_SESSION["useremail"];?>
          </a>
          <ul class="dropdown-menu dropdown-menu-light dropdown-menu-macos mx-0 border-0 shadow" style="width: 220px;">
            <li><a class="dropdown-item" href="#">Action</a></li>
            <li><a class="dropdown-item" href="#">Edit Profile</a></li>
            <!-- <li><hr class="dropdown-divider"></li> -->
            <li><a class="dropdown-item" href="logout.php">LogOut</a></li>
          </ul>
        </li>
      </ul>

    </div>
  </div>
  </nav>
  <div class="container vh-100"></div>


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
</div>
  </body>

  

</html>