<?php date_default_timezone_set("Asia/Dhaka"); ?>
<?php 
	function msg_send($con,$msg,$sid){
		$t = date("h/m/i");
		$sql = "INSERT INTO chat(msg, msg_time,sender_id) VALUES ('$msg','$t','$sid')";
		$con->query($sql);
	}


	function msg_read($con,$uid){
		$sql="SELECT * FROM chat";
			$res = $con->query($sql);
			if ($res->num_rows > 0) {
					while ($row = $res->fetch_assoc()){
						if ($row['sender_id']==$uid) {
							echo '<div class="msg-right"><span>'.$row['msg'].'</span></div>';
						}else{
							echo '<div class="msg-left"><span>'.$row['msg'].'</span></div>';
						}
				}
		}
	}

 ?>