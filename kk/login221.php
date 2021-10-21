<?php
	
	$email = $_POST['email'];
	$password = $_POST['password'];
	$conn = new mysqli('localhost','root','','onine_passport');
	if($conn->connect_error){
		echo "$conn->connect_error";
		die("Connection Failed : ". $conn->connect_error);
	} else {
		$stmt = $conn->prepare("select * from register where email= ?");
		$stmt->bind_param("s", $email);
		$stmt->execute();
		$stmt_result = $stmt->get_result();
		if($stmt_result->num_rows > 0 ){
			$data = $stmt_result->fetch_assoc();
            if ($data['pasword']==$password ) {
            
            	
echo '<script language="Javascript">
	alert("Logged In successfully ");
	window.location=("temp1.php");</script>';
            }
            else{
            	echo  '<script language="Javascript">
	alert("Invalid Username Or Password ");
	window.location=("login2.php");
	</script>';
            }
        }
else {
	echo"invalid";
}
}

		
?>