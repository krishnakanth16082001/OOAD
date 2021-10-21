

<?php
	$locality=$_POST['locality'];
$date=$_POST['date'];
$time=$_POST['time'];
$email=$_POST['email'];
$conn = new mysqli('localhost','root','','onine_passport');
	if($conn->connect_error){
		echo "$conn->connect_error";
		die("Connection Failed : ". $conn->connect_error);
	} else {
		$stmt = $conn->prepare("insert into appointment_details(
			locality,date,time,email) values(?,?,?,?)");
		$stmt->bind_param("ssss", $locality,$date,$time,$email);
		$execval = $stmt->execute();
		echo '<script type="text/javascript">
					alert("Data added Successfuly");
				window.location = "temp.php";
			</script>'; 
		$stmt->close();
		$conn->close();
	}
?>