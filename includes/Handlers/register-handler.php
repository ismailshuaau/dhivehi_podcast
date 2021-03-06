<?php 
/*
 *  Sanitize functions
 *
 */
function sanitizeFormNickname($inputText){
  $inputText = strip_tags($inputText); // Remove all HTML Tags
  $inputText = str_replace(" ", "", $inputText); // Look for spaces and replace an empty string
  return $inputText;
}

function sanitizeFormString($inputText){
  $inputText = strip_tags($inputText); // Remove all HTML Tags
  $inputText = str_replace(" ", "", $inputText); // Look for spaces and replace an empty string
  $inputText = ucfirst(strtolower($inputText));  // Uppercase the first letter
  return $inputText;
}

function sanitizeFormPassword($inputText){
  $inputText = strip_tags($inputText); // Remove all HTML Tags
  return $inputText;
}


//  If the button is pressed, submitted the form to the server
if (isset($_POST['loginButton'])) {
  // Login pressed
}

if (isset($_POST['registerButton'])) {
  // register pressed

  //  Sanitize
  $nickname = sanitizeFormNickname($_POST['nickname']);
  $firstName = sanitizeFormString($_POST['firstName']);
  $lastName = sanitizeFormString($_POST['lastName']);
  $email = sanitizeFormString($_POST['email']);
  $email2 = sanitizeFormString($_POST['email2']);
  $password = sanitizeFormPassword($_POST['password']);
  $password2 = sanitizeFormPassword($_POST['password2']);

  $wasSuccessful = $account->register($nickname, $firstName, $lastName, $email, $email2, $password, $password2);

  if($wasSuccessful) {
    $_SESSION['userLoggedIn'] = $nickname;
    header("Location: index.php");
  }
}