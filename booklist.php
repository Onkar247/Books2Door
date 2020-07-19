<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<script src="web.js"></script>
    <link rel="stylesheet" href="style1.css" type="text/css" >
</head>
<body>
	<header>
	    <div class="menu">
	      <img src="./images/logo.jpg" class="logo">
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

<?php
session_start();
 $con = mysqli_connect("localhost","root","","b2d");
    if (mysqli_connect_errno()){
 echo "Failed to connect to MySQL: " . mysqli_connect_error();
 die();
 }
$status="";
if (isset($_POST['code']) && $_POST['code']!=""){
$code = $_POST['code'];
$result = mysqli_query($con,"SELECT * FROM `products` WHERE `code`='$code'");
$row = mysqli_fetch_assoc($result);
$name = $row['name'];
$code = $row['code'];
$price = $row['price'];
$image = $row['image'];

$cartArray = array(
	$code=>array(
	'name'=>$name,
	'code'=>$code,
	'price'=>$price,
	'quantity'=>1,
	'image'=>$image)
);

if(empty($_SESSION["shopping_cart"])) {
	$_SESSION["shopping_cart"] = $cartArray;
	$status = "<div class='box'>Product is added to your cart!</div>";
}else{
	$array_keys = array_keys($_SESSION["shopping_cart"]);
	if(in_array($code,$array_keys)) {
		$status = "<div class='box' style='color:red;'>
		Product is already added to your cart!</div>";	
	} else {
	$_SESSION["shopping_cart"] = array_merge($_SESSION["shopping_cart"],$cartArray);
	$status = "<div class='box'>Product is added to your cart!</div>";
	}

	}
}

if(!empty($_SESSION["shopping_cart"])) {
$cart_count = count(array_keys($_SESSION["shopping_cart"]));
}

$result = mysqli_query($con,"SELECT * FROM `products`");
while($row = mysqli_fetch_assoc($result)){
		echo "<div class='product_wrapper'>
				  <form method='post' action=''>
				  <input type='hidden' name='code' value=".$row['code']." />
				  <div class='image'><img src='".$row['image']."' /></div>
				  <div class='name'>".$row['name']."</div>
			   	  <div class='price'>Rs ".$row['price']."</div>
				  <button type='submit' class='buy'>Add to cart</button>
				  </form>
		   	  </div>";
        }
mysqli_close($con);
?>
<div style="clear:both;"></div>
<div class="message_box" style="margin:10px 0px;">
<?php echo $status; ?>
</body>
</html>
