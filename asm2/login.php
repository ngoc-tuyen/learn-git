<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
	<link href="styles/style_login.css" rel="stylesheet" type="text/css" />
</head>

<body>
<span style="color: linear-gradient(to right, #fc00ff, #00dbde);"></span>
<div class="loginbox">
<form action="" method="post">
	<table width="301" align="left">
		<tr align="left">
			<td colspan="4">
				<h2>Login</h2>
				<br />
				<span><span style="color: #000000">Don't have account?</span> <a href="register.php">register here</a> <br />
				<br />
				</span>
			</td>
		</tr>
		<tr>
			<td width="81"><b style="color: #000000">UserName</b></td>
			<td colspan="3"><input type="text" name="UserName" required placeholder="UserName" /></td>
		</tr>
		<tr>
			<td><b style="color: #000000">Password</b></td>
			<td colspan="3"><input type="text" name="Password" required placeholder="Password" /></td>
		</tr>
		<tr align="left">
			<td></td>
			<td colspan="4">
			<input type="Submit" name="Login" value="Login" />
			<div class="exit">
			<a href="index.html" >exit</a>
			</div>
		 
			</td>
			
		</tr>
	</table>
</form>
</div>

<?php
	$con = new MySQLi('localhost','root','','shop');
	if (!$con)
	{
		echo "ket noi that bai";
	}
	if(isset($_POST['Login']))
	{
		$UserName = $_POST['UserName'];
		$Password = $_POST['Password'];
		$result = mysqli_query($con,"select * from account where UserName='$UserName' and Password='$Password'");
		$check_login = mysqli_num_rows($result);
		$row_login = mysqli_fetch_array($result);
		if($check_login == 0)
		{
			echo "<script>alter ('Password or UserName is incorrect, please try again!')</script>";
			exit();
		}
		if($check_login > 0)
		{
			echo "<script>alter ('you have logged in successfully!')</script>";
			echo "<script>window.open('index.html','_self')</script>";
		}
	}
?>
</body>
</html>