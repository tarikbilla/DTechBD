<?php include 'config.php'; ?>

	<form action="" method="get">
		<input type="text" name="s">
		<input type="submit" name="search" value="Search">
	</form>

<table border="1" width="500">
	<tr>
		<th>Id</th>
		<th>UserName</th>
		<th>Password</th>
		<th>Address</th>
		<th>Edit</th>
		<th>Delete</th>
	</tr>
	<?php 
	if (isset($_GET['search'])) {
			$s = $_GET['s'];
			$sql="SELECT * FROM users WHERE username like '%$s%'";
			$res = $con->query($sql);
			if ($res->num_rows > 0) {
					while ($row = $res->fetch_assoc()):?>

			<tr>
				<td><?php echo $row['id']; ?></td>
				<td><?php echo $row['username']; ?></td>
				<td><?php echo $row['password']; ?></td>
				<td><?php echo $row['address']; ?></td>
				<td><a href="edit.php?id=<?php echo $row['id']; ?>">Edit</a></td>
				<td><a href="index.php?delete=ok&id=<?php echo $row['id']; ?>">Delete</a></td>
			</tr>  

	<?php	endwhile;
				}else{
					echo 'Data Not Found.';
				}

			}else{
				header('location:index.php');
			}

			 ?>
			
			
</table>
		