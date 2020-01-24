<html>
<head>
  	<meta charset="ISO-8859-1">
  	<title>Books2Door</title>
  	<link rel="stylesheet" type="text/css" href="style1.css">
  	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  	<script src="web.js"></script>
</head>
<body>
	<header>
	    <div class="menu">
	      <img src="logo.jpg" class="logo">
	      <nav>
	        <ul>
	            <li><a href="home.php" target="_top">Home</a></li>
              <li><a href="booklist.php" target="_top">List Of Books</a></li>
              <li><a href="about_log.html" target="_top">About Us</a></li>
              <li><a href="contact_log.html" target="_top">Contact Us</a></li>
               <li><a href="cart.php"><i class="fa fa-shopping-cart" style="font-size:2em"></i></a></li>
              <li><a href="main.php">Logout</a></li>
	        </ul>
	      </nav>
	    </div>
  	</header>
  	<h3><marquee onmouseover="mOver(this)"onmouseout="mOut(this)"style="background-color:rgba(227,223,228,0.6)">New Collections coming soon!!</marquee></h3>
  	<!-- <form class="search">
    	<button type="submit" style="float:right;"><i class="fa fa-search"></i></button>
      	<input type="text" placeholder="Search.." style="float:right;">
  	</form> -->

  <?php 
    session_start();
    $con=mysqli_connect("localhost","root","","b2d");
    if(!$con)
    { 
      die('Could not connect:'.mysqli_connect_error());
    }
    $username=$_SESSION['username'];
    $result = mysqli_query($con,"SELECT * FROM details WHERE username='$username'");
    $row  = mysqli_fetch_array($result);
    echo '<br><br><h2 style="font-family:Times New Roman;margin-left:2vw;margin-top:0%;padding-top:0%;">Hello, '.$row["Name"].'</h2>';
  ?>

  <div class="slideshow-container" align="center" >

  <div class="mySlides fade">
 
    <img src="h1.jpg" >
    
  </div>

  <div class="mySlides fade">
   
    <img src="h2.jpg">
    
  </div>

  <div class="mySlides fade">
   
    <img src="h3.jpg">
  
  </div>
  </div>
  
  <div style="text-align:center">
    <span class="dot"></span> 
    <span class="dot"></span> 
    <span class="dot"></span> 
  </div>

  <script>
  var slideIndex = 0;
  showSlides();

  function showSlides() {
    var i;
    var slides = document.getElementsByClassName("mySlides");
    var dots = document.getElementsByClassName("dot");
    for (i = 0; i < slides.length; i++) {
      slides[i].style.display = "none";  
    }
    slideIndex++;
    if (slideIndex > slides.length) {slideIndex = 1}    
    for (i = 0; i < dots.length; i++) {
      dots[i].className = dots[i].className.replace(" active", "");
    }
    slides[slideIndex-1].style.display = "block";  
    dots[slideIndex-1].className += " active";
    setTimeout(showSlides, 3000); // Change image every 2 seconds
  }
  </script>

  	
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
      		<div class="dinf">A Brazen Collection To Choose From, Try New Genre’s And New Authors</div>
    	</div>
    	<div class="det">
      		<div class="dname">Choice</div>
      		<div class="dinf">Read In Your Mother Tongue, Books Available In 6 + Languages</div>
    	</div>
  	</div>

</body>
</html>
