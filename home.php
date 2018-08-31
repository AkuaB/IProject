<?php 
	session_start();
	if(!(session_id()==$_SESSION['sid']))
	{
		header("Location: index.html");
	}
	error_reporting(E_ALL);
	ini_set('error_reporting', E_ALL);
		
	//SQL Declarations
	$servername = "localhost";
	$username = "u15019773";
	$password = "qkldfpzp";
	$database = "u15019773";
	
	//You'll have to change these details for it to work on the server

	$conn = new mysqli($servername,$username,$password,$database);// or die("Unable to connect");

	if($conn ->connect_error)
	{
		die("Connection failed: " . $conn->connect_error);
	}
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8" />
		<meta name="author" content="Akua Afrane-Okese" />
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" 	crossorigin="anonymous"></script>
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.2/css/bootstrap.min.css" integrity="sha384-Smlep5jCw/wG7hdkwQ/Z5nLIefveQRIY9nfy6xoR1uRYBtpZgI6339F5dgvm/e9B" crossorigin="anonymous">
		<link rel="stylesheet" href="CSS/style1.css"/>
		<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins">
		<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Eczar">
		<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Metamorphous">
		<link rel="icon" type="image/png" href="Images/logo.png" />
		<title>File Up Homepage</title> 
	</head>
	
	<body>
		<nav class="navbar navbar-light bg-light">
			<a class="navbar-brand">File Up</a>
			<form class="form-inline" action="home.php" method="post">
				<button class="btn btn-outline-success my-2 my-sm-0" name="logout" type="submit">Logout</button>
			</form>
		</nav>
		<div class="container">
			<div class="row">
				<div class="col-lg-4 col-md-4 col-sm-12">
				</div>
				<div class="col-lg-4 col-md-4 col-sm-12">
					<h1>Welcome <?php echo $_SESSION['name']; ?></h1>
				</div>
				<div class="col-lg-4 col-md-4 col-sm-12">
				</div>
				
			</div>
		</div>
		<div class="container">
			<div class="row">
				<div class="col-md-6 col-sm-6">
					<form action="home.php" method="post"><!--All required otherwise information is not complete in database-->
						
						<div class="form-group">
							<label for="title">Title:</label><br/>
							<input type="text" class="form-control" name="title" id="title" placeholder="Enter Project Name" required/>
						</div>
						<div class="form-group">
							<label for="author ">Description:</label><br/>
							<input type="text" class="form-control" name="descrip" id="author" placeholder="Enter Project Description"/>
						</div>
						
						<label for="genre">Type:</label>
							<select class="form-control" id="typ" name="typ">
								<option>Science</option>
								<option>Maths</option>
								<option>IT</option>
							</select>
						<br/>
						<button type="submit" name="submit" class="btn btn-default">Create Project</button>
						
					</form>
				</div>
			
				<div class="col-md-6 col-sm-6">
				
				
				
<?php 
	if(isset($_POST["logout"]))
	{
		session_unset();
		session_destroy();
		header("Location: index.html");
	}
			
	if(isset($_POST["profile"]))
	{
		session_start();
		header("Location: profile.php");
	}
	$id = $_SESSION['id'];			
	if(isset($_POST["submit"]))
	{			
		$title = $conn -> real_escape_string($_POST["title"]);
		$descrip =   $conn -> real_escape_string($_POST["descrip"]);
		$date =  date("Y-m-d");
		$type =  $_POST["typ"];
		
		$sql = "INSERT INTO tbproject (user_id, title, description, type, date) VALUES ('$id','$title', '$descrip','$type ','$date')";
		if($conn->query($sql) == FALSE) 
		{
			die('Could not enter data: ' . mysql_error());
		}
				
	}
	$usercheck = "SELECT * FROM tbproject WHERE user_id = '$id' ORDER BY proj_id DESC";
	$result = $conn->query($usercheck);
			
	if($result->num_rows > 0)
	{
		echo '<ul class="list-group">';
		while($row = $result->fetch_assoc()) {
			echo '<li class="list-group-item">'.$row["title"]."<br/>" . $row["description"]."<br/>" . $row["type"]."<br/>" ."</li>";
		}
		echo '</ul>';
	}
	else{
		echo "<h4>You are not part of any projects</h4>";
	}
	$conn->close();
?>			</div>
		</div>
	</div>
</body>
</html>