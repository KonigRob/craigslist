<?php
/**
 * Created by PhpStorm.
 * User: rob
 * Date: 13/03/18
 * Time: 4:38 PM
 */

error_reporting(E_ALL);
ini_set('display_errors', '1');

ob_start();

session_start();

function insertRow($num, $file){
	/*
	 * file contains the subjects
	 * loop through them, and output rows for the table*/

	$string = '';
	$topic = fopen("./".$file.".txt", "r") or die("Unable to open file");
	if($topic){
		$a = $b = 0;
		while(!feof($topic)){
			$word = fgets($topic);
			if($a === 0){
				$string .= "<tr>";
				$a++;
			}
			$string .= "<td><a href='" . $file . "/" . $word . ".php'> " . $word . "</a></td>";
			$b++;
			if($b === $num){
				$a = 0;
				$b = 0;
				$string .= "</tr>";
			}
		}
		fclose($topic);
	}
	return $string;
}

$comm = insertRow(2, "community");
$pers = insertRow(1, "personals");
$hous = insertRow(1, "housing");
$forsal = insertRow(2, "forSale");
$servic = insertRow(2, "services");
$jbs = insertRow(1, "jobs");
$gig = insertRow(2, "gigs");

//links
$community_link = '#';
$house_link = '#';
$forsale_link = '#';
$services_link = '#';
$jobs_link = '#';
$gigs_link = '#';
$resume_link = '#';

echo "
<html>
	<head>
	<meta charset=\"utf-8\">
	<meta name=\"viewport\" content=\"width=device-width, initial-scale=1, shrink-to-fit=no\">
	<!-- Bootstrap CSS -->
	<link rel=\"stylesheet\" href=\"https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css\" 
	integrity=\"sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm\" 
	crossorigin=\"anonymous\">
	<title>Robslist</title>
			
	</head>
	<body class='container-fluid'>
	<div class='jumbotron text-center'>
		<h1>Robslist</h1>
	</div>
		<div class='row'>
			<div class='col-md-4'>
				<table class='table table-condensed'>
					<thead>
						<tr>
							<th colspan='2' class='text-center'><a href='$community_link'>Community</a></th> 
						</tr>
					</thead>
					<tbody>
						".$comm."
					</tbody>
				</table>
				<table class='table table-condensed'>
					<thead>
						<tr>
							<th class='text-center'>Personals</th> 
						</tr>
					</thead>
					<tbody>
						".$pers."
					</tbody>
				</table>
			</div>
			<div class='col-md-4'>
				<table class='table table-condensed'>
					<thead>
						<tr>
							<th class='text-center'><a href='$house_link'>housing</a></th> 
						</tr>
					</thead>
					<tbody>
						".$hous."
					</tbody>
				</table>
				<table class='table table-condensed'>
					<thead>
						<tr>
							<th colspan='2' class='text-center'><a href='$forsale_link'>forsale</a></th> 
						</tr>
					</thead>
					<tbody>
						".$forsal."
					</tbody>
				</table>
				<table class='table table-condensed'>
					<thead>
						<tr>
							<th colspan='2' class='text-center'><a href='$services_link'>services</a></th> 
						</tr>
					</thead>
					<tbody>
						".$servic."
					</tbody>
				</table>
			</div>
			<div class='col-md-4'>
				<table class='table table-condensed'>
					<thead>
						<tr>
							<th class='text-center'><a href='$jobs_link'>jobs</a></th> 
						</tr>
					</thead>
					<tbody>
						".$jbs."
					</tbody>
				</table>
				<table class='table table-condensed'>
					<thead>
						<tr>
							<th colspan='2' class='text-center'><a href='$gigs_link'>gigs</a></th> 
						</tr>
					</thead>
					<tbody>
						".$gig."
					</tbody>
				</table>
				<table class='table table-condensed'>
					<thead>
						<tr>
							<th class='text-center'><a href='$resume_link'>resumes</a></th> 
						</tr>
					</thead>
				</table>
			</div>
		</div>
	<script src=\"https://code.jquery.com/jquery-3.2.1.slim.min.js\" 
	integrity=\"sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN\" 
	crossorigin=\"anonymous\"></script>
		<script src=\"https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js\" 
		integrity=\"sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q\" 
		crossorigin=\"anonymous\"></script>
		<script src=\"https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js\" 
		integrity=\"sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl\" 
		crossorigin=\"anonymous\"></script>
	</body>
</html>";



ob_flush();