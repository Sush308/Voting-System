<?php
	 include("connect.php");
	// $connect = mysqli_connect("localhost", "root","","voting") or die("Unable to connect");


	$name = $_POST['name'];
	$mobile = $_POST['mobile'];
	$password = $_POST['password'];
	$cpassword = $_POST['cpassword'];
	$address = $_POST['address'];
	$image = $_FILES['photo']['name'];
	$tmp_name = $_FILES['photo']['tmp_name'];
	$role = $_POST['role'];
	// $status = 0;
	// $votes = 0;

	if ($password == $cpassword) {
		// move_uploaded_file($tmp_name, "../uploads/".$image);
		$insert = mysqli_query($connect, "INSERT INTO user (name, mobile, password, address, photo, role, status, votes) VALUES ('$name', '$mobile', '$password', '$address', '../uploads/$image', '$role', 0, 0)");
		if ($insert && move_uploaded_file($tmp_name, "../uploads/".$image)) {
			echo '
			<script>
				alert("Registration Successful!!!");
				window.location = "../";
			</script>';
		}
		else{
			echo '
			<script>
				alert("Some error occured!");
				window.location = "../routes/register.html"; 
			</script>';
		}
	}
	else{
		echo '
			<script>
				alert("password and confirm password does not match!");
				window.location = "../routes/register.html";
			</script>';
	}


?>
