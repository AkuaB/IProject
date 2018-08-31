<html>
<head>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"></script>
</head>
<body>
<?php
	$fname = $_POST["fname"];
	$lname = $_POST["lname"];
	$pass = $_POST["pass1"];
	$date = $_POST["date"];
	$email = $_POST["email1"];
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
	
	/*Add new user*/
	$sql = "INSERT INTO tbusers (name,surname,password,email,birthday) VALUES ('$fname','$lname','$pass','$email','$date')";
	if($result = $conn->query($sql))
	{
		$_SESSION['sid']=session_id();
		header("Location:home.php");
		//echo "<div class='alert alert-primary' role='alert'>The account has been created</div>";
	}
	
	else
	{
		header("Location:index.html");
		//echo "<div class='alert alert-danger' role='alert'>Insert failed</div>";
	}
?>
</body>
</html>