<?php
	$servername = "localhost";
	$username = "root";
	$password = "s0m3thingcl3v3r";
	$database = "ebook_metadata";

	$conn = new mysqli($servername, $username, $password, $database);

	//Check connection
	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	}

	/*echo "Connected successfully";*/

	//Insert to database
	$creator = $conn->real_escape_string($_POST['creator']);
	$title = $conn->real_escape_string($_POST['title']);
	$type = $conn->real_escape_string($_POST['type']);
	$identifier = $conn->real_escape_string($_POST['identifier']);
	$date = $conn->real_escape_string($_POST['date']);
	$language = $conn->real_escape_string($_POST['language']);
	$description = $conn->real_escape_string($_POST['description']);

	$query = "INSERT INTO eBook_MetaData (creator, title, type, identifier, date, language, description) VALUES ('{$creator}','{$title}','{$type}','{$identifier}','{$date}','{$language}','{$description}')";

	if ($conn->query($query) === TRUE) {
		echo "New record created successfully. Redirecting...";
	};
	$conn->close();

	header('Refresh: 2; URL=http://localhost/assignment3/index.php');
?>