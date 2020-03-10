<?php include 'config.php'; ?>

<?php 
	if (isset($_GET['id'])) {
		$id = $_GET['id'];
		$sql = "SELECT * FROM users WHERE id=$id";
		$res = $con->query($sql);

		if ($res->num_rows > 0) {
			while ($row = $res->fetch_assoc()){
				$id = $row['id'];
				$un = $row['username'];
				$pas = $row['password'];
				$addr = $row['address'];
			}
		}
	}else{
		header("location:index.php");
	}


	// Update
	if (isset($_GET['update'])) {
		$id=$_GET['id'];
		$uname=$_GET['username'];
		$pass=$_GET['password'];
		$address=$_GET['address'];

		$sql = "UPDATE users SET username='$uname',password='$pass', address='$address' WHERE id=$id";
		if ($con->query($sql)==true) {
			header("location:index.php?msg=Data Update Success!");
		}else {
			$msg = 'Data Update Faild!'.$con->error;
		}
	}

 ?>


<form action="" method="get">

	<table>
		<tr>
			<td>id: </td>
			<td><input type="text" name="id" value="<?php echo $id?>" readonly></td>
		</tr>
		<tr>
			<td>UserName: </td>
			<td><input type="text" name="username" value="<?php echo $un?>"></td>
		</tr>
		<tr>
			<td>Password: </td>
			<td><input type="text" name="password" value="<?php echo $pas?>"></td>
		</tr>
		<tr>
			<td>Address: </td>
			<td><input type="text" name="address" value="<?php echo $addr?>"></td>
		</tr>
		<tr>
			<td></td>
			<td><input type="submit" name="update" value="Update Data"></td>
		</tr>
		<tr>
			<td></td>
			<td><?php if (isset($msg)) {echo $msg;} ?></td>
		</tr>
	</table>
		
</form>