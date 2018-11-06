<?php
	session_start();
	require_once "./functions/admin.php";
	$title = "List book";
	require_once "./template/login.php"; 
	require_once "./functions/database_functions.php";
	$conn = db_connect();
	$result = getOrder($conn);
?>	
	<link rel="stylesheet" href="bootstrap/css/style.css">

	<a href="admin_book.php" class="btn btn-primary" style="margin-top: 5px;">Back to books</a>
	<h2 align="center">Customer's Order</h2>
	<table class="table hoverTable" style="margin-top: 20px">
		<tr>
			<th>Date</th>
			<th>Order ID</th>
			<th>Book Title</th>
			<th>Quantity</th>
			<th>Amount</th>
			<th>Customer FullName</th>
			<th>Customer Address</th>
			<th>Contact Number</th>
			
			<th>&nbsp;</th>
			<th>&nbsp;</th>
		</tr>
		<?php while($row = mysqli_fetch_assoc($result)){ ?>
		<tr>
			<!-- <td><?php echo $row['id']; ?></td> -->
			<td><?php echo $row['date']; ?></td>
			<td><?php echo $row['orderid']; ?></td>
			<td><?php echo $row['book_title']; ?></td>
			<td><?php echo $row['quantity']; ?></td>
			<td><?php echo $row['amount']; ?></td>
			<td><?php echo $row['ship_name']; ?></td>
			<td><?php echo $row['ship_address']; ?></td>
			<td><?php echo $row['ship_zip_code']; ?></td>
				<!-- 
				<td><a href="admin_edit.php?order=<?php echo $row['id']; ?>">Edit</a></td> -->
			<td><a href="admin_delcustomer.php?order=<?php echo $row['orderid']; ?>" class="btn btn-danger">Delete</a></td>
		</tr>
		<?php } ?>
	</table>
	

<?php
	if(isset($conn)) {mysqli_close($conn);}
	require_once "./template/footer.php";
?>