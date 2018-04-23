<?php
/**
 * Created by PhpStorm.
 * User: rob
 * Date: 13/03/18
 * Time: 1:54 PM
 */
error_reporting(E_ALL);
ini_set('display_errors', '1');

function searchForm(){
	echo "
		<form>
			<input type='text' name='searchWord'>
			<select name='category'>
				<option value='community'>Community</option>
				<option value='personals'>Personals</option>
				<option value='housing'>Housing</option>
				<option value='forSale'>For Sale</option>
				<option value='services'>Services</option>
				<option value='jobs'>Jobs</option>
				<option value='gigs'>Gigs</option>
				<option value='resumes'>Resumes</option>
			
			</select>
		</form>
	";
}