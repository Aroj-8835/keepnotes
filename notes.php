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
    <link rel="stylesheet" href="//cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <script src="//cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script>
    $(document).ready( function () {
    $('#myTable').DataTable();
     } );
     </script>
    <title>Notes</title>
  </head>
  <body>
 <!-- Edit Modal -->
 <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="editModalLabel">Edit this Note</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <form action="edit_note.php" method="POST">
          <div class="modal-body">
            <input type="hidden" name="snoEdit" id="snoEdit">
            <div class="form-group">
              <label for="title">Note Title</label>
              <input type="text" class="form-control" id="titleEdit" name="titleEdit" aria-describedby="emailHelp">
            </div>

            <div class="form-group">
              <label for="desc">Note Description</label>
              <textarea class="form-control" id="descriptionEdit" name="descriptionEdit" rows="3"></textarea>
            </div> 
          </div>
          <div class="modal-footer d-block mr-auto">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Save changes</button>
          </div>
        </form>
      </div>
    </div>
  </div>
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
  <div class="container vh-100 my-5">
 
  <table class="table table-striped table-hover" id="myTable">
  <thead>
    <tr>
      <th scope="col">S.N.</th>
      <th scope="col">Title</th>
      <th scope="col">Description</th>
      <th scope="col">Created Date</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
     <?php

   $user= $_SESSION['useremail'];
   $sql = "SELECT * FROM store WHERE user_email ='$user'";
   $result = mysqli_query($conn,$sql);
   $sn=1;
  while($row = mysqli_fetch_assoc($result))
   {
   ?>
    <tr>
      <th scope='row'><?php echo $sn ?></th>
      <td><?php echo $row['title'];?></td>
      <td><?php echo $row['description'];?></td>
      <td><?php echo $row['created_date'];?></td>
      <td> <button class='edit btn btn-sm btn-primary' id=<?php echo $row['sn']?>>Edit</button> 
      <button class='delete btn btn-sm btn-primary' id=<?php echo $row['sn']?>>Delete</button>  </td>
      <?php
  $sn++;
  }
  ?>
  </tbody>
</table>
  </div>
  <script>
    edits = document.getElementsByClassName('edit');
    Array.from(edits).forEach((element) => {
      element.addEventListener("click", (e) => {
        console.log("edit ");
        tr = e.target.parentNode.parentNode;
        title = tr.getElementsByTagName("td")[0].innerText;
        description = tr.getElementsByTagName("td")[1].innerText;
        console.log(title, description);
        titleEdit.value = title;
        descriptionEdit.value = description;
        snoEdit.value = e.target.id;
        console.log(e.target.id)
        $('#editModal').modal('toggle');
      })
    })

    deletes = document.getElementsByClassName('delete');
    Array.from(deletes).forEach((element) => {
      element.addEventListener("click", (e) => {
        console.log("delete");
        sno = e.target.id;

        if (confirm("Are you sure you want to delete this note!")) {
          console.log("yes");
          window.location = `delete_note.php?delete=${sno}`;
          // TODO: Create a form and use post request to submit a form
        }
        else {
          console.log("no");
        }
      })
    })
  </script>
  </body>

  
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
</html>