<?php
/**
 * Created by PhpStorm.
 * User: rob
 * Date: 13/03/18
 * Time: 4:01 PM
 */

error_reporting(E_ALL);
ini_set('display_errors', '1');

ob_start();

session_start();

if(isset($_POST['newEmail'])){
	$email = $_POST['newEmail'];
	$password = random_str(12);
	$msg = "Welcome to Robslist\n
			Please login with the information below\n\n
			Email: ".$email."\n
			Password: ".$password."\n\n";
	$msg = wordwrap($msg, 70);
	mail($_POST['newEmail'], "Robslist new account!", $msg);
} else {
	header("Location: home.php");
	die();
}


function message(){
	echo "
		Thanks for signing up for a Robslist account! <br />
		A link to activvate your account has been emailed to ".". <br />
";
}

//Taken from https://stackoverflow.com/questions/4356289/php-random-string-generator/31107425#31107425

function random_str($length, $keyspace = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ')
{
	$keyspace = str_shuffle($keyspace);
	$str = '';
	$max = mb_strlen($keyspace, '8bit') - 1;
	for ($i = 0; $i < $length; ++$i) {
		$str .= $keyspace[rand(0, $max)];
	}
	return $str;
}


//TO-DO
//	So, you just need to create a
//	function that inputs the email and password
//	into the database with sql, but do that later/tomorrow

function(){

}


ob_flush();
