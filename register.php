<?php 
  include("includes/classes/Accounts.php");

  $account = new Account();
  $account->register();

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

    <title>Starter Template for Bootstrap</title>

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">

    <!-- Custom styles for this template -->
    <link href="starter-template.css" rel="stylesheet">
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
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="http://example.com" id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Dropdown</a>
            <div class="dropdown-menu" aria-labelledby="dropdown01">
              <a class="dropdown-item" href="#">Action</a>
              <a class="dropdown-item" href="#">Another action</a>
              <a class="dropdown-item" href="#">Something else here</a>
            </div>
          </li>
        </ul>
        <form class="form-inline my-2 my-lg-0">
          <input class="form-control mr-sm-2" type="text" placeholder="Search" aria-label="Search">
          <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
        </form>
      </div>
    </nav>

    <main role="main" class="container">

      <div class="starter-template">
        <div id="inputContainer">
    
      		<form id="loginForm" action="register.php" method="POST">
      			<h2>Got an account?</h2>	
      			<div class="form-group">
      				<label for="loginUsername">User</label>
      				<input type="email" class="form-control" id="loginUsername" name="loginUsername" type="text" placeholder="email" required>
      				<small id="emailHelp" class="form-text-muted">Your email is safe with us</small>
      			</div>
      			<div class="form-group">
      				<label for="loginPassword">Password</label>
      				<input type="password" class="form-control" id="loginPassword" name="loginPassword" placeholder="Password"  required>
      			</div>
      			<button type="submit" name="loginButton" class="btn btn-primary">LOG IN</button>
      		</form>

    		<hr>

      		<form id="registerForm" action="register.php" method="POST">
      			<h2>Want a free account?</h2>	
      			<div class="form-group">
      				<label for="nickname">Nick Name</label>
      				<input type="text" class="form-control" id="nickname" name="nickname" placeholder="Nickname" required>
      			</div>
      			<div class="form-group">
      				<label for="firstName">First Name</label>
      				<input type="text" class="form-control" id="firstName" name="firstName" placeholder="First Name" required>
      			</div>
      			<div class="form-group">
      				<label for="lastName">Last Name</label>
      				<input type="text" class="form-control" id="lastName" name="lastName" placeholder="Last Name" required>
      			</div>
      			<div class="form-group">
      				<label for="email">Your Email</label>
      				<input type="email" class="form-control" id="email" name="email" placeholder="Email" required>
      				<small id="emailHelp" class="form-text-muted">Your email is safe with us</small>
      			</div>      			
      			<div class="form-group">
      				<label for="email2">Confirm Email</label>
      				<input type="email" class="form-control" id="email2" name="email2" placeholder="Email" required>
      				<small id="emailHelp" class="form-text-muted">Your email is safe with us</small>
      			</div>
      			<div class="form-group">
      				<label for="password">Password</label>
      				<input type="password" class="form-control" id="password" name="password" placeholder="Password"  required>
      			</div>
      			<div class="form-group">
      				<label for="password2">Confirm Password</label>
      				<input type="password" class="form-control" id="password2" name="password2" placeholder="Confirm Password"  required>
      			</div>
      			<button type="submit" name="registerButton" class="btn btn-primary">SIGN UP</button>
      	 </form>

	      </div>
      </div>

    </main><!-- /.container -->


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
  </body>
</html>