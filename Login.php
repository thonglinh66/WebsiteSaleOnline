<!doctype html>
<html>
<head>
	<meta charset="utf-8">
	<title>Đăng nhập</title>
	<link href="Css/Login.css" rel="stylesheet" type="text/css">	
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>
	<div class="Login-Box">
		<h1>Login</h1>
		<form action="PHP/Authentication.php" method="post">
			<div class="Text-Box">
				<i class="fa fa-user"></i>
				<input type="text" placeholder="Username" name="Username" value="">
			</div>
			<div class="Text-Box">
				<i class="fa fa-lock"></i>

				<input type="password" placeholder="Password" name="Password" value="" autocomplete="off">
			</div>

			<input class="btn" type="submit" name="	" value="Sign in">
		</form>
	</div>		
</body>
</html>
