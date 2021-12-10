<?php
	$name = $_POST['name'];
	$email = $_POST['email'];
	$phone = $_POST['phone'];
	$message = $_POST['message'];

	// Database connection
	$conn = new mysqli('localhost','root','','test');
	if($conn->connect_error){
		echo "$conn->connect_error";
		die("Connection Failed : ". $conn->connect_error);
	} else {
		$stmt = $conn->prepare("insert into contact(name, email, phone, message) values(?, ?, ?, ?)");
		$stmt->bind_param("ssss",$name, $email, $phone, $message);
		$execval = $stmt->execute();
		echo $execval;
		echo "message sent successfully...";
		$stmt->close();
		$conn->close();
	}
?>