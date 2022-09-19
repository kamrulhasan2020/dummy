<?php
$sname = $_POST['sname'];
$fname = $_POST['fname'];
$mname = $_POST['mname'];
$address = $_POST['address'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$fav_sub = $_POST['fav_sub'];
$area = $_POST['area'];
$gpa = $_POST['gpa'];

$conn = new mysqli('localhost','root','','student') or die("Unable to connect");
	if($conn->connect_error){
		echo "$conn->connect_error";
		die("Connection Failed : ". $conn->connect_error);
	} else {
		$stmt = $conn->prepare("insert into registration(sname, fname, mname, address, email, phone, fav_sub, area, gpa) values(?, ?, ?, ?, ?, ?, ?, ?, ?)");
		$stmt->bind_param("sssssssss", $sname, $fname, $mname, $address, $email, $phone, $fav_sub, $area, $gp);
		$execval = $stmt->execute();
		echo $execval;
		echo "Registration successfully...";
		$stmt->close();
		$conn->close();
	}
?>
