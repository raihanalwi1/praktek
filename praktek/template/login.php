<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
</head>
<link rel="stylesheet" type="text/css" href="asset/style.css">

<body>
	<div class="login">
		<table border="0" style="width: 100%" cellpadding="0" cellspacing="0">
			<tr>
				<td colspan="2" style="text-align: center">
					<h3>SIGN IN</h3>
				</td>
			</tr>
			</table>
			<td colspan="2">
				<form method="post" action="../config/ceklogin.php">
				<table border="0" style="width: 25%" cellpadding="0" cellspacing="0" align="center">	
					<tr style="height: 30px">
						<td><b>Username</b></td>
						<td><input type="text" name="username" id="username" autocomplete="off"></td>
					</tr>
					<tr style="height: 30px">
						<td><b>Password</b></td>
						<td><input type="password" name="password" id="password" autocomplete="off"></td>
					</tr>
					<tr style="height: 30px">
						<td>&nbsp;</td>
						<td><input type="submit" name="btn_login" value="login"></td>
					</tr>
				</table>
				</form>
			</td>
	</div>
</body>
</html>