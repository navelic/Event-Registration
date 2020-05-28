<?php
$str="";
if(isset($_POST['pressed']))
{
    $id=$_POST["userid"];
    $pass=$_POST["pass"];
    $con=mysqli_connect("localhost","root","","event");
    $que="SELECT * FROM admin WHERE id='$id'";
    $run=mysqli_query($con,$que);
    if(mysqli_num_rows($run)>0)
    {
        $row = mysqli_fetch_array($run);
        if($row['pass']==$pass)
        {
            header("Location:admin2.php");
        }
        else
        {
            $str="Wrong Password!!";
        }
    }
    else
    {
        $str="User ID does not exist!!";
    }
}
?>
<!DOCTYPE html>
<head>
    
<link rel="stylesheet" type="text/css" href="css/adminlogin.css">
<title>Admin Login</title>
</head>
<body>
    <div class="regform"><h1>ADMIN LOGIN</h1><br>
      <h3>(for UTSAV 4.0)</h3><br><br><br>
<form  action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
<h3>Username:</h3>
<input class="inp" type="text" name='userid' placeholder="User ID.." pattern="[A-Za-z0-9]{7}" required>
<br><br><br>
<h3>Password:</h3>
<input class="inp" type="password" name='pass' placeholder="Enter Password.." required>
<br><br>
<p><?php
    if($str!="")
    echo $str;
?></p>
<br><br>
<button name="pressed" class="inp">LOGIN</button>

</form>
</div>

</body>
</html>