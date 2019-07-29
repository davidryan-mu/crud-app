<?php
	include_once 'connect.php';
?>


<!DOCTYPE html>
<html>
	<head>
		<title>Assignment 3</title>
		<link rel="stylesheet" type="text/css" href="style.css">
		<script>
			function display() {
				var x = document.getElementById('table');
				x.style.display = 'block';
			}
		</script>
	</head>

	<body>
		<div class="header">
			<h1>CRUD Book Database</h1>
		</div>
		
		<div class="center">
		<div class="container">
			<h3>Create Record</h3>
			<form action="insert.php" method="post">
				<div class="row">
					<div class = "col-25">
						<label for="creator">Creator:</label>
					</div>
					<div class="col-75">
						<input type="text" id="creator" name="creator" />
					</div>
				</div>

				<div class="row">
					<div class = "col-25">
						<label for="title">Title:</label>
					</div>
					<div class="col-75">
						<input type="text" id="title" name="title" />
					</div>
				</div>

				<div class="row">
					<div class = "col-25">
						<label for="type">Type:</label>
					</div>
					<div class="col-75">
					<select id="type" name="type">
						<option value="Fantasy">Fantasy</option>
						<option value="Sci-Fi">Sci-Fi</option>
						<option value="Horror">Horror</option>
						<option value="Romance">Romance</option>
					</select>
				</div>
				</div>

				<div class="row">
					<div class = "col-25">
						<label for="identifier">ISBN:</label>
					</div>
					<div class="col-75">
						<input type="text" id="identifier" name="identifier" />
					</div>
				</div>

				<div class="row">
					<div class = "col-25">
						<label for="date">Date:</label>
					</div>
					<div class="col-75">
						<input type="date" id="date" name="date" />
					</div>
				</div>

				<div class="row">
					<div class = "col-25">
						<label for="language">Language:</label>
					</div>
					<div class="col-75">
					<select id="language" name="language">
						<option value="EN-UK">EN-UK</option>
						<option value="EN-US">EN-US</option>
						<option value="FR-CA">FR-CA</option>
						<option value="FR-FR">FR-FR</option>
					</select>
				</div>
				</div>

				<div class="row">
					<div class = "col-25">
						<label for="description">Description:</label>
					</div>
					<div class="col-75">
						<input type="text" id="description" name="description" />
					</div>
				</div>
				<div class="row">
					<input type="submit" />
				</div>
			</form>
		</div>

		<div class="container">
			<h3>Update Record</h3>
			<form action="update.php" method="post">
				<div class="row">
					<div class = "col-25">
						<label for="id">Book ID:</label>
					</div>
					<div class="col-75">
						<input type="text" id="id" name="id" />
					</div>
				</div>


				<div class="row">
					<div class = "col-25">
						<label for="col">Update Column:</label>
					</div>
					<div class="col-75">
					<select id="col" name="col">
						<option value="creator">Creator</option>
						<option value="title">Title</option>
						<option value="type">Type</option>
						<option value="identifier">ISBN</option>
						<option value="date">Date</option>
						<option value="language">Language</option>
						<option value="description">Description</option>
					</select>
					</div>
				</div>

				<div class="row">
					<div class = "col-25">
						<label for="creator">New Value:</label>
					</div>
					<div class="col-75">
						<input type="text" id="value" name="value" />
					</div>
				</div>


				<div class="row">
					<input type="submit" />
				</div>
			</form>
		</div>

		<div class="container">
			<h3>Delete Record</h3>
			<form action="delete.php" method="post">
				<div class="row">
					<div class = "col-25">
						<label for="id">Delete By:</label>
					</div>
					<div class="col-75">
					<select id="id" name="id">
						<option value="id">Book ID</option>
						<option value="creator">Creator</option>
						<option value="title">Title</option>
						<option value="type">Type</option>
						<option value="identifier">ISBN</option>
						<option value="date">Date</option>
						<option value="language">Language</option>
						<option value="description">Description</option>
					</select>
					</div>
				</div>

				<div class="row">
					<div class = "col-25">
						<label for="value">Row(s) with Value:</label>
					</div>
					<div class="col-75">
						<input type="text" id="value" name="value" />
					</div>
				</div>

				<div class="row">
					<input type="submit" />
				</div>
			</form>
		</div>

		<button onClick="display()">Display eBook_MetaData</button>

		<div id="table">
			<table id="mytable">
				<tr>
					<th>ID</th>
					<th>Creator</th>
					<th>Title</th>
					<th>Type</th>
					<th>Identifier (ISBN)</th>
					<th>Date</th>
					<th>Language</th>
					<th>Description</th>
				</tr>
			
			<?php
				$sql = "SELECT * FROM eBook_MetaData;";
				$result = mysqli_query($conn, $sql);
				$resultCheck = mysqli_num_rows($result);

				if ($resultCheck > 0) {
					while ($row = mysqli_fetch_assoc($result)) {
						echo "<tr><td>" . $row["id"] . "</td><td>" . $row["creator"] . "</td><td>" . $row["title"] ."</td><td>" . $row["type"] . "</td><td>" . $row["identifier"] . "</td><td>" . $row["date"] . "</td><td>" . $row["language"] . "</td><td>" . $row["description"] . "</td></tr>";
					}

					echo "</table>";
				} else {
					echo "The database contains no records.";
				}

				$conn->close();	
			?>
			</table>
		</div>
	</div>
	</body>
</html>