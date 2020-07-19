<html>
<head>
  	<meta charset="ISO-8859-1">
  	<title>b2d</title>
  	<link rel="stylesheet" type="text/css" href="style1.css">
  	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  	<script type="text/javascript">
  		function orderform()
		{
 		 	alert("Order Placed Successfully!!");
		}
  	</script>
<style>
.modal {
  display: none; /* Hidden by default */
  position: fixed; /* Stay in place */
  z-index: 1; /* Sit on top */
  left: 0;
  top: 1;
  width: 100%; /* Full width */
  height: 100%; /* Full height */
  overflow: auto; /* Enable scroll if needed */
  background-color: rgb(0,0,0); /* Fallback color */
  background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
  -webkit-animation-name: fadeIn; /* Fade in the background */
  -webkit-animation-duration: 0.4s;
  animation-name: fadeIn;
  animation-duration: 0.4s
}
.modal-content {
  position:relative;
  top:1;
  bottom: 1;
  left:1;
  right:1;
  background-color: #fefefe;
  width: 50%;
  -webkit-animation-name: slideIn;
  -webkit-animation-duration: 0.4s;
  animation-name: slideIn;
  animation-duration: 0.4s
}
.close {
  color: white;
  float: right;
  font-size: 28px;
  font-weight: bold;
}
.close:hover,
.close:focus {
  color: #000;
  text-decoration: none;
  cursor: pointer;
}
.modal-header {
  padding: 2px 16px;
  background-color: #5cb85c;
  color: white;
}
.modal-body {padding: 2px 16px;}
.modal-footer {
  padding: 2px 16px;
  background-color: #5cb85c;
  color: white;
}
@keyframes slideIn {
  from {bottom: -300px; opacity: 0}
  to {bottom: 0; opacity: 1}
}
@keyframes fadeIn {
  from {opacity: 0} 
  to {opacity: 1}
}
</style>
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
	$status="";
	if (isset($_POST['action']) && $_POST['action']=="remove")
	{
		if(!empty($_SESSION["shopping_cart"])) 
		{
			foreach($_SESSION["shopping_cart"] as $key => $value) 
			{
				if($_POST["code"] == $key)
				{
					unset($_SESSION["shopping_cart"][$key]);
					$status = "<div class='box' style='color:black;'>
					Product is removed from your cart!</div>";
				}
				if(empty($_SESSION["shopping_cart"]))
				{
					unset($_SESSION["shopping_cart"]);
				}
			}		
		}
	}

	if (isset($_POST['action']) && $_POST['action']=="change")
	{
	  	foreach($_SESSION["shopping_cart"] as &$value)
	 	{
	    	if($value['code'] === $_POST["code"])
	    	{
	    	    $value['quantity'] = $_POST["quantity"];
	    	    break; 
	  		}
		}
	}

	if(!empty($_SESSION["shopping_cart"])) 
	{
		$cart_count = count(array_keys($_SESSION["shopping_cart"]));
	}
?>

<div class="cart">
<?php
	if(isset($_SESSION["shopping_cart"]))
	{
	    $total_price = 0;
?>

<table border="1" class="table" align="center"  bgcolor="#60D2F9">
<tbody>
<tr>
	<th>IMAGE</th>
	<th>ITEM NAME</th>
	<th>QUANTITY</th>
	<th>UNIT PRICE</th>
	<th>ITEMS TOTAL</th>
</tr>	

<?php		
	foreach ($_SESSION["shopping_cart"] as $product)
	{
?>

<tr>
	<td><img src='<?php echo $product["image"]; ?>' width="100" height="100" /></td>
	<td><span id="text"><?php echo $product["name"]; ?></span><br />
	<form method='post' action=''>
		<input type='hidden' name='code' value="<?php echo $product["code"]; ?>" />
		<input type='hidden' name='action' value="remove" />
		<button type='submit' class='remove'>Remove Item</button>
	</form>
	</td>
	<td>
	<form method='post' action=''>
		<input type='hidden' name='code' value="<?php echo $product["code"]; ?>" />
		<input type='hidden' name='action' value="change" />
		<select name='quantity' class='quantity' onchange="this.form.submit()">
			<option <?php if($product["quantity"]==1) echo "selected";?> value="1">1</option>
			<option <?php if($product["quantity"]==2) echo "selected";?> value="2">2</option>
			<option <?php if($product["quantity"]==3) echo "selected";?> value="3">3</option>
			<option <?php if($product["quantity"]==4) echo "selected";?> value="4">4</option>
			<option <?php if($product["quantity"]==5) echo "selected";?> value="5">5</option>
		</select>
	</form>
	</td>
	<td><?php echo "Rs ".$product["price"]; ?></td>
	<td><?php echo "Rs ".$product["price"]*$product["quantity"]; ?></td>
</tr>

<?php
	$total_price += ($product["price"]*$product["quantity"]);
	}
?>

<tr>
	<td colspan="5" align="right">
		<strong>TOTAL: <?php echo "Rs ".$total_price; ?></strong>
	</td>
</tr>
</tbody>
</table><br>		
 <form action="<?php echo $_SERVER['PHP_SELF']; ?>" onsubmit="return orderform();" align="center"  method="post">
  <button class='placeo' type="submit" name="order">Place Order</button>
</form>
<?php
	}
	else
	{
		echo "<h3>Your cart is empty!</h3>";
	}
	if(isset($_POST['order']))
	{
		$con = mysqli_connect("localhost","root","","b2d");
		if (mysqli_connect_errno()){
			echo "Failed to connect to MySQL: " . mysqli_connect_error();
			die();
		}
		$usr=$_SESSION["username"];
		$pr=array();
		foreach ($_SESSION["shopping_cart"] as $product) 
		{
			array_push($pr, $product["name"]);
			$pdt=implode(",", $pr);
		}	
		global $pdt,$total_price;
		$sql="UPDATE cart SET products='$pdt',amount='$total_price' WHERE username='$usr'";
		if(!mysqli_query($con,$sql))
		{
			die('Error:'.mysqli_error($con));
		}
	}
?>

</div>

<div style="clear:both;"></div>

<div class="message_box" style="margin:10px 0px;">

<?php echo $status; ?>


</body>
</html>
