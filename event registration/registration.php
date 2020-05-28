<?php
session_start();
$already="";
$success="";
	if(isset($_POST['pressed']))
	{
		$_SESSION["fname"]=$_POST["fname"];
		$_SESSION["ph"]=$_POST["ph"];
		$_SESSION["email"]=$_POST["email"];
		$_SESSION["reg"]=$_POST["reg"];
		$_SESSION["qty"]=$_POST["qty"];
		$email=$_POST["email"];
		$dat=date('y');
		$a=strtoupper(substr($_POST["fname"],0,3));
		$b=substr($_POST["ph"],0,3);
		$id=$a.$b.$dat;
		$_SESSION["id"]=$id;

		$target="image/".($_FILES['image']['name']);
		move_uploaded_file($_FILES['image']['tmp_name'],$target);
		$_SESSION['image']=$target;
		
		$con=mysqli_connect("localhost","root","","event");

		$query = "SELECT * FROM login WHERE email='$email'";
		$run=mysqli_query($con,$query);
		if(mysqli_num_rows($run)>0)
		{
			$already="Email already registered!!";
		}
		else
			$success="Registered Successfully!!";

		if(mysqli_connect_errno())
		{
			echo "Error to connect the database";
			exit();
		}
		if($already=="")
		{
	    $qry="insert into login(id,name,mobile,email,type,ticket,image,date) values('".$id."','".($_POST["fname"])."','".($_POST["ph"])."','".($_POST["email"])."','".($_POST["reg"])."','".($_POST["qty"])."','".($_FILES["image"]["name"])."','".date("y/m/d")."')";
		if(mysqli_query($con,$qry))
		{
			header("");
		}
		else 
		{
		 	echo mysqli_error($con);
		 	echo "Error to save the data !!";
		}
	}}

?>
<!DOCTYPE html>
<html>
<head>
	<title>Registration</title>
	<link rel="stylesheet" type="text/css" href="css/registration.css">

</head>
<body>
	<div class="regform"><h1>UTSAV 4.0</h1></div>
	<div class="main" >
		<form action=" <?php echo $_SERVER['PHP_SELF']; ?>" enctype="multipart/form-data" method="post">  
						
			<h2 class="name" >Full Name*</h2>
			<input class="fname" type="text" placeholder="Enter your name" name="fname"  pattern="[A-Za-z- ]{1,50}" required>

			<h2 class="name">Mobile No.*</h2>
			<input class="email" placeholder="Enter your valid phone number" type="tel" name="ph" pattern="[0-9]{10}" required>
			
			<h2 class="name">Email*</h2>
			<input class="email" type="text" placeholder="Enter your email id" name="email" pattern="[a-zA-Z0-9]+@[a-zA-Z0-9]+.[a-zA-Z0-9]{1,50}" required>

			<h2 class="name">Type*</h2>
			  
			<select class="option" name="reg" required >

				<option>Self</option>
				<option>Group</option>
				<option>Corporate</option>
				<option>Others</option>
			</select>

			<h2 class="name">Tickets*</h2>
			<input class="quant" type="number" value="1" name="qty" min="1" max="10" placeholder="Number of tickets" required>
			
			<h2 class="name">Upload ID*</h2>
			<input class="email" style="color:#ffffff" type="file" accept="image/*" name="image"  required>
				
			<input type="submit" name="pressed" class="submit" value="REGISTER">
			<br><p class="error"><?php echo $already;?></p>
			<p class="error"><?php echo $success;?></p>
			<br>
			<?php
			if($success=="Registered Successfully!!")
				header("Location:preview.php");
			?>

		</form>
	</div>
</body>
</html>