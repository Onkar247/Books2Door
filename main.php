<?php
	session_start();
	$message1="";
	$message2="";
	if(count($_POST)>0) 
	{
	 	$con=mysqli_connect("localhost","root","","b2d");
		if(!$con)
		{
			die('Could not connect:'.mysqli_connect_error());
		}
		$username=$_POST['usr']; 
		$password=$_POST['pwd1'];
		$result = mysqli_query($con,"SELECT * FROM details WHERE username='$username'");
		$row  = mysqli_fetch_array($result);
		if(is_array($row)) 
		{
			if(password_verify($password, $row['pwd']))
			{
				$_SESSION['username'] = $row['username'];
				$_SESSION['name'] = $row['name'];			
				header("Location: home.php");
			}
			else 
				$message1 = "Invalid Password!";
		} 
		else 
		{
			$message2 = "Invalid Username!";
		}
	}
?>
<html>
	<head>
		<meta charset="ISO-8859-1">
	  	<title>b2d</title>
	  	<link rel="stylesheet" type="text/css" href="style1.css">
	  	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	  	<script src="web.js"></script>
	  	<style type="text/css">
	  		.err{
	  			font-size:0.3em;
	  		}
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
		      <img src="logo.jpg" class="logo">
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
	  <!-- 	<form class="search">
	    	<button type="submit" style="float:right;"><div class="fa fa-search"></div></button>
	      	<input type="text" placeholder="Search.." style="float:right;">
	  	</form> -->
	  	<!-- <?php 
		  	// if(!empty($_SESSION))
		  	// {
		  	// 	session_destroy();
		  	// }
	  	?> -->
	  	<div class="login">
	    	<form name="main" align="center" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
	      		<div class="logname">Log In</div>
	      		<div class="text-box">
		       		<i class="fa fa-user"></i>
		        	<input type="text" name="usr" placeholder="Username">
			        	<span class="err">
			        		<?php if(!empty($message2)&&!empty($_POST['usr'])){ echo $message2 ; } ?>		
			        	</span>
		        	<br>
		        	<i class="fa fa-lock"></i>
		        	<input type="password" name="pwd1" placeholder="Password">
		        		<span class="err">
		        			<?php if(!empty($message1)&& !empty($_POST['pwd1'])){ echo $message1 ; } ?>		
		        		</span>
		        	<br>
	      		</div>
	      		<div class="sign">
	        		<input type="submit" name="submit" class="button1" value="SIGN IN" onsubmit="validate();"> 
	      		</div><br>
	      	</form>
	      		<span class="reg">
	        		<button class="button2"><a href="form.php" target="_top">REGISTER</a></button>
	      		</span>
	    		  	</div>
	  	<div class="details">
	    	<div class="det">
	      		<div class="dname">Cost</div>
	      		<div class="dinf">Pocket Friendly Plans, Free Online books and refundable money</div>
	    	</div>
	    	<div class="det">
	      		<div class="dname">Convenience</div>
	      		<div class="dinf">The Whole World Of Books At Your Door, Doorstep Delivery And PickUp Services</div>
	    	</div>
	    	<div class="det">
	      		<div class="dname">Collection</div>
	      		<div class="dinf">A Brazen Collection To Choose From, Try New Genre's And New Authors</div>
	    	</div>
	    	<div class="det">
	      		<div class="dname">Choice</div>
	      		<div class="dinf">Read In Your Mother Tongue, Books Available In 6 + Languages</div>
	    	</div>
	  	</div>
	</body>
</html>
