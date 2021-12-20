<?php


	$dbhost = "localhost";
	$dbuser = "root";
	$dbpass = "";
	$dbname = "project_db";

	$con = new mysqli($dbhost, $dbuser, $dbpass, $dbname) or die($con->connect_error);

	return $con;

?>
