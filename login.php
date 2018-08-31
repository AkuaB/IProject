<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"></script>
</head>
<body>
<?php
	session_start();
	$pass = $_POST["pass"];
	$email = $_POST["email"];
	//echo $pass." ".$email;
	
	/*Database Connection Variables*/
	$servername = "localhost";
	$username = "u15019773";
	$password = "qkldfpzp";
	$database = "u15019773";

	/*Create connection*/
	$conn = new mysqli($servername,$username,$password,$database);

	/*Error Check: Connection*/
	if($conn->connect_errno)
	{die("Connection failed: ".$conn->connect_error);}
	
	/*Check if signupee is user*/
	$sql = "SELECT * FROM tbusers WHERE password = '$pass' AND email = '$email'";
	if($result = $conn->query($sql)) /*Successful query*/
	{
		if($result->num_rows > 0) /*Real data in database*/
		{
			if($row = $result->fetch_assoc())
			{
				$_SESSION['sid']=session_id();
				$_SESSION['id'] = $row["user_id"];
				$_SESSION['name'] = $row["name"];
			}
			header("Location:home.php");
		}
		else
		{echo "<div class='alert alert-danger' role='alert'>You are not registered on this site!</div>";}
	}
	
	else
	{echo "Error: Not registered";}
	
?>
</body>
</html>
