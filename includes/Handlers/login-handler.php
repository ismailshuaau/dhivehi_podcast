<?php 

if(isset($_POST['loginButton'])) {
	// Login button was pressed
	$nickname = $_POST['loginUsername'];
	$password = $_POST['loginPassword'];

	$result = $account->login($nickname, $password);

	if($result) {
		$_SESSION['userLoggedIn'] = $nickname;
		header("Location: index.php");
	}
}

