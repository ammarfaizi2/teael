<?php

session_start();

if (isset($_SESSION["login"], $_SESSION["path"], $_SESSION["url_path"])) {
	header("Location: index.php?ref=logind");
	exit;
}

if (isset($_POST["username"], $_POST["password"])) {
	is_dir(__DIR__."/__dird") or mkdir(__DIR__."/__dird");
	$_POST["username"] = trim(strtolower($_POST["username"]));
	$cred = require __DIR__."/../credentials.php";
	foreach ($cred as $k => &$v) {

		if (
			isset($v["username"], $v["password"], $v["path"]) &&
			is_string($v["username"]) && is_string($v["password"]) && is_string($v["path"])
		) {
			if ($_POST["username"] === $v["username"] && password_verify($_POST["password"], $v["password"])) {
				$_SESSION["login"] = true;

				$a = "1234567890--__qwertyuiopasdfghjklzxcvbnmQWERTYUIOPASDFGHJKLZXCVBNM";
				$n = "";
				$c = strlen($a) - 1;
				for ($i=0; $i < 32; $i++) { 
					$n .= $a[rand(0, $c)];
				}

				$_SESSION["hash"] = $n;
				$_SESSION["path"] = __DIR__."/__dird/{$_SESSION["hash"]}.root_link_std";
				$_SESSION["url_path"] = "__dird/{$_SESSION["hash"]}.root_link_std";
				shell_exec("ln -sv ".escapeshellarg($v["path"])." ".escapeshellarg(__DIR__."/__dird/{$_SESSION["hash"]}.root_link_std"));
				header("Location: index.php");
				exit;
			}
			header("Location: ?ref=error_cred");
			exit;
		}

		unset($cred[$k]);
	}
	header("Location: ?ref=error_cred");
	die;
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
			background-color: #fff;
		}
		button {
			cursor: pointer;
		}
	</style>
</head>
<body style="background-color: #000;">
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