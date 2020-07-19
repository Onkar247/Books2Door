<html>
<head>
	<meta charset="ISO-8859-1">
 	<title>b2d</title>
  	<link rel="stylesheet" type="text/css" href="style1.css">
  	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  	<script src="web.js"></script>
  	<style type="text/css">
  		nav li {
			  margin-left: 60px;
			  margin-top: 12px;
			  padding:10px;
			}
			
	</style>
</head>
<body>
	<header>
	    <div class="menu">
	      <img src="./images/logo.jpg" class="logo">
	      <nav>
	        <ul>
	            <li><a href="main.php" target="_top">Home</a></li>
	            <li><a href="about_us.html" target="_top">About Us</a></li>
	            <li><a href="contact_us.html" target="_top">Contact Us</a></li>
	        </ul>
	      </nav>
	    </div>
  	</header>
  	<h3><marquee onmouseover="mOver(this)"onmouseout="mOut(this)"style="background-color:rgba(227,223,228,0.6)">New Collections coming soon!!</marquee></h3>
  	<form action="<?php echo $_SERVER['PHP_SELF']; ?>" name="myForm" onsubmit="return validateForm();" align="center"  method="post"><font size="4">
		<h3 style="background-color: rgba(227,223,228,0.6); width: 15%;margin-left:43%;border-radius: 10px">Registration</h3>
		Name:
			<input name="name" type="text" placeholder="Enter your name"><br><br>
		Preferred Books:<br>
		 	<input type="checkbox" name="book[]" value="Motivational">Motivational
		 	<input type="checkbox" name="book[]" value="Comic">Comic
		 	<input type="checkbox" name="book[]" value="Educational">Educational
		 	<input type="checkbox" name="book[]" value="Thriller">Thriller
		 	<input type="checkbox" name="book[]" value="Spiritual">Spiritual<br><br>
		Gender:<br>
			<input type="radio" name="gender" value="Male">Male
			<input type="radio" name="gender" value="Female">Female
			<input type="radio" name="gender" value="Other">Other<br><br>	
		DOB:
			<input name="date" type="date" ><br><br>
		Phone No:
			<input name="phone"type="tel" placeholder="Enter your mobile number" ><br><br>
		Email Id:
			<input name="email" type="email" placeholder="Enter your email-id" ><br><br>
		Address:
			<input name="address" type="text" placeholder="Enter your address" ><br><br>
		Username:
			<input name="username" type="text" placeholder="Enter your username" ><br><br>
		Password:
			<input name="pwd1" type="password" placeholder="Enter your password" ><br><br>
		Re-Password:
			<input name="pwd2" type="password" placeholder="Re-enter your password"><br><br>
		<input type="submit"  value="Submit" name='sub'> <input type="reset" value="Reset">
	</form>
	<br><br><br>
</body>
</html>

<?php 
	session_start();	
	if(isset($_POST['sub']))
	{
		$con=mysqli_connect("localhost","root","","b2d");
		if(!$con)
		{
			die('Could not connect:'.mysqli_connect_error());
		}
		$b1="";
		$b = array();
		$n=$_POST['name'];
		$bk=$_POST['book'];
		$g=$_POST['gender'];
		$d=$_POST['date'];
		$ph=$_POST['phone'];
		$em=$_POST['email'];
		$adr=$_POST['address'];
		$un=$_POST['username'];
		$pwd=$_POST['pwd1'];
		$pwdhash=password_hash($pwd, PASSWORD_DEFAULT);
		$_SESSION["username"] = $un;
		foreach ($bk as $bo) 
		{
			
			array_push($b, $bo);
			$b1=implode(",", $b);
		}	
		
		echo "Hello ".$n; 
		$sql="INSERT INTO details VALUES('$n','$b1','$g','$d','$ph','$em','$adr','$un','$pwdhash')"; 
		if(!mysqli_query($con,$sql))
		{
			die('Error:'.mysqli_error($con));
		}
		$sql="INSERT INTO cart VALUES('$n','$un','null','0')";
		if(!mysqli_query($con,$sql))
		{
			die('Error:'.mysqli_error($con));
		}
		mysqli_close($con);	
		header("Location:home.php");
		exit;
	}

?>

