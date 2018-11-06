<?php
	session_start();
	require_once "./functions/admin.php";
	$title = "List book";
	require_once "./template/login.php"; 
	require_once "./functions/database_functions.php";
	$conn = db_connect();
	$result = getPublisher($conn);
?>
	<a href="admin_book.php" class="btn btn-primary">Back to books</a>
	<table class="table hoverTable" style="margin-top: 20px">
		<tr>
			<th>Publisher Name</th>
			<th>Publisher Address</th>
			
			<th>&nbsp;</th>
			<th>&nbsp;</th>
		</tr>
		<?php while($row = mysqli_fetch_assoc($result)){ ?>
		<tr>

			<td><?php echo $row['publisher_name']; ?></td>
			<td><?php echo $row['publisher_address']; ?></td>
				<!-- 
				<td><a href="admin_edit.php?order=<?php echo $row['id']; ?>">Edit</a></td> -->
			<td><a href="admin_delpub.php?pub=<?php echo $row['publisherid']; ?>" class="btn btn-danger">Delete</a></td>
		</tr>
		<?php } ?>
	</table>

<?php
	if(isset($conn)) {mysqli_close($conn);}
	require_once "./template/footer.php";
?>