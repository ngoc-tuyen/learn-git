<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
	<link href="styles/style_login.css" rel="stylesheet" type="text/css" />
</head>

<body>
<div class="register_box">
  <form method = "post" action="" enctype="multipart/form-data">
    <table width="100%" height="403" align="left">
      <tr align="left">
        <td colspan="4"><h2>Register.</h2>
          <br />
          <span> <span style="color: #000000">Already have account?</span> <a href="login.php">Login Now.</a><br />
          <br />
          </span></td>
      </tr>
      <tr>
        <td width="15%"><b style="color: #000000">UserName:</b></td>
        <td colspan="3"><input type="text" name="Username" required placeholder="UserName" /></td>
      </tr>
      <tr>
        <td width="15%"><b style="color: #000000">Password:</b></td>
        <td colspan="3"><input type="password" id="password_confirm1" name="Password" required placeholder="Password" /></td>
      </tr>
      <tr>
        <td width="15%"><b style="color: #000000">Confirm Password:</b></td>
        <td colspan="3"><input type="password" id="password_confirm2" name="confirm_password" required placeholder="Confirm Password" />
      </tr>
      <tr align="left">
		<td></td>
        <td colspan="4"><input type="submit" name="register" value="Register" />
			<div class="exit">
				<a href="index.html">exit</a>
		  	</div>
        </td>
      </tr>
    </table>
  </form>
</div>
</body>
</html>