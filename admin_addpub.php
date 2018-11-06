<?php
	session_start();
	require_once "./functions/admin.php";
	$title = "Add Publisher";
	require "./template/login.php";
	require "./functions/database_functions.php";
	$conn = db_connect();

	if(isset($_POST['add'])){
		$publisher = trim($_POST['publisher']);
		$publisher = mysqli_real_escape_string($conn, $publisher);

		$publisher_name = trim($_POST['publisher_name']);
		$publisher_name = mysqli_real_escape_string($conn, $publisher_name);

		$publisher_address = trim($_POST['publisher_address']);
		$publisher_address = mysqli_real_escape_string($conn, $publisher_address);

		// find publisher and return pubid
		// if publisher is not in db, create new
		$findPub = "SELECT * FROM publisher WHERE publisher_name = '$publisher'";
		$findResult = mysqli_query($conn, $findPub);
		if(!$findResult){
			// insert into publisher table and return id
			$insertPub = "INSERT INTO publisher(publisher_name) VALUES ('$publisher')";
			$insertResult = mysqli_query($conn, $insertPub);
			if(!$insertResult){
				echo "Can't add new publisher " . mysqli_error($conn);
				exit;
			}
			$publisherid = mysql_insert_id($conn);
		} else {
			$row = mysqli_fetch_assoc($findResult);
			$publisherid = $row['publisherid'];
		}


		$query = "INSERT INTO publisher VALUES ('" . $publisherid . "', '" . $publisher_name ."', '" . $publisher_address ."')";
		$result = mysqli_query($conn, $query);
		if(!$result){
			echo "Can't add new data " . mysqli_error($conn);
			exit;
		} else {
			header("Location: admin_book.php");
		}
	}

?>
	<h2 align="center">Add Publisher</h2>
	<form method="post" action="admin_addpub.php" enctype="multipart/form-data">
		<table class="table">
			<tr>
				<th>Publisher Name:</th>
				<td><input type="text" name="publisher_name" required></td>
			</tr>
			<tr>
				<th>Publisher Address:</th>
				<td><input type="text" name="publisher_address" required></td>
			</tr>

		</table>
		<input type="submit" name="add" value="Add new book" class="btn btn-primary">
		<input type="reset" value="Reset" class="btn btn-warning">
		<a href="admin_book.php" class="btn btn-danger">Cancel</a>
	</form>
	<br/>
<?php
	if(isset($conn)) {mysqli_close($conn);}
	require_once "./template/footer.php";
?>