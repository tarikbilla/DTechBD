<?php include "config.php"; ?>
<?php $msg=""; ?>
<?php 
	if (isset($_GET['msg'])) {
		$msg = $_GET['msg'];
	}
	// insert data in database
	if ($con->error) {
    	die("Connection failed: " . $con->error);
    }
	else {
		if (isset($_POST['save'])) {
			$uname=$_POST['username'];
			$pass=$_POST['password'];
			$address=$_POST['address'];
			$sql = "INSERT INTO users(username, address, password) VALUES ('$uname','$address','$pass')";
			if ($con->query($sql)==true) {
				header('location:index.php?msg=Data Insert Success!');
			}else {
				$msg ='Data Insert Faild.'.$con->error;
			}
		}
	} 
?>

<?php 
	//delete
	if (isset($_GET['delete']) && isset($_GET['id'])) {
		$id = $_GET['id'];
		$sql="DELETE FROM users WHERE id=$id";
		if ($con->query($sql)==true) {
				$msg ='Data Delete Success!';
			}else {
				$msg ='Data Delete Faild.'.$con->error;
			}
	}
 ?>


<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<form action="" method="post">
		<table>
			<tr>
				<td>UserName: </td>
				<td><input type="text" name="username"></td>
			</tr>
			<tr>
				<td>Password: </td>
				<td><input type="password" name="password"></td>
			</tr>
			<tr>
				<td>Address: </td>
				<td><input type="text" name="address"></td>
			</tr>
			<tr>
				<td></td>
				<td><input type="submit" name="save" value="Add Data"></td>
			</tr>
			<tr>
				<td></td>
				<td><?php if (isset($msg)) {echo $msg;} ?></td>
			</tr>
		</table>
		
	</form>

	<form action="search.php" method="get">
		<input type="text" name="s">
		<input type="submit" name="search" value="Search">
	</form>

		<hr>

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
				$sql="SELECT * FROM users";
				$res = $con->query($sql);
				if ($res->num_rows > 0) {
					while ($row = $res->fetch_assoc()):?>

					<tr>
						<td><?php echo $row['id']; ?></td>
						<td><?php echo $row['username']; ?></td>
						<td><?php echo $row['password']; ?></td>
						<td><?php echo $row['address']; ?></td>
						<td><a href="edit.php?id=<?php echo $row['id']; ?>">Edit</a></td>
						<td><a href="?delete=ok&id=<?php echo $row['id']; ?>">Delete</a></td>
					</tr>  

			<?php	endwhile;
				}else{
					echo 'Data Not Found.';
				}
			 ?>
			
		</table>
		



</body>
</html>