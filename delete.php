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

	//Upate database
	$id = $conn->real_escape_string($_POST['id']);

	$value = $conn->real_escape_string($_POST['value']);

	$query = "DELETE FROM eBook_MetaData WHERE $id = '{$value}'";

	if ($conn->query($query) === TRUE) {
		echo "Record(s) deleted successfully. Redirecting...";
	} else {
		echo "Error deleting record: " . $conn->error;
	}

	$conn->close();

	header('Refresh: 2; URL=http://localhost/assignment3/index.php');
?>