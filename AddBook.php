<!DOCTYPE html>
<html>

<head>
	<link rel="stylesheet" href="library.css">
	<script>
    function Return()
    {
        location.href = "homepageadmin.html";
    }
	</script>
</head>

<body>
<br><br><br><br><br><br><br><br><br>
	<center>
		<?php

		$run = true;

		$fields = array('book_title', 'category_id', 'author', 'book_copies', 'book_pub', 'publisher_name', 'isbn', 'copyright_year', 'status');

		foreach($fields as $field){
			if($_GET[$field] == "" or $_GET[$field] == "" or $_GET[$field] == null){
				$run = false;
				echo "Error: " . $field . " field is empty. Please try again \n";
			}

		}

		if($run == true){
			$servername = "remotemysql.com";
			$username = "aJ61sgaQ7x";
			$password = "ZbKbPfvFYZ";
			$dbname = "aJ61sgaQ7x";
			// Create connection
			$conn = new mysqli($servername, $username, $password, $dbname);
			// Check connection
			if ($conn->connect_error) {
				die("Connection failed: " . $conn->connect_error);
			}

			$date = date("d/m/Y h:i");
			

			$send = $conn->prepare("INSERT INTO book(book_title, category_id, author, book_copies, book_pub, publisher_name, isbn, copyright_year, date_added, status) VALUES (?,?,?,?,?,?,?,?,?,?)");
			$send->bind_param("sisisssiss", $_GET['book_title'], $_GET['category_id'], $_GET['author'], $_GET['book_copies'], $_GET['book_pub'], $_GET['publisher_name'], $_GET['isbn'], $_GET['copyright_year'], $date, $_GET['status']);
			$send->execute();

			echo "<h2 style=\"color:green;\">Book has been added successfully!</h2>";

			$conn->close();
		}
	?>
	<br> <br> <br>
    <button class="button-hover col-3" onclick="Return()"> Go Back </button>
    </center>
</body>

</html>