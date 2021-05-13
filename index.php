<?php
  require_once "models/loginData.php"
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset='utf-8'>
    <title>Page Title</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel="stylesheet" type="text/css" href="css/main.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  </head>
  <body>
    <div class="container-fluid px-1 px-md-5 px-lg-1 px-xl-5 py-5 mx-auto">
      <nav class="navbar navbar-inverse">
        <div class="container-fluid">
          <div class="navbar-header">
            <div class="row px-3">
              <h1>IT DESK</h1>
            </div>
          </div>
        </div>
      </nav>
      <div class="card card0 border-0">
        <div class="row d-flex">
          <div class="col-lg-6">
            <div class="card1 pb-5">
              <div class="row px-3 justify-content-center mt-4 mb-5 border-line"> <img src="img/service-desk.png" class="image"> </div>
            </div>
          </div>
          <div class="col-lg-6">
            <div class="card2 card border-0 px-4 py-5">
              <form action="" method="POST">
                <div class="row px-3">
                  <label class="mb-1" for="username">
                    <h2 class="mb-0 text-sm">Username</h2>
                  </label>
                  <input class="mb-4" type="text" name="username" id="username" placeholder="Enter username"> 
                </div>
                <div class="row px-3">
                  <label class="mb-1">
                    <h2 class="mb-0 text-sm">Password</h2>
                  </label>
                  <input type="password" name="password" placeholder="Enter password"> 
                </div>
                <div style="color:red; text-align:left;"><?= $error; ?></div>
                <div class="row mb-3 px-3"> <button type="submit" name="submitLogin" class="btn btn-blue text-center">Login</button> </div>
              </form>
              <a href ="register.php">Click Here to register</a>
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

