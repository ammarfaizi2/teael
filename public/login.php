<?php

session_start();

if (isset($_SESSION["login"], $_SESSION["path"], $_SESSION["url_path"])) {
	header("Location: index.php?ref=logind");
	exit;
}

if (isset($_POST["username"], $_POST["password"])) {
	
}

?><!DOCTYPE html>
<html>
<head>
	<title>Login</title>
	<style type="text/css">
		*{font-family: Arial;}
		.i1 {
			margin-top: 20px;
		}
		.mcg {
			margin-top: 100px;
			border: 1px solid #000;
			width: 400px;
			height: 230px;
		}
		button {
			cursor: pointer;
		}
	</style>
</head>
<body>
	<center>
		<div class="mcg">
			<form method="post" action="?login=1">
				<div class="i1">
					<div>
						<label>Username:</label>
					</div>
					<div>
						<input type="text" name="username" required/>
					</div>
				</div>
				<div class="i1">
					<div>
						<label>Password:</label>
					</div>
					<div>
						<input type="password" name="password" required/>
					</div>
				</div>
				<div class="i1">
					<button type="submit">Login</button>
				</div>
			</form>
		</div>
	</center>
</body>
</html>