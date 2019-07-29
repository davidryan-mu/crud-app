<?php
	$servername = "localhost";
	$username = "root";
	$password = "s0m3thingcl3v3r";
	$database = "ebook_metadata";

	$conn = new mysqli($servername, $username, $password, $database);

	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	}

?>