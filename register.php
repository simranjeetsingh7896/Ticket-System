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
            <?= $signUpMsg ?>
            <h2 <?= $hide ?>>SIGN UP</h2>
              <form action="" method="POST" <?= $hide ?>>
                <div class="row px-3">
                <label for="title">Title: </label>
                    <select id="title" name="title">
                        <option value="gender">Select a Title</option>
                        <option value="Mr">Mr.</option>
                        <option value="Mrs">Mrs.</option>
                        <option value="Ms">Ms.</option>
                        <option value="Mx">Mx.</option>
                    </select>
                    <span></span>
                </div>
                <div class="row px-3">
                <label for="firstname">First Name: </label>
                    <input type="text" name="firstname" id="firstname" />
                    <span></span>
                </div>

                <div class="row px-3">
                <label for="lastname">Last Name: </label>
                    <input type="text" name="lastname" id="lastname" />
                    <span></span>
                </div>

                <div class="signUp__field">
                    <label for="email">Email: </label>
                    <input type="text" name="email" id="email" />
                    <span></span>
                </div>

                <div class="signUp__field">
                    <label for="username">Username: </label>
                    <input type="text" name="username" id="username" />
                    <span></span>
                </div>

                <div class="signUp__field">
                    <label for="password">Password: </label>
                    <input type="password" name="password" id="password" />
                    <span></span>
                </div>

                <div class="signUp__field">
                    <label for="Contact">Contact: </label>
                    <input type="text" name="Contact" id="Contact" />
                    <span></span>
                </div>
                <p style="color:#ffcccb; text-align:center;"><?= $error2; ?></p>
                <div class="row mb-3 px-3"> <button type="submit" name="submitSignUp" class="btn btn-blue text-center">Sign Up</button> </div>
              </form>
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

