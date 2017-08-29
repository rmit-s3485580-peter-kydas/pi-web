<!DOCTYPE html>
<html lang="en">

<?php
    
    session_start();

    $valid_passwords = array('admin' => 'test');
    $valid_users = array_keys($valid_passwords);

    //var_dump($_POST);
    //var_dump($_SESSION);
    
    if (isset($_SESSION['validated']) && $_SESSION['validated'] == true){
      header('Location: index.php');
    }
    
    if (isset($_POST['username']) && isset($_POST['password'])){

      $user = $_POST['username'];
      $pass = $_POST['password'];

      $validated = (in_array($user, $valid_users)) && ($pass == $valid_passwords[$user]);

      $_SESSION['validated'] = $validated;
    
      if ($_SESSION['validated'] == true){
        header('Location: index.php');
      } else {
        header('Location: login.php?loginfailed');
      }
    }
?>

  <head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <meta name="description" content="">
    <meta name="author" content="">
    <title>Pi-Web - Login</title>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom fonts for this template -->
    <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- Custom styles for this template -->
    <link href="css/sb-admin.css" rel="stylesheet">

  </head>

  <body class="bg-dark">

    <div class="container">

      <div class="card card-login mx-auto mt-5">
        <div class="card-header">
          <?php
            if (isset($_GET['loginfailed'])){
              echo "<span style='color:red'>Login Failed!</span>";
            } 
            
            else if (isset($_GET['logout'])){
                if(isset($_SESSION['validated'])){
                  $_SESSION['validated'] = false;
                }
                
                echo "<span style='color:green'>Logout Successful!</span>";
            }

            else {
              echo "Login";
            }
          ?>
        </div>


        <div class="card-body">
          <form action="login.php" method="post">
            <div class="form-group">
              <label for="usernameLogin">Username</label>
              <input type="text" class="form-control" id="usernameLogin" aria-describedby="emailHelp" placeholder="Enter username" name="username">
            </div>
            <div class="form-group">
              <label for="exampleInputPassword1">Password</label>
              <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password" name="password">
            </div>
            <!-- <div class="form-group">
              <div class="form-check">
                <label class="form-check-label">
                  <input type="checkbox" class="form-check-input">
                  Remember Password
                </label>
              </div>
            </div> -->
            <input type="submit">Login</input>
          </form>
          <div class="text-center">
            <!-- 
            <a class="d-block small mt-3" href="register.html">Register an Account</a>
            <a class="d-block small" href="forgot-password.html">Forgot Password?</a>
            -->
          </div>
        </div>
      </div>
    </div>

    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/popper/popper.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>

  </body>

</html>
