<?php 
  include("includes/config.php");
  include("includes/classes/Account.php");
  include("includes/classes/Constants.php");

  $account = new Account($pdo); // Created in to use the $account variable in register-handler.php amd register.php

  function getInputValue($name) {
    if (isset($_POST[$name])) {
      echo $_POST[$name];
    }
  }
  
  include("includes/handlers/register-handler.php");
  include("includes/handlers/login-handler.php");    
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../../../favicon.ico">

    <title>Dhivehi Podcast</title>

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <!-- Custom styles for this template -->
    <!-- <link href="starter-template.css" rel="stylesheet"> -->
    <link rel="stylesheet" href="assets/css/style.css">
  </head>

  <body>

    <nav class="navbar navbar-expand-md navbar-dark bg-dark fixed-top">
      <a class="navbar-brand" href="#">Navbar</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
          
      <div class="collapse navbar-collapse" id="navbarsExampleDefault">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item active">
            <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Link</a>
          </li>
          <li class="nav-item">
            <a class="nav-link disabled" href="#">Disabled</a>
          </li>
        </ul>

        <!-- Login button trigger modal -->
        <button type="button" class="btn btn-link" data-toggle="modal" data-target="#loginModal">
          Login
        </button>  <!-- End- Login button trigger modal -->
        <!-- Signup button trigger modal -->
        <button type="button" class="btn btn-link" data-toggle="modal" data-target="#signupModal">
          Sign up
        </button> <!-- End - Signup button trigger modal -->

      </div>
    </nav>
  
    <main role="main" class="container">

      <div class="login">
        <!-- Login Modal -->
        <div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="loginModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="loginModalLabel">Login</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <form id="loginForm" action="register.php" method="POST">
                <div class="modal-body">
                  <h2>Got an account?</h2>  
                  <div class="form-group">
                    <?php echo $account->getError(Constants::$loginFailed); ?>
                    <label for="loginUsername">User</label>
                    <input type="email" class="form-control" id="loginUsername" name="loginUsername" type="text" placeholder="email" required>
                    <small id="emailHelp" class="form-text-muted">Your email is safe with us</small>
                  </div>
                  <div class="form-group">
                    <label for="loginPassword">Password</label>
                    <input type="password" class="form-control" id="loginPassword" name="loginPassword" placeholder="Password"  required>
                  </div>
                </div> <!-- modal-body -->
                <div class="modal-footer">
                  <button type="submit" name="loginButton" class="btn btn-primary">LOG IN</button>
                </div> <!-- modal-footer -->
              </form>
            </div>
          </div>
        </div>  <!-- End - Login Modal -->
      </div>  <!-- login -->

      <div class="signup">
        <!-- Modal -->
        <div class="modal fade" id="signupModal" tabindex="-1" role="dialog" aria-labelledby="signupModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="signupModalLabel">Sign up</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <form id="registerForm" action="register.php" method="POST">
                <div class="modal-body">
                    <h2>Want a free account?</h2>
                    <div class="form-group">
                      <?php echo $account->getError(Constants::$nickNameCharacters); ?>
                      <?php echo $account->getError(Constants::$userNameTaken); ?>
                      <label for="nickname">Nick Name</label>
                      <input type="text" class="form-control" id="nickname" name="nickname" placeholder="Nickname" value="<?php getInputValue('nickname') ?>" required>
                    </div>
                    <div class="form-group">
                    <?php echo $account->getError(Constants::$firstNameCharacters); ?>
                      <label for="firstName">First Name</label>
                      <input type="text" class="form-control" id="firstName" name="firstName" placeholder="First Name" value="<?php getInputValue('firstName') ?>" required>
                    </div>
                    <div class="form-group">
                      <?php echo $account->getError(Constants::$lastNameCharacters); ?>
                      <label for="lastName">Last Name</label>
                       <input type="text" class="form-control" id="lastName" name="lastName" placeholder="Last Name" value="<?php getInputValue('lastName') ?>" required>
                    </div>
                    <div class="form-group">
                      <?php echo $account->getError(Constants::$emailsDoNotMatch); ?>
                      <?php echo $account->getError(Constants::$emailInvalid); ?>
                      <label for="email">Your Email</label>
                      <input type="email" class="form-control" id="email" name="email" placeholder="Email" value="<?php getInputValue('email') ?>" required>
                      <small id="emailHelp" class="form-text-muted">Your email is safe with us</small>
                    </div>                 
                    <div class="form-group">
                      <label for="email2">Confirm Email</label>
                      <input type="email" class="form-control" id="email2" name="email2" placeholder="Email" value="<?php getInputValue('email2') ?>" required>
                      <small id="emailHelp" class="form-text-muted">Your email is safe with us</small>
                    </div>
                    <div class="form-group">
                      <?php echo $account->getError(Constants::$passwordsDoNotMatch); ?>
                      <?php echo $account->getError(Constants::$passwordNotAlphanumeric); ?>
                      <?php echo $account->getError(Constants::$passwordCharacters); ?>
                      <?php echo $account->getError(Constants::$emailTaken); ?>
                      <label for="password">Password</label>
                      <input type="password" class="form-control" id="password" name="password" placeholder="Password"  required>
                    </div>
                    <div class="form-group">
                      <label for="password2">Confirm Password</label>
                      <input type="password" class="form-control" id="password2" name="password2" placeholder="Confirm Password"  required>
                    </div>
                </div> <!-- modal-body -->
                <div class="modal-footer">
                  <button type="submit" name="registerButton" class="btn btn-primary">SIGN UP</button>
                </div> <!-- modal-footer -->
              </form> <!-- registerForm -->
            </div> <!-- modal-content -->
          </div> <!-- modal-dialog -->
        </div> <!-- Modal -->
      </div> <!-- Signup -->

    </main> <!-- /.container -->


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="assets/js/jquery-3.2.1.slim.min.js"></script>
  	<script src="assets/js/popper.min.js"></script>
  	<script src="assets/js/bootstrap.min.js"></script>
  </body>
</html>