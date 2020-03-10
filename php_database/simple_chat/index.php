<?php session_start(); ?>
<?php include "db.php"; ?>
<?php include "chat.php"; ?>
<?php 
	if (isset($_POST['send'])) {
		msg_send($con,$_POST['message'],$_SESSION['uid']);
	}
 ?>
 <?php 
	if (isset($_POST['csave'])) {
		$_SESSION['uid']=$_POST['uid'];
	}
 ?>
<?php echo $_SESSION['uid']; ?>

<!DOCTYPE html>
<html>
<head>
	<title>Simple Chat</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<form action="" method="post">
		<input type="text" name="uid">
		<input type="submit" name="csave">
	</form>


	<div class="chat">
		<div class="msg-show">
			<?php msg_read($con,$_SESSION['uid']); ?>
		</div>

		<div class="msg-send">
			<form action="" method="post">
				<textarea id="" cols="" rows="" name="message"></textarea>
				<input type="submit" value="send" name="send">
			</form>
		</div>
	</div>

</body>
</html>