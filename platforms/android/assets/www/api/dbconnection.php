<?php
	$servername = "localhost";
	$username = "0894225";
	$password = "e3c831a2";
	$dbname = "prj_2015_2016_mtnll_mt2b_t1";

	$conn = new mysqli($servername, $username, $password, $dbname); //make connection
	if ($conn->connect_error) { //check connection
		die(mysqli_error());
	}
?>