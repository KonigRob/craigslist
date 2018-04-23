<?php
/**
 * Created by PhpStorm.
 * User: rob
 * Date: 13/03/18
 * Time: 3:51 PM
 */
error_reporting(E_ALL);
ini_set('display_errors', '1');

ob_start();

session_start();

function login($user = '')
{
	echo "
	<div> Log in
	<form action='account.php' method='post'>
		Email / Handle <br />
		<input type='text' name='username' value='$user' required> <br />
		Password <br />
		<input type='password' name='password' required>
		<input type='submit' value='Log in'>
	</form>
	</div>
";
}

function createAccount()
{
	echo "
		<div> Create an account <br />
		<form action='account2.php' method='post'>
		Email <br />
		<input type='text' name='newEmail' required>
		<input type='submit' value='Create account'>
</form>
			
</div>
	";
}

function passAccount($un, $pw) {
	$file = fopen("./accounts.txt", "r") or die("Unable to open file");
	if($file){
		while(!feof($file)){
			$info = explode(",", fgets($file));
			if(preg_match("/$info[0]/", $un) && preg_match("/$info[1]/",$pw."\n")){
				return true;
			}
		}
		fclose($file);
	} else {
		echo 'error';
		return true;
	}
}

//logged in, redirect to homepage
if(isset($_SESSION['loggedin'])){
	header("Location: home.php");
	die();
} else if (isset($_POST['username'])) {
	if(passAccount($_POST['username'], $_POST['password']) === true) {
		$_SESSION['loggedin'] = 1;
		$_SESSION['username'] = $_POST['username'];
		echo "
		<h1>Thank you for logging in ".$_SESSION['username'].".</h1>";
		sleep(3);
		header("Location: home.php");
		die();
	} else  {
		login($_POST['username']);
		createAccount();
	}
} else {
	login();
	createAccount();
}

ob_flush();
