<?php
  require_once "models/loginData.php";
  session_start();
  
  //log in
  if($_SESSION['status']!="Logged In")
  {
      header("Location: ./index.php");
  }
  
  //variables
  $userId = $_SESSION['userId'];
  $firstname = $_SESSION['firstname'];
  
  require_once "models/adminData.php";
  
  ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset='utf-8'>
    <title>Admin</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel="stylesheet" type="text/css" href="css/main2.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  </head>
  <body>
    <div class="container-fluid px-1 px-md-5 px-lg-1 px-xl-5 py-5 mx-auto">
      <nav class="navbar navbar-inverse">
        <div class="container-fluid">
          <div class="navbar-header">
            <div class="row px-3">
              <h1>IT DESK</h1>
              <a class="btn btn-white" href="logout.php">Logout</a>
            </div>
          </div>
        </div>
      </nav>
      <div class="card card0 border-0">
        <div class="row d-flex">
          <div class="col-lg-12">
            <h4 class="row px-5">WELCOME ADMIN <?= $firstname; ?> !</h4>
          </div>
          <div class="col-lg-12">
            <h4 class="row px-5">Support Tickets - Admin</h4>
            <div class="card2 card border-0 px-4 py-5">
              <div class="m-1">
                <table class="table table-bordered tbl" >
                  <thead>
                    <tr>
                      <th scope="col">Ticket ID</th>
                      <th scope="col">Subject</th>
                      <th scope="col">Date</th>
                      <th scope="col">Status</th>
                      <th scope="col">Client ID</th>
                      <th scope="col">View</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                      echo $rows;
                      ?>                        
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
        <div class="bg-blue py-4">
          <div class="row px-3"> <small class="ml-4 ml-sm-5 mb-2">Copyright &copy; 2021. All rights reserved.</small>
          </div>
        </div>
      </div>
    </div>
  </body>
</html>

